<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">
  <div class="flex flex-grow min-h-screen">
    @include('layouts.pengguna.sidebar')

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
        @include('layouts.pengguna.header')

        <!-- Konten Dinamis -->
        <div class="md:ml-0">
        @yield('content')
        </section>
    </main>
  </div>
</body>
</html>
