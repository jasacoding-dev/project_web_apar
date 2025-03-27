@extends('layouts.login')

@section('title', 'Login')

@section('content')
<!-- Placeholder untuk logo -->
<div class="w-full flex justify-center mb-4 mt-16 sm:mt-28 md:mt-0">
    <div class="bg-gray-300 w-64 h-20 rounded"></div>
</div>
<!-- Lupa Kata Sandi -->
<div class="text-center mb-2">
    <a href="#" class="text-black text-2xl font-bold hover:underline">Masukkan kata sandi baru</a>
</div>

<!-- Instruksi untuk reset password -->
<div class="text-center mb-4 px-6">
    <p class="text-gray-600 text-sm font-medium">
        Silahkan atur ulang kata sandi baru anda <br>
    </p>
</div>

<!-- Form Reset Password -->
<form method="POST" action="{{ route('password.store') }}" class="w-full flex flex-col items-center px-4 sm:px-0">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <!-- Input Kata Sandi -->
    <div class="mb-2">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 mt-8">Kata Sandi</label>
        <div class="relative">
            <input type="password" id="password" name="password" class="w-96 py-1 px-3 border border-gray-300 rounded-lg focus:outline-none" required>
            <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-500" onclick="togglePassword('password1', 'eye-icon1')">
                <!-- Ikon untuk toggle password -->
                <svg id="eye-icon1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8zm9-2a2 2 0 114 0 2 2 0 01-4 0z"></path>
                </svg>
            </span>
            @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Input Konfirmasi Kata Sandi -->
    <div class="mb-2">
        <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Kata Sandi</label>
        <div class="relative">
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-96 py-1 px-3 border border-gray-300 rounded-lg focus:outline-none" required>
            <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer text-gray-500" onclick="togglePassword('password2', 'eye-icon2')">
                <!-- Ikon untuk toggle password -->
                <svg id="eye-icon2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8zm9-2a2 2 0 114 0 2 2 0 01-4 0z"></path>
                </svg>
            </span>
        </div>
    </div>

    <!-- Tombol -->
    <div class="w-96 flex flex-col items-center">
        <button type="submit" class="w-96 bg-[#FFDF00] text-black font-bold py-2 rounded-lg shadow transition mb-4 mt-5">Simpan</button>
        <button type="button" class="w-96 bg-white border border-[#FFDF00] text-black font-bold py-2 rounded-lg shadow">Kembali</button>
    </div>
</form>
</div>
</div>

<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === 'password') {
            input.type = 'text';
            icon.setAttribute('stroke', 'red');
        } else {
            input.type = 'password';
            icon.setAttribute('stroke', 'currentColor');
        }
    }
</script>
</body>

</html>
@endsection