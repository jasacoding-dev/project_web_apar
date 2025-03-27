@extends('layouts.lokasi.app')

@section('title', 'Lokasi')

@section('content')

<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Detail Riwayat</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 -mt-4 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4 -mt-3">
            <h2 class="text-xl font-bold">Perbaikan {{ $barcode->updated_at->format('F Y') }}</h2>
        </div>
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Kolom Kiri -->
            <div class="pr-8 md:pr-16 text-sm flex-1">
                <div class="mb-4">
                    <p class="font-bold">Tanggal Pengecekan</p>
                    <p>{{ $barcode->updated_at->format('d F Y') }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Status</p>
                    <p>{{ $barcode->status }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Nama Staff Bertugas</p>
                    <p>{{ $barcode->user->name ?? 'N/A' }}</p>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="pl-0 md:pl-10 text-sm mr-48 flex-1">
                <div class="mb-4">
                    <p class="font-bold">Kondisi Apar</p>
                    @if ($barcode->status === 'Baik')
                    <p>N/A</p>
                    @else
                    <p>{{ $barcode->perbaikanLaporanKustom->first()->rencana_tindak_lanjut ?? 'N/A' }}</p>
                    @endif
                </div>
                <div class="mb-4">
                    <p class="font-bold">Foto</p>
                    @if ($barcode->apar->foto)
                    <img src="{{ asset('storage/' . $barcode->apar->foto) }}" alt="Foto Apar" class="w-40 h-40 rounded-lg shadow-md">
                    @else
                    <p>Tidak ada foto</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endsection