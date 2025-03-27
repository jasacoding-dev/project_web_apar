<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMailStaff;
use App\Models\Barcode;
use App\Models\Lokasi;
use App\Models\PerbaikanBarcodeSparepart;
use App\Models\PerbaikanLaporanKustom;
use App\Models\Sparepart;
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

    public function searchlokasi(Request $request)
    {
        $query = $request->input('query');

        $lokasis = Lokasi::where('nama_gedung', 'like', "%{$query}%")
            ->orWhere('nama_ruangan', 'like', "%{$query}%")
            ->orWhere('tanggal_kadaluwarsa', 'like', "%{$query}%")
            ->get();

        return response()->json($lokasis);
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

        $riwayat = Barcode::where('id_lokasi', $id)
            ->with(['perbaikanSparepart', 'perbaikanLaporanKustom'])
            ->get();

        $riwayatPerbaikan = Barcode::where('id_lokasi', $id)
            ->where('status', 'Perlu Perbaikan')
            ->with(['perbaikanSparepart', 'user']) // Ambil relasi sparepart dan user
            ->get();

        return view('staff.lokasi.detaillokasi', compact('lokasi', 'riwayat', 'riwayatPerbaikan'));
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
        $barcodes = Barcode::with(['lokasi', 'apar'])->get();
        return view('staff.barcode.barcode', compact('barcodes'));
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

    public function showScanPage()
    {
        return view('staff.barcode.scan-barcode');
    }

    public function showDetailbarcode($nomor_apar)
    {
        $barcode = Barcode::with(['lokasi', 'apar'])
            ->whereHas('apar', function ($query) use ($nomor_apar) {
                $query->where('nomor_apar', $nomor_apar);
            })
            ->first();

        if (!$barcode) {
            return redirect()->back()->with('error', 'Barcode tidak ditemukan.');
        }

        return view('staff.barcode.detailbarcode', compact('barcode'));
    }

    public function updateStatus(Request $request, $nomor_apar)
    {
        $request->validate([
            'status' => 'required|in:Baik,Perlu Perbaikan,Refilling,Kustom',
        ]);

        // Temukan barcode berdasarkan nomor_apar
        $barcode = Barcode::whereHas('apar', function ($query) use ($nomor_apar) {
            $query->where('nomor_apar', $nomor_apar);
        })->firstOrFail();

        // Update status
        $barcode->status = $request->status;
        $barcode->user_id = Auth::id();
        $barcode->save();

        // Redirect berdasarkan status yang dipilih
        switch ($request->status) {
            case 'Baik':
                return redirect()->route('barcode.index');
            case 'Perlu Perbaikan':
                return redirect()->route('staff.status.perbaikan', $nomor_apar);
            case 'Kustom':
                return redirect()->route('staff.status.kustom', $nomor_apar);
            case 'Refilling':
                return redirect()->back()->with('success', 'Permohonan refilling berhasil diajukan.');
            default:
                return redirect()->back()->with('error', 'Status tidak valid.');
        }
    }

    //Perbaiki Sparepart
    public function statusperbaikan($nomor_apar)
    {
        $spareparts = Sparepart::all();
        return view('staff.status.perbaikan', compact('spareparts', 'nomor_apar'));
    }

    public function storesparepart(Request $request, $nomor_apar)
    {
        $request->validate([
            'spareparts' => 'required|array',
            'spareparts.*' => 'exists:spareparts,id',
        ]);

        $user_id = Auth::id();
        $barcode = Barcode::whereHas('apar', function ($query) use ($nomor_apar) {
            $query->where('nomor_apar', $nomor_apar);
        })->first();

        if (!$barcode) {
            return redirect()->back()->with('error', 'Barcode tidak ditemukan.');
        }

        foreach ($request->spareparts as $sparepartId) {
            PerbaikanBarcodeSparepart::create([
                'user_id' => $user_id,
                'id_barcode' => $barcode->id,
                'id_sparepart' => $sparepartId,
            ]);
        }

        return redirect()->route('barcode.index')->with('success', 'Data sparepart berhasil disimpan.');
    }
    //End Perbaiki Sparepart

    //Perbaikan Kustom
    public function statuskustom($nomor_apar)
    {
        return view('staff.status.kustom', compact('nomor_apar'));
    }


    public function storekustom(Request $request, $nomor_apar)
    {
        $request->validate([
            'temuan' => 'required|string',
            'jumlah' => 'required|integer',
            'rencana_tindak_lanjut' => 'required|in:perlu_pengecekan,perlu_pengadaan,perlu_penggantian',
        ]);

        $barcode = Barcode::whereHas('apar', function ($query) use ($nomor_apar) {
            $query->where('nomor_apar', $nomor_apar);
        })->first();

        if (!$barcode) {
            return redirect()->back()->with('error', 'Barcode tidak ditemukan.');
        }

        PerbaikanLaporanKustom::create([
            'id_barcode' => $barcode->id,
            'temuan' => $request->temuan,
            'jumlah' => $request->jumlah,
            'rencana_tindak_lanjut' => $request->rencana_tindak_lanjut,
        ]);

        return redirect()->route('barcode.index')->with('success', 'Laporan kustom berhasil disimpan.');
    }
    //End Perbaikan Kustom

    public function showriwayat($id)
    {
        $barcode = Barcode::with(['perbaikanSparepart', 'perbaikanLaporanKustom'])
            ->findOrFail($id);
        return view('staff.lokasi.riwayat.detailriwayat', compact('barcode'));
    }

    public function showriwayatperbaikan($id)
    {
        $barcode = Barcode::with(['perbaikanSparepart', 'perbaikanLaporanKustom', 'user'])
            ->findOrFail($id);

        return view("staff.lokasi.riwayat.detailriwayat2", compact('barcode'));
    }
}
