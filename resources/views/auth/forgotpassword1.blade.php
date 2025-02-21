@extends('layouts.login')

@section('title', 'Login')

@section('content')
<!-- Placeholder untuk logo -->
<div class="w-full flex justify-center mb-4 mt-16 sm:mt-28 md:mt-0">
    <div class="bg-gray-300 w-64 h-20 rounded"></div>
</div>
<!-- Lupa Kata Sandi -->

<div class="text-center mb-2">
    <a href="#" class="text-black text-2xl font-bold hover:underline">Lupa Kata Sandi?</a>
</div>

<!-- Instruksi untuk reset password -->
<div class="text-center mb-4 px-6">
    <p class="text-gray-600 text-sm font-medium">
        Masukkan email kamu di bawah ini untuk mendapatkan<br>
        <span class="block">kode reset kata sandi.</span>
    </p>
</div>

<!-- Form Reset Password -->
<form method="POST" action="{{ route('password.email') }}" class="w-full flex flex-col items-center px-4 sm:px-0">
    @csrf
    <div class="mb-3 sm:mb-4 w-full sm:max-w-[80%] md:max-w-[380px]">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 text-left mt-4">Email</label>
        <input type="email" id="email" name="email" :value="old('email')" autofocus class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none"
            placeholder="Masukkan email" required>
    </div>

    <button type="submit"
        class="w-full sm:max-w-[80%] mt-3 md:max-w-[380px] bg-[#FFDF00] text-black font-bold py-2 rounded-lg shadow transition flex items-center justify-center">
        Selanjutnya
    </button>
</form>

<div class="text-center mt-4">
    <p class="text-gray-600 font-semibold text-sm">Kembali? <a href="{{ route('home') }}" class="text-[#E6C900] font-medium hover:underline">Masuk</a></p>
</div>

@endsection
