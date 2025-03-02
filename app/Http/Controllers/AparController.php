<?php

namespace App\Http\Controllers;

use App\Models\Apar;
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
        return view('admin.apar.daftarapar', compact('apars'));
    }

    public function create()
    {
        $mediaApar = MediaApar::all();
        $modelTabung = ModelTabung::all();
        return view('admin.apar.tambahapar', compact('mediaApar', 'modelTabung'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_apar' => 'required|unique:apars',
            'pemilik' => 'required',
            'merek' => 'required',
            'sistem_kerja' => 'required',
            'jenis_media_id' => 'required',
            'kapasitas' => 'required',
            'model_tabung_id' => 'required',
            'nomor_tabung' => 'required|unique:apars',
            'tanggal_kadaluarsa' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('apars', 'public');
            $fotoPath = basename($fotoPath);
        }

        Apar::create([
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

        return redirect()->route('apar.index')->with('success', 'Data APAR berhasil ditambahkan');
    }

    public function show($id)
    {
        $apar = Apar::with(['jenisMedia', 'modelTabung'])->findOrFail($id);
        return view('admin.apar.detailapar', compact('apar'));
    }

    public function edit($id)
    {
        $apar = Apar::findOrFail($id);
        $mediaApar = MediaApar::all();
        $modelTabungs = ModelTabung::all();

        return view('admin.apar.editapar', compact('apar', 'mediaApar', 'modelTabungs'));
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
        ]);

        // Debugging: Log data request
        Log::info('Data request:', $request->all());

        // Ambil data APAR yang akan diupdate
        $apar = Apar::findOrFail($id);

        // Debugging: Log data APAR sebelum diupdate
        Log::info('Data APAR sebelum diupdate:', $apar->toArray());

        // Update data APAR kecuali foto
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
