@extends('layouts.client.notifikasi.app')

@section('title', 'Notifikasi')

@section('content')
<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
<div class="bg-white shadow-lg rounded-lg p-6 w-full min-h-screen md:min-h-0">
        <!-- Title -->
        <h2 class="text-lg font-bold text-gray-700 mb-4">Notifikasi</h2>

        <!-- Notifications -->
        <div class="space-y-3">
            <!-- Notification Item -->
            <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 text-sm text-gray-700 shadow-sm">
                Jadwal perbaikan APAR H = 5
            </div>
            <div class="bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm text-gray-700 shadow-sm">
                APAR di sebelah pintu lantai 2 perlu perbaikan
            </div>
            <div class="bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm text-gray-700 shadow-sm">
                XXXXXXXXXXXXXXXXXXXX
            </div>
            <div class="bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm text-gray-700 shadow-sm">
                XXXXXXXXXXXXXXXXXXXX
            </div>
            <div class="bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm text-gray-700 shadow-sm">
                XXXXXXXXXXXXXXXXXXXX
            </div>
            <div class="bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm text-gray-700 shadow-sm">
                XXXXXXXXXXXXXXXXXXXX
            </div>
        </div>
    </div>
</section>

@endsection