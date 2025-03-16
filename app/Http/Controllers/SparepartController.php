<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SparepartController extends Controller
{
    public function index()
    {
        $spareparts = Sparepart::all();
        return view('admin.sparepart.daftarsparepart', compact('spareparts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $spareparts = Sparepart::where('nama_sparepart', 'like', "%{$query}%")
            ->get();

        return response()->json($spareparts);
    }

    public function create()
    {
        return view('admin.sparepart.tambahsparepart');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_sparepart' => 'required|unique:spareparts|max:255',
            'nama_sparepart' => 'required|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('spareparts', 'public');
            $fotoPath = basename($fotoPath);
            $data['foto'] = $fotoPath;
        }

        Sparepart::create($data);

        return redirect()->route('sparepart.index')->with('success', 'Sparepart berhasil ditambahkan!');
    }

    public function show($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        return view('admin.sparepart.detailsparepart', compact('sparepart'));
    }

    public function edit($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        return view('admin.sparepart.editsparepart', compact('sparepart'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nomor_sparepart' => 'required|max:255|unique:spareparts,nomor_sparepart,' . $id,
            'nama_sparepart' => 'required|max:255',
            'jumlah' => 'required|integer',
            'keterangan' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil data sparepart berdasarkan ID
        $sparepart = Sparepart::findOrFail($id);

        // Update data
        $sparepart->nomor_sparepart = $request->nomor_sparepart;
        $sparepart->nama_sparepart = $request->nama_sparepart;
        $sparepart->jumlah = $request->jumlah;
        $sparepart->keterangan = $request->keterangan;


        $sparepart->update($request->except('foto'));

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if ($sparepart->foto && Storage::exists('public/spareparts/' . $sparepart->foto)) {
                Storage::delete('public/spareparts/' . $sparepart->foto);
            }

            // Simpan file baru
            $fotoPath = $request->file('foto')->store('spareparts', 'public');
            $sparepart->foto = basename($fotoPath);
            $sparepart->save();
        }

        // Simpan perubahan
        $sparepart->save();

        // Redirect ke halaman detail dengan pesan sukses
        return redirect()->route('sparepart.show', $sparepart->id)->with('success', 'Data sparepart berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $sparepart = Sparepart::findOrFail($id);

        $filePath = storage_path('app/public/sparepart/' . $sparepart->foto);
        if ($sparepart->foto && Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        // Hapus data dari database
        $sparepart->delete();

        return response()->json(['message' => 'Data APAR berhasil dihapus'], 200);
    }
}
