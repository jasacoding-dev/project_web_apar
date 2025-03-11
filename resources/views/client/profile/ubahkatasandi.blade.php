@extends('layouts.client.profil.app')

@section('title', 'Profil')

@section('content')

<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto "> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white shadow-md rounded-lg w-full  md:min-h-0">
        <table class=" w-full text-left border-collapse mt-2 rounded-lg overflow-hidden shadow-md">
            <!-- Header -->
            <div class="bg-[#0168AD] rounded-t-lg p-1 -mt-3">
                <nav class="flex justify-center space-x-4">
                    <a href="{{ route('client.profile') }}" class="text-white font-normal hover:underline">Detail Profil</a>
                    <a href="{{ route('client.ubahkatasandi') }}" class="text-white font-semibold hover:underline">Ubah Kata Sandi</a>
                </nav>
            </div>

            <!-- Responsive Container -->
            <div class="bg-white  rounded-b-lg p-4 w-full sm:w-[96%] md:w-full min-h-[80vh] md:min-h-0 flex flex-col justify-start overflow-auto">
                <h2 class="text-lg font-bold mb-2 sm:mb-3 text-left">Ubah Kata Sandi</h2>

                <form action="{{ route('client.updatePassword') }}" method="POST" class="flex flex-col justify-start gap-2 sm:gap-3">
                    @csrf
                    <!-- Kata Sandi Lama -->
                    <div class="mb-1 sm:mb-2">
                        <label for="katasandilama" class="block text-sm font-medium text-gray-700">
                            Kata Sandi Lama<span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <input type="password" id="katasandilama" name="katasandilama" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm pr-10 group-hover:border-gray-400 focus:border-gray-400 transition duration-200">
                            <button type="button" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-gray-200" onclick="togglePassword('katasandilama', 'eye1')">
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
                            <input type="password" id="katasandibaru" name="katasandibaru" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm pr-10 group-hover:border-gray-400 focus:border-gray-400 transition duration-200">
                            <button type="button" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-gray-200" onclick="togglePassword('katasandibaru', 'eye2')">
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
                            <input type="password" id="konfirmasikatasandi" name="katasandibaru_confirmation" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm pr-10 group-hover:border-gray-400 focus:border-gray-400 transition duration-200">
                            <button type="button" class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-gray-200" onclick="togglePassword('konfirmasikatasandi', 'eye3')">
                                <svg id="eye3" class="w-5 h-5 transition duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Lupa Kata Sandi -->
                    <div class="mt-1 sm:mt-1 text-right">
                        <a href="{{ route('client.lupasandi') }}" class="text-yellow-500 text-sm font-medium hover:underline">
                            Lupa Kata Sandi?
                        </a>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="mt-3 sm:mt-2 text-center">
                        <button type="submit" class="w-full sm:w-80 inline-block text-center bg-yellow-400 text-black font-bold py-2 rounded-lg hover:bg-yellow-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </table>
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

        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A9.956 9.956 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.02 10.02 0 015.339-5.339m3.303-.661a9.956 9.956 0 013.303-.661c4.478 0 8.268 2.943 9.542 7a10.02 10.02 0 01-5.339 5.339m-3.303.661A9.956 9.956 0 0112 19m0 0a9.956 9.956 0 01-3.303-.661M12 5a9.956 9.956 0 013.303.661M3 3l18 18" />
            `;
            } else {
                input.type = "password";
                icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
            }
        }
    </script>
    @endsection