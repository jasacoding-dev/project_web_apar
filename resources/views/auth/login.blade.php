@extends('layouts.login')

@section('title', 'Login')

@section('content')

<!-- Placeholder untuk logo -->
<div class="w-full flex justify-center mb-4 mt-16 sm:mt-28 md:mt-0">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" zoomAndPan="magnify" viewBox="0 0 375 374.999991" height="80" preserveAspectRatio="xMidYMid meet" version="1.0">
        <defs><g/><clipPath id="ef4682ef8e"><path d="M 81.21875 19.195312 L 293.46875 19.195312 L 293.46875 252.445312 L 81.21875 252.445312 Z M 81.21875 19.195312 " clip-rule="nonzero"/></clipPath></defs>
        <g clip-path="url(#ef4682ef8e)">
            <path fill="#ed1c24" d="M 187.335938 39.433594 C 184.503906 39.433594 181.699219 39.546875 178.921875 39.765625 C 179.277344 40.488281 179.648438 41.195312 180.035156 41.890625 C 183.875 48.722656 189.183594 54.648438 192.890625 61.554688 C 197.214844 69.625 199.042969 78.925781 198.433594 88.058594 C 198.058594 93.660156 204.628906 97.003906 208.789062 93.246094 C 208.835938 93.207031 208.878906 93.167969 208.925781 93.125 C 216.542969 86.167969 219.910156 74.859375 217.347656 64.851562 C 229.824219 82.023438 232.207031 106.046875 223.34375 125.347656 C 221.53125 129.300781 219.261719 133.132812 218.488281 137.414062 C 217.523438 142.765625 219.542969 149.257812 225.773438 150.183594 C 228.683594 150.613281 231.601562 149.539062 233.789062 147.5625 C 238.265625 143.511719 239.132812 137.300781 238.878906 131.515625 C 238.65625 126.585938 237.726562 121.671875 238.042969 116.746094 C 253.445312 132.527344 284.730469 226.242188 190.65625 243.296875 C 230.3125 215.226562 227.136719 172.15625 208.566406 141.261719 C 210.246094 144.054688 220.304688 188.0625 192.53125 197.082031 C 190.351562 197.792969 187.777344 197.421875 186.035156 195.929688 C 184.71875 194.804688 183.976562 193.101562 183.769531 191.378906 C 183.339844 187.75 184.960938 184.078125 186.296875 180.800781 C 193.636719 162.835938 193.6875 142 186.441406 124 C 189.191406 148.050781 177.464844 151.078125 169.925781 163.046875 C 161.917969 175.765625 156.242188 195.773438 167.316406 204.253906 C 163.015625 202.5625 150.570312 196.320312 145.042969 179.75 C 142.515625 217.980469 153.132812 225.875 171.617188 242.390625 C 150.019531 235.96875 135.398438 223.652344 123.664062 203.296875 C 113.617188 185.871094 113.96875 162.59375 119.445312 143.230469 C 124.921875 123.867188 136.539062 106.6875 150.445312 92.175781 C 150.445312 92.175781 136.109375 115.5625 140.117188 139.644531 C 141.285156 146.675781 143.539062 160.804688 152.039062 162.75 C 156.808594 163.84375 159.015625 159.339844 157.207031 155.359375 C 156.203125 153.144531 154.371094 151.433594 152.957031 149.480469 C 145.9375 139.792969 149.214844 126.039062 154.953125 115.535156 C 160.691406 105.03125 168.710938 95.378906 170.992188 83.621094 C 173.117188 72.667969 169.949219 61.488281 168.621094 50.410156 C 167.292969 39.332031 168.449219 26.660156 176.882812 19.386719 C 176.882812 19.386719 164.011719 25.4375 159.957031 43.011719 C 114.621094 55.117188 81.21875 96.570312 81.21875 145.847656 C 81.21875 204.617188 128.730469 252.261719 187.335938 252.261719 C 245.945312 252.261719 293.457031 204.617188 293.457031 145.847656 C 293.457031 87.074219 245.945312 39.433594 187.335938 39.433594 " fill-opacity="1" fill-rule="nonzero"/>
        </g>
    </svg>
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
            <button type="button" onclick="togglePassword('password', 'togglePasswordIcon')" class="absolute inset-y-0 right-2 flex items-center">
            <svg id="togglePasswordIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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
