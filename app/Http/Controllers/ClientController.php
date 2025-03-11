<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Mail\ResetPasswordMailClient;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function dashboard()
    {
        return view('client.dashboard');
    }

    public function lokasi()
    {
        $lokasis = Lokasi::all();
        return view('client.daftarlokasi', compact('lokasis'));
    }

    public function showlokasi($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('client.detaillokasi', compact('lokasi'));
    }

    public function profile()
    {
        $user = Auth::user();
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.model_id', $user->id)
            ->value('roles.name');
        return view('client.profile.profil', compact('user', 'role'));
    }

    public function editprofile()
    {
        $user = Auth::user();
        return view('client.profile.ubahprofil', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nip' => 'nullable|string|max:20',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:255',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Laki-Laki,Perempuan',
            'birthplace' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Update data user
        $user->update([
            'nip' => $request->nip,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'gender' => $request->gender,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
        ]);

        return redirect()->route('client.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function updateProfilePicture(Request $request)
    {
        // Validasi input
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Hapus foto profil lama jika ada
        if ($user->profile_picture) {
            Storage::delete('public/' . $user->profile_picture);
        }

        // Simpan foto profil baru
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $path;
        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function showChangePasswordForm()
    {
        return view('client.profile.ubahkatasandi');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'katasandilama' => 'required|string',
            'katasandibaru' => 'required|string|min:8|confirmed',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek apakah kata sandi lama sesuai
        if (!Hash::check($request->katasandilama, $user->password)) {
            return redirect()->back()
                ->with('error', 'Kata sandi lama tidak sesuai.')
                ->withInput();
        }

        // Update kata sandi baru
        $user->password = Hash::make($request->katasandibaru);
        $user->save();

        return redirect()->route('client.dashboard')
            ->with('success', 'Kata sandi berhasil diubah.');
    }

    public function forgotpasswordemail()
    {
        return view('client.profile.lupasandi');
    }

    public function showForgotPasswordForm()
    {
        return view('client.profile.lupasandi');
    }

    // Method untuk mengirim email reset kata sandi
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi input email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Generate token reset password
        $token = Str::random(60);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        // Kirim email dengan link reset password
        Mail::to($user->email)->send(new ResetPasswordMailClient($user, $token));

        return redirect()->back()
            ->with('success', 'Link reset kata sandi telah dikirim ke email Anda.');
    }

    // Method untuk menampilkan form reset kata sandi
    public function showResetPasswordForm(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        return view('client.profile.lupasandi2', compact('token', 'email'));
    }

    public function resetPassword(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string',
            'katasandibaru' => 'required|string|min:8|confirmed',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil token dari tabel password_reset_tokens
        $tokenData = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        // Jika token tidak ditemukan atau sudah kadaluarsa
        if (!$tokenData) {
            return redirect()->back()
                ->with('error', 'Token tidak valid atau sudah kadaluarsa.');
        }

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Update kata sandi baru
        $user->update([
            'password' => Hash::make($request->katasandibaru),
        ]);

        // Hapus token setelah digunakan
        DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->delete();

        return redirect()->route('client.profile')
            ->with('success', 'Kata sandi berhasil diubah.');
    }
}
