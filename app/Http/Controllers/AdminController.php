<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\Apar;
use App\Models\Barcode;
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

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahApar = Apar::count();
        $jumlahLokasi = Lokasi::count();
        return view('admin.dashboard', compact('jumlahApar', 'jumlahLokasi'));
    }

    public function show()
    {
        $user = Auth::user();
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.model_id', $user->id)
            ->value('roles.name');
        return view('admin.profile.profil', compact('user', 'role'));
    }

    public function editprofile()
    {
        $user = Auth::user();
        return view('admin.profile.ubahprofil', compact('user'));
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

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui.');
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
        return view('admin.profile.ubahkatasandi');
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

        return redirect()->route('admin.ubahkatasandi')
            ->with('success', 'Kata sandi berhasil diubah.');
    }

    public function forgotpasswordemail()
    {
        return view('admin.profile.lupasandi');
    }

    public function showForgotPasswordForm()
    {
        return view('admin.profile.lupasandi');
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
        Mail::to($user->email)->send(new ResetPasswordMail($user, $token));

        return redirect()->back()
            ->with('success', 'Link reset kata sandi telah dikirim ke email Anda.');
    }

    // Method untuk menampilkan form reset kata sandi
    public function showResetPasswordForm(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        return view('admin.profile.lupasandi2', compact('token', 'email'));
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

        return redirect()->route('admin.profile')
            ->with('success', 'Kata sandi berhasil diubah.');
    }

    public function indexbarcode()
    {
        $barcodes = Barcode::with(['lokasi', 'apar'])->get();
        return view('admin.barcode.daftarbarcode', compact('barcodes'));
    }

    public function searchbarcode(Request $request)
    {
        $query = $request->input('query');

        $barcodes = Barcode::with(['lokasi', 'apar'])
            ->whereHas('apar', function ($q) use ($query) {
                $q->where('nomor_apar', 'like', "%{$query}%");
            })
            ->orWhereHas('lokasi', function ($q) use ($query) {
                $q->where('nama_gedung', 'like', "%{$query}%")
                    ->orWhere('nama_ruangan', 'like', "%{$query}%");
            })
            ->get();

        return response()->json($barcodes);
    }

    //Notifications
    public function notifications()
    {
        $notifications = Barcode::with(['user', 'apar', 'perbaikanLaporanKustom'])
            ->orderBy('updated_at', 'desc')
            ->get();

        $notificationMessages = $notifications->map(function ($barcode) {
            $message = "APAR di lokasi {$barcode->lokasi->alamat_gedung} dengan status {$barcode->status}";
            switch ($barcode->status) {
                case 'Baik':
                    $message .= " - Tidak ada tindakan yang diperlukan.";
                    break;
                case 'Perlu Perbaikan':
                    $message .= " - Perlu perbaikan segera.";
                    break;
                case 'Refilling':
                    $message .= " - Perlu pengisian ulang.";
                    break;
                case 'Kustom':
                    $tindakLanjut = $barcode->perbaikanLaporanKustom->first()->rencana_tindak_lanjut ?? 'Belum ada rencana';
                    $message .= " - Rencana tindak lanjut: {$tindakLanjut}.";
                    break;
            }
            return $message;
        });
        
        return view('admin.notifications', compact('notificationMessages'));
    }
}
