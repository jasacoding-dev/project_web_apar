<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('admin.lokasi.daftarlokasi', compact('lokasis'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $lokasis = Lokasi::where('nama_gedung', 'like', "%{$query}%")
            ->orWhere('nama_ruangan', 'like', "%{$query}%")
            ->orWhere('tanggal_kadaluwarsa', 'like', "%{$query}%")
            ->get();

        return response()->json($lokasis);
    }

    public function create()
    {
        return view('admin.lokasi.tambahlokasi');
    }

    public function store(Request $request)
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
        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $riwayat = Barcode::where('id_lokasi', $id)
            ->with(['perbaikanSparepart', 'perbaikanLaporanKustom'])
            ->get();

        $riwayatPerbaikan = Barcode::where('id_lokasi', $id)
            ->where('status', 'Perlu Perbaikan')
            ->with(['perbaikanSparepart', 'user']) // Ambil relasi sparepart dan user
            ->get();

        return view('admin.lokasi.detaillokasi', compact('lokasi', 'riwayat', 'riwayatPerbaikan'));
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('admin.lokasi.editlokasi', compact('lokasi'));
    }

    public function update(Request $request, $id)
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
        return redirect()->route('lokasi.show', $lokasi->id)->with('success', 'Lokasi berhasil diperbarui!');
    }

    public function destroy($id)
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

    public function showriwayat($id)
    {
        $barcode = Barcode::with(['perbaikanSparepart', 'perbaikanLaporanKustom'])
            ->findOrFail($id);
        return view('admin.lokasi.riwayat.detailriwayat', compact('barcode'));
    }

    public function showriwayatperbaikan($id)
    {
        $barcode = Barcode::with(['perbaikanSparepart', 'perbaikanLaporanKustom','user'])
            ->findOrFail($id);

        return view('admin.lokasi.riwayat.detailriwayat2', compact('barcode'));
    }
}
