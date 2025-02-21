@extends('layouts.profil.app')

@section('title', 'Profil')

@section('content')
  
<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto "> <!-- mt-4 untuk mendekatkan ke tombol back -->
<div class="bg-white shadow-md rounded-lg w-full  md:min-h-0">
        <table class=" w-full text-left border-collapse mt-2 rounded-lg overflow-hidden shadow-md">
            <!-- Header -->
            <div class="bg-[#0168AD] rounded-t-lg p-1 -mt-3">
                <nav class="flex justify-center space-x-4">
                    <a href="/admin/ubahprofil" class="text-white font-normal hover:underline">Detail Profil</a>
                    <a href="/admin/ubahkatasandi" class="text-white font-semibold hover:underline">Ubah Kata Sandi</a>
                </nav>
            </div>

   <!-- Responsive Container -->
   <div class="bg-white  rounded-b-lg p-4 w-full sm:w-[96%] md:w-full min-h-[80vh] md:min-h-0 flex flex-col justify-start overflow-auto">
   <h2 class="text-lg font-bold mb-2 sm:mb-3 text-left">Ubah Kata Sandi</h2>

    <form class="flex flex-col  justify-start gap-2 sm:gap-3"> 
        <!-- Kata Sandi Lama -->
        <div class="mb-1 sm:mb-2">
            <label for="katasandilama" class="block text-sm font-medium text-gray-700">
                Kata Sandi Lama<span class="text-red-500">*</span>
            </label>
            <div class="relative group">
                <input type="password" id="katasandilama" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm pr-10 
                group-hover:border-gray-400 focus:border-gray-400 transition duration-200">
                <button type="button" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-blue-500" 
                    onclick="togglePassword('katasandilama', 'eye1')">
                    <svg id="eye1" class="w-5 h-5 transition duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Kata Sandi Baru -->
        <div class="mb-1 sm:mb-2">
            <label for="katasandibaru" class="block text-sm font-medium text-gray-700">
                Kata Sandi Baru<span class="text-red-500">*</span>
            </label>
            <div class="relative group">
                <input type="password" id="katasandibaru" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm pr-10 
                group-hover:border-gray-400 focus:border-gray-400 transition duration-200">
                <button type="button" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-gray-200" 
                    onclick="togglePassword('katasandibaru', 'eye2')">
                    <svg id="eye2" class="w-5 h-5 transition duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Konfirmasi Kata Sandi Baru -->
        <div class="mb-1 sm:mb-2">
            <label for="konfirmasikatasandi" class="block text-sm font-medium text-gray-700">
                Konfirmasi Kata Sandi Baru<span class="text-red-500">*</span>
            </label>
            <div class="relative group">
                <input type="password" id="konfirmasikatasandi" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm pr-10 
                group-hover:border-gray-400 focus:border-gray-400 transition duration-200">
                <button type="button" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-gray-200" 
                    onclick="togglePassword('konfirmasikatasandi', 'eye3')">
                    <svg id="eye3" class="w-5 h-5 transition duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Lupa Kata Sandi -->
        <div class="mt-1 sm:mt-1 text-right">
            <a href="/admin/lupasandi" class="text-yellow-500 text-sm font-medium hover:underline">
                Lupa Kata Sandi?
            </a>
        </div>

        <!-- Tombol Simpan -->
        <div class="mt-3 sm:mt-2 text-center">
    <a href="/admin/lupasandi" class="w-full sm:w-80 inline-block text-center bg-yellow-400 text-black font-bold py-2 rounded-lg hover:bg-yellow-500">
        Simpan
    </a>
</div>

        </div>
    </form>
</div>



<script>
    function togglePassword(inputId, eyeId) {
        const input = document.getElementById(inputId);
        const eyeIcon = document.getElementById(eyeId);

        if (input.type === "password") {
            input.type = "text";
            eyeIcon.classList.add("text-blue-500");
        } else {
            input.type = "password";
            eyeIcon.classList.remove("text-blue-500");
        }
    }
</script>
@endsection