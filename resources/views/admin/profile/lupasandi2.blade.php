@extends('layouts.profil.app')

@section('title', 'Reset Kata Sandi')

@section('content')
<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto">
    <div class="bg-white shadow-md rounded-lg w-full md:min-h-0">
        <table class="w-full text-left border-collapse mt-2 rounded-lg overflow-hidden shadow-md">
            <!-- Header -->
            <div class="bg-[#0168AD] rounded-t-lg p-1 -mt-3">
                <nav class="flex justify-center space-x-4">
                    <a href="{{ route('admin.profile') }}" class="text-white font-normal hover:underline">Detail Profil</a>
                    <a href="{{ route('admin.ubahkatasandi') }}" class="text-white font-semibold hover:underline">Ubah Kata Sandi</a>
                </nav>
            </div>
            <!-- Responsive Container -->
            <div class="bg-white rounded-b-lg p-4 w-full sm:w-[96%] md:w-full min-h-[80vh] md:min-h-0 flex flex-col justify-start overflow-auto">
                <h2 class="text-lg font-bold mb-2 sm:mb-3 text-left">Reset Kata Sandi</h2>

                <!-- Tampilkan pesan error/success -->
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('admin.resetPassword') }}" method="POST" class="flex flex-col justify-start gap-2 sm:gap-3">
                    @csrf
                    <!-- Email (hidden) -->
                    <input type="hidden" name="email" value="{{ $email }}">
                    <!-- Token (hidden) -->
                    <input type="hidden" name="token" value="{{ $token }}">

                    <!-- Kata Sandi Baru -->
                    <div class="mb-1 sm:mb-2">
                        <label for="katasandibaru" class="block text-sm font-medium text-gray-700">
                            Kata Sandi Baru<span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <input type="password" id="katasandibaru" name="katasandibaru" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm pr-10 group-hover:border-gray-400 focus:border-gray-400 transition duration-200">
                            <button type="button" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-blue-500" onclick="togglePassword('katasandibaru', 'eye1')">
                                <svg id="eye1" class="w-5 h-5 transition duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                            <input type="password" id="konfirmasikatasandi" name="katasandibaru_confirmation" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm pr-10 group-hover:border-gray-400 focus:border-gray-400 transition duration-200">
                            <button type="button" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-blue-500" onclick="togglePassword('konfirmasikatasandi', 'eye2')">
                                <svg id="eye2" class="w-5 h-5 transition duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="mt-8 sm:mt-2 text-center">
                        <button type="submit" class="w-full sm:w-80 inline-block text-center bg-yellow-400 text-black font-bold py-2 rounded-lg hover:bg-yellow-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </table>
    </div>
</main>

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