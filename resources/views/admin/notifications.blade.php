@extends('layouts.notifikasi.app')

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
            @foreach ($notificationMessages as $message)
            <div class="bg-gray-100 border border-gray-300 rounded-lg p-4 text-sm text-gray-700 shadow-sm">
                {{ $message }}
            </div>
            @endforeach
        </div>
    </div>
    </section>

    @endsection