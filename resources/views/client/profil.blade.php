@extends('layouts.client.profil.app')

@section('title', 'Profil')

@section('content')

<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto min-h-screen"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white  rounded-lg w-full  md:min-h-0">
        <table class=" w-full text-left border-collapse mt-2 rounded-lg overflow-hidden shadow-md">
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
<div class="relative flex flex-col md:flex-row items-center pb-2 mb-6 border border-black rounded-lg p-4 -mt-2">
    <div class="relative">
        <!-- Foto Profil -->
        <img src="{{ asset('img/person-dummy.jpg') }}" alt="Profile Picture" class="w-16 h-16 rounded-full border mb-3 md:mb-0 md:mr-4">
        
        <!-- Tombol Edit -->
        <button class="absolute bottom-0 right-0 transform translate-x-1/4 translate-y-1/4 bg-white border border-gray-300 p-1.5 rounded-full shadow-md mr-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-gray-600">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>

        </button>
    </div>
    <div class="text-center md:text-left">
        <p class="text-sm font-bold"></p>
        <p class="text-sm text-gray-600"></p>
    </div>
</div>

                <!-- Informasi Data Diri -->
                <div class="bg-white border border-black p-4 rounded-lg shadow-inner relative -mt-4">
                    <h3 class="text-md font-bold mb-6">Informasi Data Diri</h3>

                    <!-- Grid: 1 Kolom di Mobile, 2 Kolom di Desktop -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-3 gap-x-6 text-sm">
                        <div class="space-y-3">
                            <p><span class="font-bold">NIP</span><br>{{ $user->nip ?? '-'}}</p>
                            <p><span class="font-bold">No. Telepon</span><br>{{ $user->phone ?? '-'}}</p>
                            <p><span class="font-bold">Alamat</span><br>{{ $user->address ?? '-'}}</p>
                            <p><span class="font-bold">Tempat Lahir</span><br>{{ $user->birthplace ?? '-'}}</p>
                        </div>
                        <div class="space-y-3">
                            <p><span class="font-bold">Nama</span><br>{{ $user->name ?? '-'}}</p>
                            <p><span class="font-bold">Email</span><br>{{ $user->email ?? '-'}}</p>
                            <p><span class="font-bold">Jenis Kelamin</span><br>{{ $user->gender ?? '-'}}</p>
                            <p><span class="font-bold">Tanggal Lahir</span><br>{{ $user->birthdate ?? '-'}}</p>
                        </div>
                    </div>

                    <!-- Edit Button -->
                    <button
                        class="absolute top-4 right-4 p-2 rounded-full cursor-pointer w-auto h-11 text-white p-1 rounded-lg border-2 px-1 py-1 bg-[#0168AD] transition mr-4"
                        onclick="window.location.href='/admin/'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                </div>
            </div>
        </table>
    </div>
    </section>

    @endsection