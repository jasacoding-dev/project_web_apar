@extends('layouts.client.lokasi.app')

@section('title', 'Lokasi')

@section('content')

<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white shadow-md rounded-b-lg p-4 w-auto sm:w-[96%] md:w-full min-h-[96vh] md:min-h-[80vh] flex flex-col justify-start overflow-auto">
        <!-- Header (Search Bar and Add Button) -->
        <div class="flex flex-row items-center justify-between w-full space-x-4 mb-4">
            <!-- Search Bar -->
            <div class="flex items-center bg-white px-4 py-2 rounded-full w-full sm:max-w-sm border border-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input
                    type="text"
                    placeholder="Cari..."
                    class="bg-transparent outline-none w-full ml-2 text-sm text-gray-600">
            </div>
        </div>


        <div class="w-full min-h-screen md:w-full md:min-h-12 lg:w-full max-h-[360px] overflow-y-auto overflow-x-auto border border-gray-300 rounded-lg shadow-md">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-[#0168AD] text-white">
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nama Gedung</th>
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nama Ruangan</th>
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Tanggal Kadluwarsa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasis as $lokasi)
                    <!-- Data pengguna -->
                    <tr class="bg-white">
                        <td class="border border-gray-300 px-4 py-2 font-bold">
                            <a href="{{ route('client.showlokasi', $lokasi->id) }}" class="text-blue-500 hover:underline">{{ $lokasi->nama_gedung }}</a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $lokasi->nama_ruangan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $lokasi->tanggal_kadaluwarsa }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection