@extends('layouts.barcode.app')

@section('title', 'Barcode')

@section('content')

<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white shadow-md rounded-b-lg p-4 w-auto sm:w-[96%] md:w-full min-h-[96vh] md:min-h-[80vh] flex flex-col justify-start overflow-auto">
        <!-- Header (Search Bar and Add Button) -->
        <div class="flex flex-row items-center justify-between w-full space-x-4 mb-4">
            <!-- Search Bar -->
            <div class="flex items-center bg-white px-4 py-2 rounded-full w-full sm:max-w-sm border border-black">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input
                    type="text"
                    id="search"
                    placeholder="Cari..."
                    class="bg-transparent outline-none w-full ml-2 text-sm text-gray-600">
            </div>

            <!-- Tombol Cetak Barcode -->
            <a id="cetak-barcode" class="cursor-pointer bg-[#FFDF00] text-black font-bold px-6 py-2 rounded-lg flex items-center space-x-2 whitespace-nowrap opacity-50 cursor-not-allowed">
                <span>Cetak Barcode</span>
            </a>

            <!-- Modal -->
            <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                <div class="bg-white p-0 rounded-lg shadow-lg w-[210mm] h-[150mm] flex">

                    <!-- Garis Abu-Abu di Kiri Full Tinggi -->
                    <div class="w-16 bg-gray-400 h-full"></div>
                    <!-- Bagian Kiri (QR Code) -->
                    <div class="w-2/3 p-6 flex flex-col justify-center bg-white">
                        <div id="barcode-container" class="flex flex-wrap justify-center gap-4">

                        </div>
                    </div>

                    <!-- Garis Pembatas -->
                    <div class="w-20 bg-gray-400"></div>

                    <!-- Bagian Kanan (Tombol) -->
                    <div class="w-1/3 p-6 flex flex-col justify-end">
                        <div class="flex justify-end space-x-4 mt-6 rounded-lg">
                            <button id="close-modal" class="bg-white border border-[#FFDF00] text-black font-semibold px-3 py-1 rounded">Kembali</button>
                            <button id="print-btn" class="bg-[#FFDF00] text-black px-3 py-1 font-semibold rounded">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full min-h-screen md:w-full md:min-h-12 lg:w-full max-h-[360px] overflow-y-auto overflow-x-auto border border-gray-300 rounded-lg shadow-md">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-[#0168AD] text-white">
                        <th class="border border-gray-300 px-4 py-2 text-center w-[50px]">
                            <input type="checkbox" id="select-all" class="w-4 h-4">
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nomor APAR</th>
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nama Gedung</th>
                        <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nama Ruangan</th>
                    </tr>
                </thead>
                <tbody id="barcode-table-body">
                    @foreach ($barcodes as $barcode)
                    <tr class="bg-white">
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="row-checkbox w-4 h-4" data-id="{{ $barcode->id }}" data-nomor="{{ $barcode->apar->nomor_apar }}">
                        </td>
                        <td class="border border-gray-300 px-4 py-2 font-bold">{{ $barcode->apar->nomor_apar }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $barcode->lokasi->nama_gedung }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $barcode->lokasi->nama_ruangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <style>
     @media print {
    body * {
        visibility: hidden;
        background: none !important;
    }

    #modal,
    #modal * {
        background: none !important;
        visibility: visible;
    }

    #modal {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        padding: 0;
        margin: 0;
    }

    #barcode-container {
        background: none !important;
        display: grid;
        grid-template-columns: repeat(4, 22mm); /* Maksimal 3 kolom per baris */
        column-gap: 84px; /* Spasi horizontal (jarak antar barcode ke kanan) */
    row-gap: 86px; /* Spasi vertikal (jarak antar barcode ke bawah) */
        justify-content: center;
        align-items: flex-start;
        margin-top: -100px;
        margin-left: 80px; /* Tambahkan spasi ke kanan */

    }

    #barcode-container > div {
        background: none !important;
        width: 40mm;
        height: 40mm;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        page-break-inside: avoid;
    }

    #barcode-container canvas {
        background: none !important;
        width: 40mm !important;
        height: 40mm !important;
    }
}

        </style>

        <!-- JsBarcode Library -->
        <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.0/build/qrcode.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectAllCheckbox = document.getElementById('select-all');
                let rowCheckboxes = document.querySelectorAll('.row-checkbox');
                const cetakBarcodeBtn = document.getElementById('cetak-barcode');
                const modal = document.getElementById('modal');
                const barcodeContainer = document.getElementById('barcode-container');
                const closeModalBtn = document.getElementById('close-modal');
                const printBtn = document.getElementById('print-btn');

                // Fungsi untuk meng-update state tombol "Cetak Barcode"
                function updateButtonState() {
                    const anyChecked = [...rowCheckboxes].some(checkbox => checkbox.checked);
                    if (anyChecked) {
                        cetakBarcodeBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    } else {
                        cetakBarcodeBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    }
                }

                // Fungsi untuk memasang event listener pada checkbox
                function attachCheckboxListeners() {
                    rowCheckboxes = document.querySelectorAll('.row-checkbox'); // Perbarui referensi checkbox

                    rowCheckboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', updateButtonState);
                    });
                }

                // Event listener untuk "Select All"
                selectAllCheckbox.addEventListener('change', function() {
                    rowCheckboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                    updateButtonState();
                });

                // Pasang event listener awal
                attachCheckboxListeners();

                // Event listener untuk pencarian
                document.getElementById('search').addEventListener('input', function() {
                    const searchQuery = this.value;

                    fetch(`/search-barcode?query=${searchQuery}`)
                        .then(response => response.json())
                        .then(data => {
                            const tbody = document.getElementById('barcode-table-body');
                            tbody.innerHTML = '';
                            data.forEach(barcode => {
                                const row = `<tr class="bg-white">
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <input type="checkbox" class="row-checkbox w-4 h-4" data-id="${barcode.id}" data-nomor="${barcode.apar.nomor_apar}">
                        </td>
                        <td class="border border-gray-300 px-4 py-2 font-bold">${barcode.apar.nomor_apar}</td>
                        <td class="border border-gray-300 px-4 py-2">${barcode.lokasi.nama_gedung}</td>
                        <td class="border border-gray-300 px-4 py-2">${barcode.lokasi.nama_ruangan}</td>
                    </tr>`;
                                tbody.innerHTML += row;
                            });

                            // Pasang ulang event listener untuk checkbox yang baru
                            attachCheckboxListeners();
                        });
                });

                // Sisanya (modal, cetak barcode, dll) tetap sama
                cetakBarcodeBtn.addEventListener('click', function() {
                    if (cetakBarcodeBtn.classList.contains('cursor-not-allowed')) return;

                    barcodeContainer.innerHTML = '';

                    rowCheckboxes.forEach(checkbox => {
                        if (checkbox.checked) {
                            const id = checkbox.getAttribute('data-id');
                            const nomorApar = checkbox.getAttribute('data-nomor');

                            const barcodeDiv = document.createElement('div');
                            barcodeDiv.classList.add('text-center', 'p-2');

                            const qrCodeCanvas = document.createElement('canvas');
                            qrCodeCanvas.setAttribute('id', 'qrcode-' + id);

                            const label = document.createElement('p');
                            label.textContent = nomorApar;
                            label.classList.add('font-semibold', 'mt-2');

                            barcodeDiv.appendChild(qrCodeCanvas);
                            barcodeDiv.appendChild(label);
                            barcodeContainer.appendChild(barcodeDiv);

                            QRCode.toCanvas(qrCodeCanvas, nomorApar, {
                                width: 2,
                                height: 50,
                                margin: 1
                            }, function(error) {
                                if (error) console.error(error);
                            });
                        }
                    });

                    modal.classList.remove('hidden');
                });

                closeModalBtn.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });

                printBtn.addEventListener('click', function() {
                    closeModalBtn.classList.add('hidden');
                    printBtn.classList.add('hidden');
                    window.print();
                    closeModalBtn.classList.remove('hidden');
                    printBtn.classList.remove('hidden');
                });
            });
        </script>

        @endsection