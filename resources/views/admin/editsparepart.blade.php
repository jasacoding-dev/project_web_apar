@extends('layouts.sparepart.app')

@section('title', 'Sparepart')

@section('content')
    <!-- Back Button with Title -->
    <div class="flex items-center mb-6">
        <!-- Back SVG -->
        <button onclick="history.back()" class="mr-4 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600 hover:text-black transition">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        <!-- Page Title -->
        <h1 class="text-lg font-bold text-gray-800">Edit Sparepart</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 w-full -mt-4 overflow-y-auto 
    h-[770px] sm:h-[800px] md:h-[420px] ">
        <div class="text-center mb-6">
        <h2 class="text-xl font-bold">Edit Data Sparepart</h2>
        <p class="text-sm text-gray-600">Masukkan data Sparepart dengan tepat </p>
    </div>

    <!-- Form -->
    <form class="space-y-4">
        <!-- NIP Input -->
        <div>
            <label for="Nomor Sparepart" class="block text-sm font-medium text-gray-700">
                Nomor Sparepart<span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="Nomor Sparepart" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
                placeholder="Gedung A">
        </div>

        <!-- Pemilik (Warna Client) -->
<div>
    <label for="Nama Sparepart" class="block text-sm font-medium text-gray-700 mt-4">
        Nama Sparepart<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Nama Sparepart" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Nama Sparepart">
</div>

<!-- Merek -->
<div>
    <label for="Junmlah" class="block text-sm font-medium text-gray-700 mt-4">
    Junmlah<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Junmlah" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Junmlah ">
</div>

<!-- Keterangan -->
<div>
    <label for="Keterangan" class="block text-sm font-medium text-gray-700 mt-4">
        Keterangan
    </label>
    <textarea 
        id="Keterangan" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Tambahkan keterangan tambahan..." rows="3"></textarea>
</div>
    
     <!-- Foto -->
<div>
    <label for="foto" class="block text-sm font-medium text-gray-700 mt-4">
        Foto<span class="text-red-500">*</span>
    </label>
    <div class="mt-1 relative w-full">
        <input 
            type="file" 
            id="foto" 
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
            accept="image/*"
            onchange="updateFileName(this)">
        <div class="border border-gray-300 rounded-lg flex items-center justify-between p-2 w-full">
            <span id="file-name" class="text-gray-400 text-sm pl-2">Belum ada file dipilih</span>
            <label for="foto" class="bg-yellow-400 text-black font-semibold text-sm py-1 px-2 rounded-lg cursor-pointer hover:bg-yellow-500 transition">
                Pilih File
            </label>
        </div>
    </div>
</div>

<!-- Script untuk menampilkan nama file -->
<script>
    function updateFileName(input) {
        const fileNameSpan = document.getElementById("file-name");
        if (input.files.length > 0) {
            fileNameSpan.textContent = input.files[0].name; // Menampilkan nama file
            fileNameSpan.classList.remove("text-gray-400"); // Menghilangkan warna abu-abu default
        } else {
            fileNameSpan.textContent = "Belum ada file dipilih"; // Reset jika tidak ada file
            fileNameSpan.classList.add("text-gray-400");
        }
    }
</script>



        <!-- Tombol Simpan -->
        <div class="flex justify-center">
            <button 
                type="submit" 
                class="bg-[#FFDF00] w-80 text-black font-bold px-8 py-2 rounded-lg hover:bg-yellow-500 transition mt-4">
                Simpan
            </button>
        </div>
    </form>
</div>

@endsection