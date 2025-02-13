@extends('layouts.lokasi.app')

@section('title', 'Lokasi')

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
        <h1 class="text-lg font-bold text-gray-800">Edit Lokasi</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 w-full -mt-4 overflow-y-auto 
    h-[770px] sm:h-[800px] md:h-[420px] ">
        <div class="text-center mb-6">
        <h2 class="text-xl font-bold">Edit Lokasi</h2>
        <p class="text-sm text-gray-600">Masukkan lokasi sesuai dengan penempatan APAR </p>
    </div>

    <!-- Form -->
    <form class="space-y-4">
        <!--  Nama Gedung Input -->
        <div>
            <label for=" Nama Gedung" class="block text-sm font-medium text-gray-700">
                Nama Gedung Apar<span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="Nama Gedung" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
                placeholder="Gedung A">
        </div>

<!-- Sistem Lantai -->
<div>
    <label for="Sistem Kerja" class="block text-sm font-medium text-gray-700 mt-4">
    Lantai<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Lantai" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder=" Lantai">
</div>

          <!-- Nama Ruangan -->
          <div>
            <label for="Nama Ruangan" class="block text-sm font-medium text-gray-700">
            Nama Ruangan<span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="Nama Ruangan" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
                placeholder="Masukkan Nama Ruangan">
        </div>
       
          <!-- Pemilik Gedung -->
<div>
    <label for="Pemilik Gedung" class="block text-sm font-medium text-gray-700 mt-4">
    Pemilik Gedung<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Pemilik Gedung" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Masukkan Pemilik Gedung">
                    </div>

                     <!-- Alamat Gedung -->
<div>
    <label for="Alamat Gedung" class="block text-sm font-medium text-gray-700 mt-4">
    Alamat Gedung<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Alamat Gedung" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Masukkan Alamat Gedung">
                    </div>

                     <!-- Pic Gedung -->
<div>
    <label for="Pic Gedung" class="block text-sm font-medium text-gray-700 mt-4">
    Pic Gedung<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Pic Gedung" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Masukkan Pic Gedung">
                    </div>

                      <!-- Satuan Kerja -->
<div>
    <label for="Satuan Kerja" class="block text-sm font-medium text-gray-700 mt-4">
    Satuan Kerja<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Satuan Kerja" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Masukkan Satuan Kerja">
                    </div>

<!-- Tanggal Pengecekan -->
<div>
    <label for="tanggal_Pengecekan" class="block text-sm font-medium text-gray-700 mt-4">
        Tanggal Pengecekan<span class="text-red-500">*</span>
    </label>
    <input 
        type="date" 
        id="tanggal_Pengecekan" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]">
</div>

        
        <!-- Tanggal Kadaluarsa -->
<div>
    <label for="tanggal_kadaluwarsa" class="block text-sm font-medium text-gray-700 mt-4">
        Tanggal kadaluwarsa<span class="text-red-500">*</span>
    </label>
    <input 
        type="date" 
        id="tanggal_kadaluwarsa" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]">
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

<script>
    // Fungsi untuk menangani dropdown umum
    function setupDropdown(buttonId, dropdownId, iconId) {
        const button = document.getElementById(buttonId);
        const dropdown = document.getElementById(dropdownId);
        const icon = document.getElementById(iconId);

        button.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });

        // Pilih opsi dan update teks tombol
        document.querySelectorAll(`#${dropdownId} li`).forEach(item => {
            item.addEventListener('click', () => {
                button.innerHTML = `${item.innerText} <svg id="${iconId}" class="w-5 h-5 ml-2 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path></svg>`;
                dropdown.classList.add('hidden');
                icon.classList.remove('rotate-180');
            });
        });

        // Tutup dropdown jika klik di luar
        document.addEventListener('click', (event) => {
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        });
    }

    // Setup dropdown untuk Peran
    setupDropdown('role-button', 'role-dropdown', 'dropdown-icon');

    // Setup dropdown untuk Jenis Kelamin
    setupDropdown('role-button1', 'role-dropdown1', 'dropdown-icon1');
</script>


<style>
    /* Animasi untuk dropdown */
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>

@endsection