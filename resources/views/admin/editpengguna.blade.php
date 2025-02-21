@extends('layouts.pengguna.app')

@section('title', 'Pengguna')

@section('content')
<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Edit Pengguna</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 mt-2 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white shadow-md rounded-lg p-6 h-[90%] w-full -mt-4">
        <!-- Title -->
        <div class="text-center mb-6">
            <h2 class="text-xl font-bold">Masukkan Data</h2>
            <p class="text-sm text-gray-600">Masukkan email dan peran untuk menambahkan pengguna</p>
    </div>

    <!-- Form -->
    <form class="space-y-4">
        <!-- NIP Input -->
        <div>
            <label for="nip" class="block text-sm font-medium text-gray-700">
                NIP<span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="nip" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88]" 
                placeholder="xxxxxx">
        </div>

        <!-- Nama Pengguna -->
        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">
                Nama Pengguna<span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="nama" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88]" 
                placeholder="Masukkan nama pengguna">
        </div>

        <!-- Peran Dropdown -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">
                Peran<span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <button type="button" id="role-button" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88] flex justify-between items-center">
                    Pilih Peran
                    <svg id="dropdown-icon" class="w-5 h-5 ml-2 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path>
                    </svg>
                </button>
                <ul id="role-dropdown" class="absolute w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                    <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Admin">Admin</li>
                    <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Manager">Manager</li>
                    <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Staff">Staff</li>
                </ul>
            </div>
        </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                Email<span class="text-red-500">*</span>
            </label>
            <input 
                type="email" 
                id="email" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88]" 
                placeholder="Masukkan email">
        </div>

         <!-- Alamat -->
         <div>
            <label for="Alamat" class="block text-sm font-medium text-gray-700">
                Alamat<span class="text-red-500">*</span>
            </label>
            <input 
                type="Alamat" 
                id="Alamat" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88]" 
                placeholder="Masukkan Alamat">
        </div>

        <!-- Peran Jenis Kelamin -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700">
                Jenis Kelamin<span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <button type="button" id="role-button1" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88] flex justify-between items-center">
                    Pilih Jenis Kelamin
                    <svg id="dropdown-icon1" class="w-5 h-5 ml-2 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path>
                    </svg>
                </button>
                <ul id="role-dropdown1" class="absolute w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                    <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Admin">Laki-Laki</li>
                    <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Manager">Perempuan</li>
                </ul>
            </div>
       
             <!-- Tempat Lahir -->
         <div>
            <label for="Tempat Lahir" class="block text-sm font-medium text-gray-700 mt-4">
                Tempat Lahir<span class="text-red-500">*</span>
            </label>
            <input 
                type="Tempat Lahir" 
                id="Tempat Lahir" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88]" 
                placeholder="Masukkan Tempat Lahir">
        </div>


        <!-- Tanggal Lahir -->
<div>
    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mt-4">
        Tanggal Lahir<span class="text-red-500">*</span>
    </label>
    <input 
        type="date" 
        id="tanggal_lahir" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88]">
</div>

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