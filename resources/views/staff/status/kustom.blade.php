@extends('layouts.staff.barcode.app')

@section('title', 'Barcode')

@section('content')

<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Kustom Laporan</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 mt-2 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white shadow-md rounded-lg p-6 h-[90%] w-full -mt-4">
        <!-- Title -->
        <div class="text-center mb-6">
            <h2 class="text-xl font-bold">Masukkan Data Laporan</h2>
            <p class="text-sm text-gray-600">Isi laporan berdasarkan hasil pengecekan kondisi APAR</p>
        </div>

        <!-- Form -->
        <form action="{{ route('laporan.kustom.store', $nomor_apar) }}" method="POST" class="space-y-4">
            @csrf
            <!-- Email Input -->
            <div>
                <label for="temuan" class="block text-sm font-medium text-gray-700">
                    Temuan<span class="text-red-500">*</span>
                </label>
                <input
                    type="temuan" id="temuan" name="temuan"
                    class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88]"
                    placeholder="Masukkan Temuan">
            </div>

            <div>
                <label for="Jumlah" class="block text-sm font-medium text-gray-700">
                    Jumlah<span class="text-red-500">*</span>
                </label>
                <input
                    type="number" id="Jumlah" name="jumlah"
                    class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88]"
                    placeholder="Masukkan Jumlah">
            </div>

            <!-- Peran Dropdown -->
            <div>
                <label for="rencana_tindak_lanjut" class="block text-sm font-medium text-gray-700">
                    Rencana Tingkat Lanjut<span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <button type="button" id="role-button" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88] flex justify-between items-center">
                        <span id="selected-option">Pilih Rencana Tingkat Lanjut</span>
                        <svg id="dropdown-icon" class="w-5 h-5 ml-2 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path>
                        </svg>
                    </button>
                    <ul id="role-dropdown" class="relative w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                        <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-tindak-lanjut="Perlu Pengecekan">Perlu Pengecekan</li>
                        <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-tindak-lanjut="Perlu Pengadaan">Perlu Pengadaan</li>
                        <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-tindak-lanjut="Perlu Penggantian">Perlu Penggantian</li>
                    </ul>
                    <input type="hidden" name="rencana_tindak_lanjut" id="rencana_tindak_lanjut" required>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="flex justify-center">
                <button
                    type="submit"
                    class="bg-[#FFDF00] w-80 text-black font-bold px-8 py-2 rounded-lg transition mt-4">
                    Simpan
                </button>
            </div>
        </form>

        <script>
            const roleButton = document.getElementById('role-button');
            const roleDropdown = document.getElementById('role-dropdown');
            const dropdownIcon = document.getElementById('dropdown-icon');
            const selectedOption = document.getElementById('selected-option');
            const rencanaTindakLanjutInput = document.getElementById('rencana_tindak_lanjut');

            roleButton.addEventListener('click', () => {
                roleDropdown.classList.toggle('hidden');
                dropdownIcon.classList.toggle('rotate-180');
            });

            // Select role and update button text
            const roleItems = document.querySelectorAll('#role-dropdown li');
            roleItems.forEach(item => {
                item.addEventListener('click', () => {
                    const selectedRole = item.getAttribute('data-tindak-lanjut');
                    roleButton.innerHTML = `${selectedRole} <svg id="dropdown-icon" class="w-5 h-5 ml-2 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path></svg>`;
                    selectedOption.textContent = item.textContent;
                    rencanaTindakLanjutInput.value = selectedRole;
                    roleDropdown.classList.add('hidden');
                    dropdownIcon.classList.remove('rotate-180');
                });
            });

            // Close the dropdown if clicked outside
            document.addEventListener('click', (event) => {
                if (!roleButton.contains(event.target) && !roleDropdown.contains(event.target)) {
                    roleDropdown.classList.add('hidden');
                    dropdownIcon.classList.remove('rotate-180');
                }
            });
        </script>

        <style>
            /* Additional styles for transition and arrow rotation */
            .rotate-180 {
                transform: rotate(180deg);
            }
        </style>


    </div>

    @endsection