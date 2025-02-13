@extends('layouts.profil.app')

@section('title', 'Profil')

@section('content')
    <!-- Table -->
    <table class="table-auto w-full text-left border-collapse mt-2 rounded-lg overflow-hidden shadow-2xl drop-shadow-lg">
        <div class="bg-[#0168AD] rounded-t-lg p-2 -mt-3">
            <nav class="flex justify-center space-x-4">
                <a href="#" class="text-white font-bold hover:underline">Detail Profil</a>
                <a href="/admin/ubahkatasandi" class="text-white  hover:underline">Ubah Kata Sandi</a>
            </nav>
        </div>
        <!-- Responsive Container -->
        <div class="bg-white shadow-md rounded-b-lg p-4 sm:h-auto md:h-auto lg:max-h-[430px] lg:overflow-y-auto">
            <h2 class="text-lg font-bold mb-2 -mt-2">Ubah Informasi Data Diri</h2>
            <form>
                <!-- NIP -->
                <div class="mb-3">
                    <label for="nip" class="block text-sm font-medium text-gray-700">
                        NIP<span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nip" class="mt-1 block w-full p-1 px-2 h-9 border border-gray-300 rounded-md text-sm" placeholder="XXXXXXXXXX">
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="block text-sm font-medium text-gray-700">
                        Nama<span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama" class="mt-1 block w-full px-2 p-1 h-9 border border-gray-300 rounded-md text-sm" placeholder="Surya Wijaya">
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label for="telepon" class="block text-sm font-medium text-gray-700">
                        Nomor Telepon<span class="text-red-500">*</span>
                    </label>
                    <input type="tel" id="telepon" class="mt-1 block w-full px-2 p-1 h-9 border border-gray-300 rounded-md text-sm" placeholder="089675426678">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email<span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" class="mt-1 block w-full px-2 p-1 h-9 border border-gray-300 rounded-md text-sm" placeholder="suryawijaya@gmail.com">
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">
                        Alamat<span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="alamat" class="mt-1 block w-full px-2 p-1 h-9 border border-gray-300 rounded-md text-sm" placeholder="Jl. Kenangan No.01">
                </div>

             <!-- Jenis Kelamin -->
<div class="relative inline-block w-full mb-3">
    <label for="gender" class="block text-sm font-medium text-gray-700">
        Jenis Kelamin<span class="text-red-500">*</span>
    </label>
    <div id="dropdown" class="mt-1 px-2 flex justify-between items-center block w-full p-1 h-9 border border-gray-300 rounded-md text-sm bg-white cursor-pointer">
        <span id="dropdownText">Pilih Jenis Kelamin</span>
        <!-- SVG panah -->
        <svg id="dropdownIcon" class="w-4 h-4 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </div>
    <div id="options" class="absolute w-full mt-1 bg-white border border-gray-300 rounded-md shadow-md hidden">
        <div class="p-2 hover:bg-yellow-200 cursor-pointer text-sm" data-value="Laki - Laki">Laki - Laki</div>
        <div class="p-2 hover:bg-yellow-200 cursor-pointer text-sm" data-value="Perempuan">Perempuan</div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdown = document.getElementById("dropdown");
        const options = document.getElementById("options");
        const dropdownText = document.getElementById("dropdownText");
        const dropdownIcon = document.getElementById("dropdownIcon");

        dropdown.addEventListener("click", function () {
            options.classList.toggle("hidden");
            dropdownIcon.classList.toggle("rotate-180"); // Rotasi ikon saat klik
        });

        options.querySelectorAll("div").forEach(option => {
            option.addEventListener("click", function () {
                dropdownText.textContent = this.textContent;
                options.classList.add("hidden");
                dropdownIcon.classList.remove("rotate-180"); // Kembalikan ikon ke posisi awal
            });
        });

        document.addEventListener("click", function (e) {
            if (!dropdown.contains(e.target) && !options.contains(e.target)) {
                options.classList.add("hidden");
                dropdownIcon.classList.remove("rotate-180"); // Kembalikan ikon jika klik di luar
            }
        });
    });
</script>



                <!-- Tempat Lahir -->
                <div class="mb-3">
                    <label for="tempat-lahir" class="block text-sm font-medium text-gray-700">
                        Tempat Lahir<span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="tempat-lahir" class="mt-1 px-2 block w-full p-1 h-9 border border-gray-300 rounded-md text-sm" placeholder="Jakarta">
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tanggal-lahir" class="block text-sm font-medium text-gray-700">
                        Tanggal Lahir<span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal-lahir" class="mt-1 px-2 block w-full p-1 h-9 border border-gray-300 rounded-md text-sm">
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