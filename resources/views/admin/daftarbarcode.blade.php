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
            placeholder="Cari..." 
            class="bg-transparent outline-none w-full ml-2 text-sm text-gray-600"
        >
    </div>

  <!-- Tombol Cetak Barcode -->
<a id="cetak-barcode" class="cursor-pointer bg-[#FFDF00] text-black font-bold px-6 py-2 rounded-lg flex items-center space-x-2 whitespace-nowrap opacity-50 cursor-not-allowed">
    <span>Cetak Barcode</span>
</a>

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[210mm] h-[150mm] flex flex-col justify-between">        
        <!-- Container QR Code -->
        <div id="barcode-container" class="flex justify-center space-x-8">
            <div class="text-center">
                <img src="qrcode1.png" alt="QR Code 1" class="w-32 h-32 mx-auto">
                <p class="mt-2 font-semibold">MD A001203</p>
            </div>
            <div class="text-center">
                <img src="qrcode2.png" alt="QR Code 2" class="w-32 h-32 mx-auto">
                <p class="mt-2 font-semibold">MD A003200</p>
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end space-x-4 mt-6 rounded-lg">
            <button id="close-modal" class="bg-white border border-[#FFDF00] text-black  font-semibold px-3 py-1 rounded">Kembali</button>
            <button id="print-btn" class="bg-[#FFDF00] text-black px-3 py-1  font-semibold rounded">Cetak</button>
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
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nama Gedung</th>
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nama Ruangan</th>
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Tanggal Kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data pengguna -->
            <tr class="bg-white">
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <input type="checkbox" class="row-checkbox w-4 h-4">
                </td>
                <td class="border border-gray-300 px-4 py-2 font-bold">User</td>
                <td class="border border-gray-300 px-4 py-2">40</td>
                <td class="border border-gray-300 px-4 py-2">40 Desember 2024</td>
            </tr>
            <tr class="bg-white">
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <input type="checkbox" class="row-checkbox w-4 h-4">
                </td>
                <td class="border border-gray-300 px-4 py-2 font-bold">User</td>
                <td class="border border-gray-300 px-4 py-2">40</td>
                <td class="border border-gray-300 px-4 py-2">40 Desember 2024</td>
            </tr>
            <tr class="bg-white">
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <input type="checkbox" class="row-checkbox w-4 h-4">
                </td>
                <td class="border border-gray-300 px-4 py-2 font-bold">User</td>
                <td class="border border-gray-300 px-4 py-2">40</td>
                <td class="border border-gray-300 px-4 py-2">40 Desember 2024</td>
            </tr>
            <!-- Tambahkan lebih banyak data jika perlu -->
        </tbody>
    </table>
</div>

<!-- JsBarcode Library -->
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAllCheckbox = document.getElementById('select-all');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        const cetakBarcodeBtn = document.getElementById('cetak-barcode');
        const modal = document.getElementById('modal');
        const barcodeContainer = document.getElementById('barcode-container');
        const closeModalBtn = document.getElementById('close-modal');
        const printBtn = document.getElementById('print-btn');

        function updateButtonState() {
            const anyChecked = [...rowCheckboxes].some(checkbox => checkbox.checked);
            if (anyChecked) {
                cetakBarcodeBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                cetakBarcodeBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }
        }

        selectAllCheckbox.addEventListener('change', function() {
            rowCheckboxes.forEach(checkbox => checkbox.checked = this.checked);
            updateButtonState();
        });

        rowCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateButtonState);
        });

        cetakBarcodeBtn.addEventListener('click', function () {
            if (cetakBarcodeBtn.classList.contains('cursor-not-allowed')) return;

            // Kosongkan isi barcode-container sebelum menambahkan barcode baru
            barcodeContainer.innerHTML = '';

            rowCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const id = checkbox.getAttribute('data-id');

                    const barcodeDiv = document.createElement('div');
                    barcodeDiv.classList.add('text-center', 'p-2');

                    const barcodeCanvas = document.createElement('canvas');
                    barcodeCanvas.setAttribute('id', 'barcode-' + id);

                    const label = document.createElement('p');
                    label.textContent = "ID: " + id;
                    label.classList.add('font-semibold', 'mt-2');

                    barcodeDiv.appendChild(barcodeCanvas);
                    barcodeDiv.appendChild(label);
                    barcodeContainer.appendChild(barcodeDiv);

                    JsBarcode("#barcode-" + id, id, {
                        format: "CODE128",
                        width: 2,
                        height: 50,
                        displayValue: true,
                        fontSize: 12
                    });
                }
            });

            modal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        printBtn.addEventListener('click', function () {
            window.print();
        });
    });
</script>

@endsection