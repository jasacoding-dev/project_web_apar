<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

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

    public function show($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('client.detaillokasi', compact('lokasi'));
    }
}
