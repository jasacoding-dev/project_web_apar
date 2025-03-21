<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMailStaff;
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

class StaffController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('staff.lokasi.daftarlokasi', compact('lokasis'));
    }

    //Profile
    public function profile()
    {
        $user = Auth::user();
        $role = DB::table('model_has_roles')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('model_has_roles.model_id', $user->id)
            ->value('roles.name');
        return view('staff.profile.profil', compact('user', 'role'));
    }

    public function editprofile()
    {
        $user = Auth::user();
        return view('staff.profile.ubahprofil', compact('user'));
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

        return redirect()->route('staff.profile')->with('success', 'Profil berhasil diperbarui.');
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
        return view('staff.profile.ubahkatasandi');
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

        return redirect()->route('staff.index')
            ->with('success', 'Kata sandi berhasil diubah.');
    }

    public function forgotpasswordemail()
    {
        return view('staff.profile.lupasandi');
    }

    public function showForgotPasswordForm()
    {
        return view('staff.profile.lupasandi');
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
        Mail::to($user->email)->send(new ResetPasswordMailStaff($user, $token));

        return redirect()->back()
            ->with('success', 'Link reset kata sandi telah dikirim ke email Anda.');
    }

    // Method untuk menampilkan form reset kata sandi
    public function showResetPasswordForm(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        return view('staff.profile.lupasandi2', compact('token', 'email'));
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

        return redirect()->route('staff.profile')
            ->with('success', 'Kata sandi berhasil diubah.');
    }


    //Lokasi
    public function createlokasi()
    {
        return view('staff.lokasi.tambahlokasi');
    }

    public function storelokasi(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_gedung' => 'required|string|max:255',
            'lantai' => 'required|string|max:50',
            'nama_ruangan' => 'required|string|max:255',
            'pemilik_gedung' => 'required|string|max:255',
            'alamat_gedung' => 'required|string|max:255',
            'pic_gedung' => 'required|string|max:255',
            'satuan_kerja' => 'required|string|max:255',
            'tanggal_pengecekan' => 'required|date',
            'tanggal_kadaluwarsa' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
        ]);

        // Simpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('lokasi_foto', 'public');
        }

        // Simpan data ke database
        Lokasi::create([
            'nama_gedung' => $request->nama_gedung,
            'lantai' => $request->lantai,
            'nama_ruangan' => $request->nama_ruangan,
            'pemilik_gedung' => $request->pemilik_gedung,
            'alamat_gedung' => $request->alamat_gedung,
            'pic_gedung' => $request->pic_gedung,
            'satuan_kerja' => $request->satuan_kerja,
            'tanggal_pengecekan' => $request->tanggal_pengecekan,
            'tanggal_kadaluwarsa' => $request->tanggal_kadaluwarsa,
            'foto' => $fotoPath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('staff.index')->with('success', 'Lokasi berhasil ditambahkan!');
    }

    public function showlokasi($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('staff.lokasi.detaillokasi', compact('lokasi'));
    }

    public function editlokasi($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('staff.lokasi.editlokasi', compact('lokasi'));
    }

    public function updatelokasi(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_gedung' => 'required|string|max:255',
            'lantai' => 'required|string|max:50',
            'nama_ruangan' => 'required|string|max:255',
            'pemilik_gedung' => 'required|string|max:255',
            'alamat_gedung' => 'required|string|max:255',
            'pic_gedung' => 'required|string|max:255',
            'satuan_kerja' => 'required|string|max:255',
            'tanggal_pengecekan' => 'required|date',
            'tanggal_kadaluwarsa' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
        ]);

        // Ambil data lokasi berdasarkan ID
        $lokasi = Lokasi::findOrFail($id);

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($lokasi->foto) {
                Storage::delete('public/' . $lokasi->foto);
            }
            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('lokasi_foto', 'public');
            $lokasi->foto = $fotoPath;
        }

        // Update data lokasi
        $lokasi->update([
            'nama_gedung' => $request->nama_gedung,
            'lantai' => $request->lantai,
            'nama_ruangan' => $request->nama_ruangan,
            'pemilik_gedung' => $request->pemilik_gedung,
            'alamat_gedung' => $request->alamat_gedung,
            'pic_gedung' => $request->pic_gedung,
            'satuan_kerja' => $request->satuan_kerja,
            'tanggal_pengecekan' => $request->tanggal_pengecekan,
            'tanggal_kadaluwarsa' => $request->tanggal_kadaluwarsa,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('staff.lokasi.show', $lokasi->id)->with('success', 'Lokasi berhasil diperbarui!');
    }

    public function destroylokasi($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $filePath = storage_path('app/public/lokasi_foto/' . $lokasi->foto);
        if ($lokasi->foto && Storage::exists($filePath)) {
            Storage::delete($filePath);
        } 
        // Hapus data dari database
        $lokasi->delete();

        return response()->json(['message' => 'Data Lokasi berhasil dihapus'], 200);
    }


    //Barcode
    public function indexbarcode()
    {
        return view('staff.barcode.barcode');
    }
}
