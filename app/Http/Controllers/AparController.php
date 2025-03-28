<?php

namespace App\Http\Controllers;

use App\Models\Apar;
use App\Models\Barcode;
use App\Models\Lokasi;
use App\Models\MediaApar;
use App\Models\ModelTabung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AparController extends Controller
{
    public function index()
    {
        $apars = Apar::with(['jenisMedia', 'modelTabung'])->get();
        $mediaApar = MediaApar::all();
        return view('admin.apar.daftarapar', compact('apars', 'mediaApar'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $mediaId = $request->input('media_id');

        $apars = Apar::with(['jenisMedia', 'modelTabung'])
            ->when($query, function ($q) use ($query) {
                return $q->where('nomor_apar', 'like', "%{$query}%");
            })
            ->when($mediaId, function ($q) use ($mediaId) {
                return $q->where('jenis_media_id', $mediaId);
            })
            ->get();

        return response()->json($apars);
    }

    public function create()
    {
        $mediaApar = MediaApar::all();
        $modelTabung = ModelTabung::all();
        $gedungs = Lokasi::select('nama_gedung')->distinct()->get();
        $ruangans = Lokasi::select('nama_gedung', 'nama_ruangan')->get();
        return view('admin.apar.tambahapar', compact('mediaApar', 'modelTabung', 'gedungs', 'ruangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_apar' => 'required|string|unique:apars',
            'pemilik' => 'required|string',
            'merek' => 'required|string',
            'sistem_kerja' => 'required|string',
            'jenis_media_id' => 'required|exists:media_apars,id',
            'kapasitas' => 'required|string',
            'model_tabung_id' => 'required|exists:model_tabungs,id',
            'nomor_tabung' => 'required|string|unique:apars',
            'tanggal_kadaluarsa' => 'required|date',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_gedung' => 'required|string',
            'nama_ruangan' => 'required|string',
        ]);

        try {
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('apars', 'public');
                $fotoPath = basename($fotoPath);
            }

            // Simpan data APAR
            $apar = Apar::create([
                'nomor_apar' => $request->nomor_apar,
                'pemilik' => $request->pemilik,
                'merek' => $request->merek,
                'sistem_kerja' => $request->sistem_kerja,
                'jenis_media_id' => $request->jenis_media_id,
                'kapasitas' => $request->kapasitas,
                'model_tabung_id' => $request->model_tabung_id,
                'nomor_tabung' => $request->nomor_tabung,
                'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
                'keterangan' => $request->keterangan,
                'foto' => $fotoPath,
            ]);

            // Ambil id_lokasi berdasarkan nama_gedung dan nama_ruangan
            $lokasi = Lokasi::where('nama_gedung', $request->nama_gedung)
                ->where('nama_ruangan', $request->nama_ruangan)
                ->first();

            if ($lokasi) {
                // Simpan relasi ke tabel barcodes
                Barcode::create([
                    'user_id' => null,
                    'id_lokasi' => $lokasi->id,
                    'id_apar' => $apar->id,
                ]);
            }

            return redirect()->route('apar.index')->with('success', 'APAR berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $apar = Apar::with(['jenisMedia', 'modelTabung', 'lokasis'])->findOrFail($id);
        return view('admin.apar.detailapar', compact('apar'));
    }

    public function edit($id)
    {
        $apar = Apar::findOrFail($id);
        $mediaApar = MediaApar::all();
        $modelTabungs = ModelTabung::all();
        $gedungs = Lokasi::select('nama_gedung')->distinct()->get();
        $ruangans = Lokasi::select('nama_gedung', 'nama_ruangan')->get();

        return view('admin.apar.editapar', compact('apar', 'mediaApar', 'modelTabungs', 'gedungs', 'ruangans'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nomor_apar' => 'required|string|unique:apars,nomor_apar,' . $id,
            'pemilik' => 'required|string',
            'merek' => 'required|string',
            'sistem_kerja' => 'required|string',
            'jenis_media_id' => 'required|exists:media_apars,id',
            'kapasitas' => 'required|string',
            'model_tabung_id' => 'required|exists:model_tabungs,id',
            'nomor_tabung' => 'required|string|unique:apars,nomor_tabung,' . $id,
            'tanggal_kadaluarsa' => 'required|date',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama_gedung' => 'required|string',
            'nama_ruangan' => 'required|string',
        ]);

        $apar = Apar::findOrFail($id);

        $apar->update($request->except('foto'));

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Debugging: Log informasi file
            Log::info('File foto diunggah:', [
                'name' => $request->file('foto')->getClientOriginalName(),
                'size' => $request->file('foto')->getSize(),
            ]);

            // Hapus file lama jika ada
            if ($apar->foto && Storage::exists('public/apars/' . $apar->foto)) {
                Storage::delete('public/apars/' . $apar->foto);
            }

            // Simpan file baru
            $fotoPath = $request->file('foto')->store('apars', 'public');
            $apar->foto = basename($fotoPath);
            $apar->save();

            // Debugging: Log path file baru
            Log::info('File foto disimpan di:', ['path' => $fotoPath]);
        }

        $lokasi = Lokasi::where('nama_gedung', $request->nama_gedung)
            ->where('nama_ruangan', $request->nama_ruangan)
            ->first();

        if ($lokasi) {
            // Update relasi barcode
            Barcode::updateOrCreate(
                ['id_apar' => $apar->id],
                ['id_lokasi' => $lokasi->id]
            );
        }

        // Debugging: Log data APAR setelah diupdate
        Log::info('Data APAR setelah diupdate:', $apar->toArray());

        return redirect()->route('apar.index')->with('success', 'Data APAR berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $apar = Apar::findOrFail($id);

        // Debugging: Periksa path file
        Log::info('Path file foto:', ['path' => 'public/apars/' . $apar->foto]);

        $filePath = storage_path('app/public/apars/' . $apar->foto);
        if ($apar->foto && Storage::exists($filePath)) {
            // Debugging: Periksa apakah file ada
            Log::info('File ditemukan. Menghapus file...');
            Storage::delete($filePath);
        } else {
            // Debugging: Jika file tidak ditemukan
            Log::info('File tidak ditemukan.');
        }

        // Hapus data dari database
        $apar->delete();

        return response()->json(['message' => 'Data APAR berhasil dihapus'], 200);
    }
}
