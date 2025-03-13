@extends('layouts.staff.profil.app')

@section('title', 'Profil')

@section('content')

<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto">
    <div class="bg-white shadow-md rounded-lg w-full md:min-h-0">
        <table class="w-full text-left border-collapse mt-2 rounded-lg overflow-hidden shadow-md">
            <!-- Header -->
            <div class="bg-[#0168AD] rounded-t-lg p-1 -mt-3">
                <nav class="flex justify-center space-x-4">
                    <a href="{{ route('staff.profile') }}" class="text-white font-normal hover:underline">Detail Profil</a>
                    <a href="{{ route('staff.ubahkatasandi') }}" class="text-white font-semibold hover:underline">Ubah Kata Sandi</a>
                </nav>
            </div>
            <!-- Responsive Container -->
            <div class="bg-white rounded-b-lg p-4 w-full sm:w-[96%] md:w-full min-h-[80vh] md:min-h-0 flex flex-col justify-start overflow-auto">
                <h2 class="text-lg font-bold mb-2 sm:mb-3 text-left">Lupa Kata Sandi</h2>

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

                <form action="{{ route('staff.sendResetLink') }}" method="POST" class="flex flex-col justify-start gap-2 sm:gap-3">
                    @csrf
                    <!-- Email -->
                    <div class="mb-1 sm:mb-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email<span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm" placeholder="Masukkan email">
                    </div>

                    <!-- Tombol Selanjutnya -->
                    <div class="mt-8 sm:mt-2 text-center">
                        <button type="submit" class="w-full sm:w-80 inline-block text-center bg-yellow-400 text-black font-bold py-2 rounded-lg hover:bg-yellow-500">
                            Selanjutnya
                        </button>
                    </div>
                </form>
            </div>
        </table>
    </div>
</main>
@endsection