@extends('layouts.lokasi.app')

@section('title', 'Lokasi')

@section('content')
<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ route('lokasi.index') }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Tambah Lokasi</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 -mt-4 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <!-- 🔹 Tulisan "Edit APAR" -->
        <h2 class="text-center text-xl font-bold mb-2">Tambah Lokasi</h2>
        <p class="text-center text-gray-500 mb-4">Masukkan lokasi sesuai dengan penempatan APAR</p>


        <form action="{{ route('lokasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Form -->
            <form class="space-y-4">
                <!--  Nama Gedung Input -->
                <div>
                    <label for=" Nama Gedung" class="block text-sm font-medium text-gray-700">
                        Nama Gedung Apar<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text" id="Nama Gedung" name="nama_gedung"
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]"
                        placeholder="Masukkan Nama Gedung">
                </div>

                <!-- Sistem Lantai -->
                <div>
                    <label for="Sistem Kerja" class="block text-sm font-medium text-gray-700 mt-4">
                        Lantai<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text" id="Lantai" name="lantai"
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]"
                        placeholder="Masukkan Lantai">
                </div>

                <!-- Nama Ruangan -->
                <div>
                    <label for="Nama Ruangan" class="block text-sm font-medium text-gray-700 mt-4">
                        Nama Ruangan<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text" id="nama_ruangan" name="nama_ruangan"
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]"
                        placeholder="Masukkan Nama Ruangan">
                </div>

                <!-- Pemilik Gedung -->
                <div>
                    <label for="Pemilik Gedung" class="block text-sm font-medium text-gray-700 mt-4">
                        Pemilik Gedung<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text" id="pemilik_gedung" name="pemilik_gedung"
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]"
                        placeholder="Masukkan Pemilik Gedung">
                </div>

                <!-- Alamat Gedung -->
                <div>
                    <label for="Alamat Gedung" class="block text-sm font-medium text-gray-700 mt-4">
                        Alamat Gedung<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text" id="alamat_gedung" name="alamat_gedung"
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]"
                        placeholder="Masukkan Alamat Gedung">
                </div>

                <!-- Pic Gedung -->
                <div>
                    <label for="Pic Gedung" class="block text-sm font-medium text-gray-700 mt-4">
                        Pic Gedung<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text" id="pic_gedung" name="pic_gedung"
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]"
                        placeholder="Masukkan Pic Gedung">
                </div>

                <!-- Satuan Kerja -->
                <div>
                    <label for="Satuan Kerja" class="block text-sm font-medium text-gray-700 mt-4">
                        Satuan Kerja<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text" id="satuan_kerja" name="satuan_kerja"
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]"
                        placeholder="Masukkan Satuan Kerja">
                </div>

                <!-- Tanggal Pengecekan -->
                <div>
                    <label for="tanggal_Pengecekan" class="block text-sm font-medium text-gray-700 mt-4">
                        Tanggal Pengecekan<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="date" id="tanggal_pengecekan" name="tanggal_pengecekan"
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]">
                </div>


                <!-- Tanggal Kadaluarsa -->
                <div>
                    <label for="tanggal_kadaluwarsa" class="block text-sm font-medium text-gray-700 mt-4">
                        Tanggal kadaluwarsa<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="date" id="tanggal_kadaluwarsa" name="tanggal_kadaluwarsa"
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
                            name="foto"
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