@extends('layouts.sparepart.app')

@section('title', 'Inventaris')

@section('content')
<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Edit Sparepart</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 -mt-4 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <!-- 🔹 Tulisan "Edit APAR" -->
        <h2 class="text-center text-xl font-bold mb-2">Edit Data Sparepart</h2>
        <p class="text-center text-gray-500 mb-4">Masukkan data Sparepart dengan tepat</p>

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