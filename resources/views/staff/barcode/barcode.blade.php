@extends('layouts.staff.barcode.app')

@section('title', 'Barcode')

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

            <a href="/staff/detailbarcode" class="cursor-pointer bg-[#FFDF00] text-black font-bold px-6 py-2 rounded-lg flex items-center space-x-2 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8V6a2 2 0 012-2h2M3 16v2a2 2 0 002 2h2M21 8V6a2 2 0 00-2-2h-2M21 16v2a2 2 0 01-2 2h-2M7 8h10M7 16h10" />
                </svg>
                <span>Scan</span>
            </a>
        </div>

        <div class="w-full min-h-screen md:w-full md:min-h-12 lg:w-full max-h-[360px] overflow-y-auto overflow-x-auto border border-gray-300 rounded-lg shadow-md">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-[#0168AD] text-white">
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Kode Barcode</th>
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Lokasi Gedung</th>
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Lokasi Penempatan</th>
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data pengguna -->
                    <tr class="bg-white">
                        <td class="border border-gray-300 px-4 py-2 font-bold">
                            <a class="text-black">111</a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">40</td>
                        <td class="border border-gray-300 px-4 py-2">40 Desember 2024</td>
                        <td class="border border-gray-300 px-4 py-2">40 Desember 2024</td>
                    </tr>
                    <tr class="bg-white">
                        <td class="border border-gray-300 px-4 py-2 font-bold">
                            <a class="text-black">111</a>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">40</td>
                        <td class="border border-gray-300 px-4 py-2">40 Desember 2024</td>
                        <td class="border border-gray-300 px-4 py-2">40 Desember 2024</td>

                    </tr>
                    <!-- Tambahkan lebih banyak data jika perlu -->
                </tbody>
            </table>
        </div>
        @endsection