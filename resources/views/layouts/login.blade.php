<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col md:flex-row w-full h-screen bg-gray-100">

    <!-- Bagian kiri dengan background biru -->
    <div class="hidden md:block bg-[#223E88] md:w-1/2 h-full"></div>

    <!-- Bagian kanan untuk konten login -->
    <div class="bg-[#F8FDFF] w-full md:w-1/2 flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-2xl shadow-md md:shadow-2xl py-4 px-4 sm:py-6 sm:px-2 md:py-9 md:px-8 w-full max-w-[90%] md:max-w-[595px] h-screen md:h-[96%] max-h-[98vh] flex flex-col items-center">
            @yield('content')
        </div>
    </div>

</body>

</html>
