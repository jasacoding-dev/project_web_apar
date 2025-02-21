@extends('layouts.login')

@section('title', 'Login')

@section('content')

<!-- Placeholder untuk logo -->
<div class="w-full flex justify-center mb-4 mt-16 sm:mt-28 md:mt-0">
    <div class="bg-gray-300 w-64 h-20 rounded"></div>
</div>

<!-- Form Login -->
<form method="POST" action="{{ route('login') }}" class="w-full flex flex-col items-center px-4 sm:px-0">
    @csrf
    <div class="mb-3 sm:mb-4 w-full sm:max-w-[80%] md:max-w-[380px]">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 text-left mt-8">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}"
            class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none"
            placeholder="Masukkan Email" required>
    </div>

    <div class="mb-3 sm:mb-4 w-full sm:max-w-[80%] md:max-w-[380px] relative">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 text-left">Kata Sandi</label>
        <div class="relative w-full">
            <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none pr-10" placeholder="Masukkan Kata Sandi" required>
            <button type="button" id="togglePassword" class="absolute inset-y-0 right-2 flex items-center">
                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
            </button>
        </div>
    </div>
    <div class="w-full sm:max-w-[80%] md:max-w-[380px] flex justify-end mb-4">
        <a href="{{ route('password.request') }}" class="text-[#E6C900] text-sm font-medium hover:underline">Lupa Kata Sandi?</a>
    </div>

    <button type="submit"
        class="w-full sm:max-w-[80%] md:max-w-[380px] bg-[#FFDF00] text-black font-bold py-2 rounded-lg shadow  transition">
        Masuk
    </button>
</form>

<div class="text-center mt-14 sm:mt-28">
    <p class="text-black font-semibold text-sm">Belum punya akun? <a href="{{ route('register') }}"
            class="text-[#E6C900] font-medium hover:underline">Daftar di sini</a></p>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        let passwordInput = document.getElementById('password');
        let eyeIcon = document.getElementById('eyeIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = '<path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z" /><circle cx="12" cy="12" r="3" />';
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = '<path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z" /><circle cx="12" cy="12" r="3" />';
        }
    });
</script>
@endsection
