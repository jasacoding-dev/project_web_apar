<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profil')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">
    <div class="flex flex-grow min-h-screen">
        @include('layouts.sidebar')

        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
            <!-- Main Content -->
            <div class="md:ml-64">
                <!-- Top Bar -->
                <header class="fixed top-0 left-0 h-16 right-0 bg-[#223E88] shadow-md flex items-center px-6 z-40 justify-between">
                    <!-- Kiri: Tombol Menu dan Judul -->
                    <div class="flex items-center">
                        <button id="menuButton" class="md:hidden text-white text-2xl mr-4" onclick="toggleSidebar()">☰</button>
                        <h1 class="text-lg text-white font-bold ml-0 md:ml-64">Profil</h1>
                    </div>

                    <!-- Kanan: Ikon Notifikasi dan Profil -->
                    <div class="flex items-center space-x-4">
                        <!-- Ikon Notifikasi -->
                        <a href="{{ route('admin.notifications') }}" class="text-white hover:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
                            </svg>
                        </a>

                        <!-- Ikon Profil -->
                        <a href="/admin/profil" class="text-white hover:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </header>

                <!-- Konten Dinamis -->
                <div class="md:ml-0">
                    @yield('content')
                    </section>
        </main>
    </div>
</body>

</html>