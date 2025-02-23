@extends('layouts.barcode.app')

@section('title', 'Barcode')

@section('content')

<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
<div class="bg-white shadow-md rounded-b-lg p-4 w-auto sm:w-[96%] md:w-full min-h-[96vh] md:min-h-full flex flex-col justify-start overflow-auto">
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
            class="bg-transparent outline-none w-full ml-2 text-sm text-gray-600"
        >
    </div>

    <a id="openModal" class="cursor-pointer bg-[#FFDF00] text-black font-bold px-6 py-2 rounded-lg flex items-center space-x-2 whitespace-nowrap">
        <span>Cetak Barcode</span>
    </a>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center p-4 z-50">
    <div class="bg-white p-6 md:p-8 rounded-xl shadow-lg w-full max-w-4xl flex flex-col md:flex-row relative">
        <!-- Close Button -->
        <button id="closeModal" class="absolute top-1 right-4 text-gray-600 hover:text-gray-900 text-xl font-bold">&times;</button>

        <div class="flex-1 p-4 bg-white rounded-xl flex flex-col items-center">
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-4 md:gap-8">
                <div class="flex flex-col items-center ">
                    <img src="{{ asset('storage/barcode1.png') }}" alt="QR Code 1" class="w-24 h-24 sm:w-32 sm:h-32">
                    <p class="mt-2 text-xs sm:text-sm font-semibold">MD A001203</p>
                </div>
                <div class="flex flex-col items-center ">
                    <img src="{{ asset('storage/barcode1.png') }}" alt="QR Code 2" class="w-24 h-24 sm:w-32 sm:h-32">
                    <p class="mt-2 text-xs sm:text-sm font-semibold">MD A003200</p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/4 bg-gray-300 flex flex-col justify-between p-4 md:p-6 rounded-xl mt-4 md:mt-0">
            <div></div>
            <div class="flex gap-4 justify-center md:justify-start">
                <button id="closeModalBtn" class="px-3 py-2 bg-white border border-[#FFDF00] text-black rounded-lg text-xs sm:text-sm">Kembali</button>
                <button class="px-3 py-2 bg-[#FFDF00] text-black font-semibold rounded-lg text-xs sm:text-sm">Cetak</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Modal -->
<script>
    document.getElementById("openModal").addEventListener("click", function() {
        document.getElementById("modal").classList.remove("hidden");
    });

    document.getElementById("closeModal").addEventListener("click", function() {
        document.getElementById("modal").classList.add("hidden");
    });

    document.getElementById("closeModalBtn").addEventListener("click", function() {
        document.getElementById("modal").classList.add("hidden");
    });
</script>


<div class="w-full min-h-screen md:w-full md:min-h-12 lg:w-full max-h-[360px] overflow-y-auto overflow-x-auto border border-gray-300 rounded-lg shadow-md">
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-[#0168AD] text-white">
                <th class="border border-gray-300 px-4 py-2 text-center w-[50px]">
                    <input type="checkbox" id="select-all" class="w-4 h-4">
                </th>
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nama Gedung</th>
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nama Ruangan</th>
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Tanggal Kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data pengguna -->
            <tr class="bg-white">
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <input type="checkbox" class="row-checkbox w-4 h-4">
                </td>
                <td class="border border-gray-300 px-4 py-2 font-bold">User</td>
                <td class="border border-gray-300 px-4 py-2">40</td>
                <td class="border border-gray-300 px-4 py-2">40 Desember 2024</td>
            </tr>
            <!-- Tambahkan lebih banyak data jika perlu -->
        </tbody>
    </table>
</div>

<script>
    // JavaScript untuk mengontrol checkbox "Select All"
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>

@endsection