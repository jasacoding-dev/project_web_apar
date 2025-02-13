@extends('layouts.login')

@section('title', 'Login')

@section('content')
    <!-- Placeholder untuk logo -->
    <div class="w-full flex justify-center mb-4 mt-16 sm:mt-28 md:mt-0">
        <div class="bg-gray-300 w-64 h-20 rounded"></div>
    </div>

    <!-- Form Login -->
    <form class="w-full flex flex-col items-center px-4 sm:px-0">
        <div class="mb-3 sm:mb-4 w-full sm:max-w-[80%] md:max-w-[380px]">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 text-left mt-8">Email</label>
            <input type="email" id="email"
                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none"
                placeholder="Masukkan Email" required>
        </div>

        <div class="mb-3 sm:mb-4 w-full sm:max-w-[80%] md:max-w-[380px]">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 text-left">Kata Sandi</label>
            <div class="relative">
                <input type="password" id="password"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none"
                    placeholder="Masukkan kata sandi" required>
                <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-500"
                    onclick="togglePassword()">
                    <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8zm9-2a2 2 0 114 0 2 2 0 01-4 0z">
                        </path>
                        <line id="slash-line" x1="4" y1="20" x2="20" y2="4" style="display: none;"></line>
                    </svg>
                </span>
            </div>
        </div>

        <div class="w-full sm:max-w-[80%] md:max-w-[380px] flex justify-end mb-4">
            <a href="/forgot-password1" class="text-[#E6C900] text-sm font-medium hover:underline">Lupa Kata Sandi?</a>
        </div>

        <button type="button" onclick="window.location.href='/admin/dashboard'"
            class="w-full sm:max-w-[80%] md:max-w-[380px] bg-[#FFDF00] text-black font-bold py-2 rounded-lg shadow  transition">
            Masuk
        </button>
    </form>

    <div class="text-center mt-14 sm:mt-28">
        <p class="text-black font-semibold text-sm">Belum punya akun? <a href="/create-account"
                class="text-[#E6C900] font-medium hover:underline">Daftar di sini</a></p>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const slashLine = document.getElementById('slash-line');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                slashLine.style.display = 'block';
                eyeIcon.classList.add('stroke-red-500');
            } else {
                passwordInput.type = 'password';
                slashLine.style.display = 'none';
                eyeIcon.classList.remove('stroke-red-500');
            }
        }
    </script>
@endsection
