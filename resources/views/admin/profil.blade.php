@extends('layouts.profil.app')

@section('title', 'Profil')

@section('content')
    <div class="w-full max-w-md md:max-w-full mx-auto">
        <table class="table-auto w-full text-left border-collapse mt-2 rounded-lg overflow-hidden shadow-md">
            <!-- Header -->
            <div class="bg-[#0168AD] rounded-t-lg p-1 -mt-3">
                <nav class="flex justify-center space-x-4">
                    <a href="#" class="text-white font-semibold hover:underline">Detail Profil</a>
                    <a href="/admin/ubahkatasandi" class="text-white font-semibold hover:underline">Ubah Kata Sandi</a>
                </nav>
            </div>

            <div class="bg-white shadow-md rounded-b-lg p-2">
                <h2 class="text-lg font-bold mb-4">Detail Profil</h2>

                <!-- Foto Profil -->
                <div class="flex flex-col md:flex-row items-center pb-2 mb-6 border border-black rounded-lg p-4 -mt-2">
                    <img src="{{ asset('storage/ke3.png') }}" alt="Profile Picture" class="w-16 h-16 rounded-full border mb-3 md:mb-0 md:mr-4">
                    <div class="text-center md:text-left">
                        <p class="text-sm font-bold">Surya Wijaya</p>
                        <p class="text-sm text-gray-600">Admin</p>
                    </div>
                </div>

                <!-- Informasi Data Diri -->
                <div class="bg-white border border-black p-4 rounded-lg shadow-inner relative -mt-4">
                    <h3 class="text-md font-bold mb-4">Informasi Data Diri</h3>
                    
                    <!-- Grid: 1 Kolom di Mobile, 2 Kolom di Desktop -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-3 gap-x-6 text-sm">
                        <div class="space-y-3">
                            <p><span class="font-bold">NIP</span><br>XXXXXXXXXX</p>
                            <p><span class="font-bold">No. Telepon</span><br>089675426678</p>
                            <p><span class="font-bold">Alamat</span><br>Jl. Kenangan No. 01</p>
                            <p><span class="font-bold">Tempat Lahir</span><br>Jakarta</p>
                        </div>
                        <div class="space-y-3">
                            <p><span class="font-bold">Nama</span><br>Surya Wijaya</p>
                            <p><span class="font-bold">Email</span><br>suryawijaya@gmail.com</p>
                            <p><span class="font-bold">Jenis Kelamin</span><br>Laki - Laki</p>
                            <p><span class="font-bold">Tanggal Lahir</span><br>31/01/1999</p>
                        </div>
                    </div>

                   <!-- Tombol Edit -->
<a href="/admin/ubahprofil" class="absolute top-4 right-4 p-2 rounded-full cursor-pointer">
    <img src="{{ asset('storage/svgsvg.png') }}" alt="Edit" class="w-7 h-7">
</a>
                </div>
            </div>
        </table>
    </div>
</section>

@endsection
