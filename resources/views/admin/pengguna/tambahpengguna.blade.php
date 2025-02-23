@extends('layouts.pengguna.app')

@section('title', 'Pengguna')

@section('content')

<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ route('pengguna.index') }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Tambah Pengguna</span>
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
        <form action="{{ route('pengguna.store') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Email Input -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Email<span class="text-red-500">*</span>
                </label>
                <input
                    type="email" id="email" name="email"
                    class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#223E88] focus:border-[#223E88]"
                    placeholder="Masukkan email">
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
                    <ul id="role-dropdown" class="relative w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg hidden">
                        @foreach ($roles as $role)
                        <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role-id="{{ $role->id }}" data-role-name="{{ $role->name }}">
                            {{ $role->name }}
                        </li>
                        @endforeach
                    </ul>
                    <!-- Input Hidden untuk Menyimpan Nilai Peran -->
                    <input type="hidden" name="role_id" id="role" value="{{ old('role_id') }}">
                </div>
                @error('role_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
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
            document.addEventListener('DOMContentLoaded', function() {
                const roleButton = document.getElementById('role-button');
                const roleDropdown = document.getElementById('role-dropdown');
                const dropdownIcon = document.getElementById('dropdown-icon');
                const roleInput = document.getElementById('role');

                roleButton.addEventListener('click', () => {
                    roleDropdown.classList.toggle('hidden');
                    dropdownIcon.classList.toggle('rotate-180');
                });

                document.querySelectorAll('#role-dropdown li').forEach(item => {
                    item.addEventListener('click', () => {
                        const selectedRoleId = item.getAttribute('data-role-id');
                        const selectedRoleName = item.getAttribute('data-role-name');

                        roleButton.innerHTML = `${selectedRoleName} <svg id="dropdown-icon" class="w-5 h-5 ml-2 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path></svg>`;

                        roleInput.value = selectedRoleId;

                        roleDropdown.classList.add('hidden');
                        dropdownIcon.classList.remove('rotate-180');
                    });
                });

                document.addEventListener('click', (event) => {
                    if (!roleButton.contains(event.target) && !roleDropdown.contains(event.target)) {
                        roleDropdown.classList.add('hidden');
                        dropdownIcon.classList.remove('rotate-180');
                    }
                });
            });
        </script>

        <style>
            /* Additional styles for transition and arrow rotation */
            .rotate-180 {
                transform: rotate(180deg);
            }
        </style>

    </div>
    </form>
    </div>
    </section>

    @endsection