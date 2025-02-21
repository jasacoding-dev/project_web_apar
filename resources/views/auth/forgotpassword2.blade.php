@extends('layouts.login')

@section('title', 'Login')

@section('content')
<!-- Placeholder untuk logo -->
<div class="w-full flex justify-center mb-4 mt-16 sm:mt-28 md:mt-0">
    <div class="bg-gray-300 w-64 h-20 rounded"></div>
</div>
<!-- Lupa Kata Sandi -->
<div class="text-center mb-2">
    <a href="#" class="text-black text-2xl font-bold hover:underline">Masukkan kode reset kata sandi</a>
</div>

<!-- Instruksi untuk reset password -->
<div class="text-center mb-4 px-6">
    <p class="text-gray-600 text-sm font-medium">
        Email telah dikirim, silahkan cek email untuk <br>
        <span class="block"> mendapatkan kode verifikasi</span>
    </p>
</div>

<!-- Input Kode Verifikasi -->
<div class="w-full flex flex-col items-center mb-4 mt-8">
    <div class="flex space-x-3">
        <input type="text" maxlength="1" class="w-12 h-12 text-center border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 font-bold" required>
        <input type="text" maxlength="1" class="w-12 h-12 text-center border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 font-bold" required>
        <input type="text" maxlength="1" class="w-12 h-12 text-center border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 font-bold" required>
        <input type="text" maxlength="1" class="w-12 h-12 text-center border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 font-bold" required>
        <input type="text" maxlength="1" class="w-12 h-12 text-center border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 font-bold" required>
    </div>

    <!-- Timer di Bawah Kanan Input -->
    <div class="w-full flex justify-center">
        <div class="w-[270px] flex justify-end mt-2">
            <p class="text-gray-500 text-sm font-medium">
                <span class="font-bold text-black">01:00</span>
            </p>
        </div>
    </div>
</div>

<!-- Form Login -->
<div class="text-center mt-3">
    <p class="text-gray-600 font-semibold text-sm">Tidak menerima kode verifikasi? <a href="#" class="text-[#E6C900] font-medium hover:underline">Kirim ulang</a></p>
</div>
<form class="w-full flex flex-col items-center">
    <div class="w-96 flex justify-end mb-4">
    </div>
    <a href="/reset-password" class="w-96 bg-[#FFDF00] text-black font-bold py-2 rounded-lg shadow  transition mb-4 flex items-center justify-center">
        Selanjutnya
    </a>
    <button type="button" class="w-96 bg-white border border-[#FFDF00] text-black font-bold py-2 rounded-lg shadow">Kembali</button>
</form>
@endsection