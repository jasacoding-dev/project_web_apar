@extends('layouts.staff.barcode.app')

@section('title', 'Scan Barcode')

@section('content')

<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ route('barcode.index') }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Scan Barcode</span>
    </a>
</div>

<!-- Scan Barcode Container -->
<main class="p-6 max-w-full mx-auto">
    <div class="bg-white shadow-md rounded-b-lg p-4 w-auto sm:w-[96%] md:w-full min-h-[96vh] md:min-h-[80vh] flex flex-col justify-start overflow-auto">
        <!-- Camera Preview -->
        <div id="camera-preview" class="w-full h-[60vh] bg-black rounded-lg overflow-hidden">
            <video id="camera-stream" class="w-full h-full object-cover"></video>
        </div>

        <!-- Scan Button -->
        <div class="flex justify-center mt-6">
            <button id="start-scan" class="cursor-pointer bg-[#FFDF00] text-black font-bold px-6 py-2 rounded-lg flex items-center space-x-2 whitespace-nowrap">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8V6a2 2 0 012-2h2M3 16v2a2 2 0 002 2h2M21 8V6a2 2 0 00-2-2h-2M21 16v2a2 2 0 01-2 2h-2M7 8h10M7 16h10" />
                </svg>
                <span>Mulai Scan</span>
            </button>
        </div>

        <!-- Hasil Scan -->
        <div id="scan-result" class="mt-6 text-center text-lg font-semibold"></div>
    </div>
</main>

<script src="https://unpkg.com/@zxing/library@latest"></script>

<script>
    const codeReader = new ZXing.BrowserQRCodeReader();
    let isScanning = false;

    // Mulai scan
    document.getElementById('start-scan').addEventListener('click', async () => {
        if (isScanning) return;

        isScanning = true;
        document.getElementById('scan-result').innerText = 'Scanning...';

        try {
            const result = await codeReader.decodeFromInputVideoDevice(undefined, 'camera-stream');
            if (result) {
                document.getElementById('scan-result').innerText = `Berhasil scan: ${result.text}`;
                isScanning = false;

                // Redirect ke halaman detail berdasarkan nomor_apar
                window.location.href = `/staff/barcode/detail/${result.text}`;
            }
        } catch (error) {
            console.error('Error scanning:', error);
            document.getElementById('scan-result').innerText = 'Gagal memindai barcode.';
            isScanning = false;
        }
    });

    // Hentikan kamera saat keluar dari halaman
    window.addEventListener('beforeunload', () => {
        codeReader.reset();
    });
</script>
@endsection