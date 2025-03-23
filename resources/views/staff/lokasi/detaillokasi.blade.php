@extends('layouts.staff.lokasi.app')

@section('title', 'Lokasi')

@section('content')

<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ route('staff.index') }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Detail Lokasi</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 -mt-4 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <!-- Title with Icons -->
        <div class="flex justify-between items-center mb-4 -mt-3">
            <h2 class="text-xl font-bold">Informasi Lokasi</h2>
            <div class="flex -space-x-2">
                <!-- Edit Button -->
                <a href="{{ route('staff.lokasi.edit', ['id' => $lokasi->id]) }}"
                    class="text-white p-1 rounded-lg border-2 px-1 -py-2 bg-[#0168AD] transition mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-4">
            <!-- Kolom Kiri -->
            <div class="pr-8 md:pr-16 text-sm flex-1">
                <div class="mb-4">
                    <p class="font-bold">Nama Gedung</p>
                    <p>{{ $lokasi->nama_gedung }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Nama Ruangan</p>
                    <p>{{ $lokasi->nama_ruangan }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Alamat Gedung</p>
                    <p>{{ $lokasi->alamat_gedung }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Satuan Kerja</p>
                    <p>{{ $lokasi->satuan_kerja }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Tanggal Kadaluwarsa</p>
                    <p>{{ $lokasi->tanggal_kadaluwarsa }}</p>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="pl-0 md:pl-10 text-sm mr-48 flex-1">
                <div class="mb-4">
                    <p class="font-bold">Lantai</p>
                    <p>{{ $lokasi->lantai }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Pemilik Gedung</p>
                    <p>{{ $lokasi->pemilik_gedung }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Pic Gedung</p>
                    <p>{{ $lokasi->pic_gedung }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Tanggal Pengecekan</p>
                    <p>{{ $lokasi->tanggal_pengecekan }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-bold">Foto</p>
                    @if ($lokasi->foto)
                    <img src="{{ asset('storage/' . $lokasi->foto) }}" alt="Foto Lokasi" class="w-40 h-40 rounded-lg shadow-md">
                    @else
                    <p>Tidak ada foto</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 w-full mt-4">
        <h2 class="text-lg font-bold mb-4">Riwayat Pengecekan dan Perbaikan</h2>

        <!-- Item 1 -->
        <div class="mb-4">
            <button
                class="w-full bg-[#F8FDFF] border border-gray-400 rounded-lg p-4 flex justify-between items-center hover:border-[#223E88] transition cursor-pointer"
                type="button"
                onclick="window.location.href='/staff/detailriwayat'">
                <div class="text-left">
                    <p class="font-semibold">
                        Pengecekan Agustus 2024 - Baik
                    </p>
                    <p class="text-sm text-gray-600">17 Agustus 2024</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 18l6-6-6-6" />
                </svg>
            </button>
        </div>


        <!-- Item 2 -->
        <div class="border border-gray-400 rounded-lg overflow-hidden hover:border-[#223E88] transition">
            <button
                class="w-full bg-[#F8FDFF] p-4 flex justify-between items-center cursor-pointer"
                type="button"
                onclick="window.location.href='/staff/detailriwayat2'">
                <div class="text-left">
                    <p class="font-semibold">
                        Perbaikan Agustus 2024 - Baik
                    </p>
                    <p class="text-sm text-gray-600">Tidak Berfungsi</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 18l6-6-6-6" />
                </svg>
            </button>
        </div>

        @endsection