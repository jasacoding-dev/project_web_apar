<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>QR Code Page</title>
</head>
<body class="bg-gray-200 flex justify-center items-center min-h-screen p-4">
    <div class="bg-white p-6 md:p-8 rounded-xl h-96 shadow-lg w-full max-w-4xl flex flex-col md:flex-row">
        <div class="flex-1 p-4 bg-white rounded-xl flex flex-col items-center">
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-4 md:gap-8">
                <div class="flex flex-col items-center mt-20">
                    <img src="{{ asset('storage/barcode1.png') }}" alt="QR Code 1" class="w-24 h-24 sm:w-32 sm:h-32">
                    <p class="mt-2 text-xs sm:text-sm font-semibold">MD A001203</p>
                </div>
                <div class="flex flex-col items-center mt-20">
                    <img src="{{ asset('storage/barcode1.png') }}" alt="QR Code 2" class="w-24 h-24 sm:w-32 sm:h-32">
                    <p class="mt-2 text-xs sm:text-sm font-semibold">MD A003200</p>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/4 bg-gray-300 flex flex-col justify-between p-4 md:p-6 rounded-xl mt-4 md:mt-0">
            <div></div>
            <div class="flex gap-4 justify-center md:justify-start">
                <button class="px-3 py-2 bg-white border border-[#FFDF00] text-black rounded-lg text-xs sm:text-sm">Kembali</button>
                <button class="px-3 py-2 bg-[#FFDF00] text-black font-semibold rounded-lg text-xs sm:text-sm">Cetak</button>
            </div>
        </div>
    </div>
</body>
</html>
