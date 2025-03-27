@extends('layouts.client.beranda.app')

@section('title', 'Beranda')

@section('content')

<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white shadow-lg rounded-lg p-6 w-full min-h-screen md:min-h-0">
        <h2 class="text-sm font-bold text-gray-700">Selamat Pagi</h2>
        <p class="mt-2 text-sm text-gray-600">Pastikan sistem kebakaranmu siap pakai, ya!</p>
        <div class="mt-4 space-y-4">
            <div class="mt-4 space-y-4">
                <div class="bg-white border border-black rounded-lg shadow p-4 flex justify-center items-center h-24">
                    <p class="text-gray-800 font-semibold">{{ $jumlahApar }}/1000 Apar Terdata</p>
                </div>
            </div>
            <div class="mt-4 space-y-4">
                <div class="bg-white border border-black rounded-lg shadow p-4 flex justify-center items-center h-24">
                    <p class="text-gray-800 font-semibold">{{ $jumlahLokasi }}/1000 Lokasi Terdata</p>
                </div>
            </div>
        </div>
    </div>


    @endsection