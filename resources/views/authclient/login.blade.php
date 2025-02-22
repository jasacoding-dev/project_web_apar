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

        <div class="mb-3 sm:mb-4 w-full sm:max-w-[80%] md:max-w-[380px] relative">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 text-left">Kata Sandi</label>
            <div class="relative w-full">
                <input type="password" id="password" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none pr-10" placeholder="Masukkan Kata Sandi" required>
                <button type="button" onclick="togglePassword('password', 'togglePasswordIcon')" class="absolute inset-y-0 right-2 flex items-center">
            <svg id="togglePasswordIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
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
