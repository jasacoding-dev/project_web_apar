<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lokasi')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">
  <div class="flex flex-grow min-h-screen">
    @include('layouts.detaillokasi.sidebar')

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
        @include('layouts.detaillokasi.header')

        <!-- Konten Dinamis -->
        <section class="flex-1 p-6">
            @yield('content')
        </section>
    </main>
  </div>

  @include('layouts.detaillokasi.logout-modal')

</body>
</html>
