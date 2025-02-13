<!-- resources/views/dashboard.blade.php -->
@extends('layouts.beranda.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 w-full min-h-screen md:min-h-0">
        <h2 class="text-sm font-bold text-gray-700">Selamat Pagi</h2>
        <p class="mt-2 text-sm text-gray-600">Pastikan sistem kebakaranmu siap pakai, ya!</p>
        <div class="mt-4 space-y-4">
            <div class="bg-white border border-black rounded-lg shadow p-4 flex justify-center items-center h-24">
                <p class="text-gray-800 font-semibold">950/1000 APAR Terdata</p>
            </div>
        </div>
    </div>
@endsection
