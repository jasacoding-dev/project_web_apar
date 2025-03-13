@extends('layouts.staff.profil.app')

@section('title', 'Profil')

@section('content')

<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto min-h-screen"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white shadow-md rounded-lg w-full  md:min-h-0">
        <table class=" w-full text-left border-collapse mt-2 rounded-lg overflow-hidden shadow-md">
            <!-- Header -->
            <div class="bg-[#0168AD] rounded-t-lg p-1 -mt-3">
                <nav class="flex justify-center space-x-4">
                    <a href="{{ route('staff.profile') }}" class="text-white font-semibold hover:underline">Detail Profil</a>
                    <a href="{{ route('staff.ubahkatasandi') }}" class="text-white font-normal hover:underline">Ubah Kata Sandi</a>
                </nav>
            </div>
            <!-- Responsive Container -->
            <div class="bg-white  rounded-b-lg p-4 sm:h-auto md:h-auto lg:max-h-full">
                <h2 class="text-lg font-bold mb-2 -mt-2">Ubah Informasi Data Diri</h2>
                <form action="{{ route('staff.updateProfile') }}" method="POST">
                    @csrf
                    <!-- NIP -->
                    <div class="mb-3">
                        <label for="nip" class="block text-sm font-medium text-gray-700">
                            NIP<span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nip" name="nip" class="mt-1 block w-full p-1 px-2 h-9 border border-gray-300 rounded-md text-sm" value="{{ $user->nip}}" placeholder="Masukkan NIP">
                    </div>

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="block text-sm font-medium text-gray-700">
                            Nama<span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" class="mt-1 block w-full px-2 p-1 h-9 border border-gray-300 rounded-md text-sm" value="{{ $user->name }}" placeholder="Masukkan Nama">
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="mb-3">
                        <label for="telepon" class="block text-sm font-medium text-gray-700">
                            Nomor Telepon<span class="text-red-500">*</span>
                        </label>
                        <input type="tel" id="phone" name="phone" class="mt-1 block w-full px-2 p-1 h-9 border border-gray-300 rounded-md text-sm" value="{{ $user->phone }}" placeholder="Masukkan No Telp">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email<span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full px-2 p-1 h-9 border border-gray-300 rounded-md text-sm" value="{{ $user->email }}" placeholder="Masukkan Email">
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">
                            Alamat<span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="address" name="address" class="mt-1 block w-full px-2 p-1 h-9 border border-gray-300 rounded-md text-sm" value="{{ $user->address }}" placeholder="Masukkan Alamat">
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="relative inline-block w-full mb-3">
                        <label for="gender" class="block text-sm font-medium text-gray-700">
                            Jenis Kelamin<span class="text-red-500">*</span>
                        </label>
                        <div id="dropdown1" class="mt-1 px-2 flex justify-between items-center block w-full p-1 h-9 border border-gray-300 rounded-md text-sm bg-white cursor-pointer">
                            <span id="dropdownText1">{{ $user->gender ?? 'Pilih Jenis Kelamin' }}</span>
                            <!-- SVG panah -->
                            <svg id="dropdownIcon1" class="w-4 h-4 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div id="options1" class="w-full mt-1 bg-white border border-gray-300 rounded-md shadow-md hidden">
                            <div class="p-2 hover:bg-yellow-200 cursor-pointer text-sm" data-value="Laki-Laki">Laki-Laki</div>
                            <div class="p-2 hover:bg-yellow-200 cursor-pointer text-sm" data-value="Perempuan">Perempuan</div>
                        </div>
                        <input type="hidden" id="gender" name="gender" value="{{ $user->gender }}">
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const dropdown = document.getElementById("dropdown1");
                            const options = document.getElementById("options1");
                            const dropdownText = document.getElementById("dropdownText1");
                            const dropdownIcon = document.getElementById("dropdownIcon1");
                            const genderInput = document.getElementById("gender");

                            dropdown.addEventListener("click", function() {
                                options.classList.toggle("hidden");
                                dropdownIcon.classList.toggle("rotate-180");
                            });

                            options.querySelectorAll("div").forEach(option => {
                                option.addEventListener("click", function() {
                                    dropdownText.textContent = this.textContent;
                                    genderInput.value = this.getAttribute("data-value");
                                    options.classList.add("hidden");
                                    dropdownIcon.classList.remove("rotate-180");
                                });
                            });

                            document.addEventListener("click", function(e) {
                                if (!dropdown.contains(e.target) && !options.contains(e.target)) {
                                    options.classList.add("hidden");
                                    dropdownIcon.classList.remove("rotate-180");
                                }
                            });
                        });
                    </script>

                    <!-- Tempat Lahir -->
                    <div class="mb-3">
                        <label for="tempat-lahir" class="block text-sm font-medium text-gray-700">
                            Tempat Lahir<span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="birthplace" name="birthplace" class="mt-1 px-2 block w-full p-1 h-9 border border-gray-300 rounded-md text-sm" value="{{ $user->birthplace }}" placeholder="Masukkan Tempat Lahir">
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="mb-3">
                        <label for="tanggal-lahir" class="block text-sm font-medium text-gray-700">
                            Tanggal Lahir<span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="birthdate" name="birthdate" class="mt-1 px-2 block w-full p-1 h-9 border border-gray-300 rounded-md text-sm" value="{{ $user->birthdate }}" placeholder="Masukkan Tanggal Lahir">
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="mt-4 text-center">
                        <button type="submit" class="w-80 justify-center bg-yellow-400 text-black font-bold py-2 rounded-lg hover:bg-yellow-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </table>
        </section>

        @endsection