@extends('layouts.staff.barcode.app')

@section('title', 'Barcode')

@section('content')

<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Detail Scan Barcode</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 -mt-4 max-w-full mx-auto  "> <!-- mt-4 untuk mendekatkan ke tombol back -->
<div class="bg-white shadow-md rounded-b-lg p-4 w-auto sm:w-[96%] md:w-full min-h-[96vh] md:min-h-full flex flex-col justify-start overflow-auto">
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
    </div>

<div class="w-full min-h-screen md:w-full md:min-h-12 lg:w-full max-h-[360px] overflow-y-auto overflow-x-auto border border-gray-300 rounded-lg shadow-md">
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-[#0168AD] text-white">
                <th class="border border-gray-300 px-4 py-2 text-center w-[50px]">
                </th>
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nama Sparepart</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data pengguna -->
            <tr class="bg-white">
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <input type="checkbox" class="row-checkbox w-4 h-4">
                </td>
                <td class="border border-gray-300 px-4 py-2 font-bold">User</td>
            </tr>
            <tr class="bg-white">
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <input type="checkbox" class="row-checkbox w-4 h-4">
                </td>
                <td class="border border-gray-300 px-4 py-2 font-bold">User</td>
            </tr>
            <tr class="bg-white">
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <input type="checkbox" class="row-checkbox w-4 h-4">
                </td>
                <td class="border border-gray-300 px-4 py-2 font-bold">User</td>
            </tr>
            <!-- Tambahkan lebih banyak data jika perlu -->
        </tbody>
    </table>
</div>

<!-- Tombol Selanjutnya -->
<div class="flex justify-center mt-40">
    <button id="nextButton" class="bg-[#FFDF00] text-black font-bold px-6 py-2 rounded-lg ">
        Selanjutnya
    </button>
</div>

<!-- Modal Konfirmasi -->
<div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center relative">
        <button class="absolute -top-1 right-2 text-black text-xl font-bold" onclick="toggleDeleteModal(false)">&times;</button>

        <div class="mb-4 mt-4 flex justify-center">
            <div class="rounded-full border-4 border-[#FFDF00] bg-[#0168AD] p-4 flex items-center justify-center">
                <svg width="64" height="64" viewBox="0 0 187 187" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M83.7604 122.719H103.24V142.198H83.7604V122.719Z"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M93.5 62.3333C84.189 62.3333 77.9167 70.7951 77.9167 77.9167H62.3334C62.3334 63.8761 73.9897 46.75 93.5 46.75C112.948 46.75 124.667 63.4397 124.667 77.9167C124.667 90.2119 116.034 96.4453 110.688 100.302L109.785 100.957C103.902 105.258 101.292 107.704 101.292 112.979H85.7084C85.7084 99.2502 94.7545 92.6429 100.567 88.3965L100.59 88.3809C107.073 83.6358 109.083 81.8359 109.083 77.9167C109.083 70.5146 102.881 62.3333 93.5 62.3333Z"/>
                </svg>
            </div>
        </div>

        <h2 class="text-lg font-semibold mb-2">Apakah ingin mengajukan permohonan Refilling?</h2>
        <p class="text-xs text-gray-600 mb-6">Data yang sudah dipilih tidak dapat diubah</p>

        <div class="flex justify-center space-x-4">
            <button class="border border-[#FFDF00] text-black font-semibold w-40 px-4 py-1 rounded-lg" onclick="toggleDeleteModal(false)">Kembali</button>
            <button class="bg-[#FFDF00] text-black font-semibold px-4 py-1 w-40 rounded-lg" onclick="handleDelete()">Ya</button>
        </div>
    </div>
</div>

<!-- Modal Sukses -->
<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center relative">
        <button class="absolute top-2 right-2 text-black text-xl font-bold" onclick="toggleSuccessModal(false)">&times;</button>

        <div class="mb-4 mt-4 flex justify-center">
    <div class="rounded-full border-4 border-[#FFDF00] bg-green-500 p-4 flex items-center justify-center">
        <svg width="70" height="65" viewBox="0 0 85 75" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M72.5986 0L33.6514 51.7801L10.625 28.577L0 39.2913L35.4111 75L85 10.7143L72.5986 0Z" fill="white"/>
        </svg>
        </div>
        </div>

        <h2 class="text-lg font-semibold mb-2">Berhasil</h2>
        <p>Permohonan refilling berhasil diajukan</p>

        <div class="mt-4 flex justify-center gap-4">
            <button id="deleteButton" class="bg-[#FFDF00] text-black font-semibold px-4 py-1 w-40 rounded-lg" onclick="handleDelete1()">Ya</button>
        </div>
    </div>
</div>

<script>
document.getElementById("nextButton").addEventListener("click", function() {
    const checkboxes = document.querySelectorAll(".row-checkbox");
    let isChecked = false;

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            isChecked = true;
        }
    });

    if (isChecked) {
        document.getElementById("deleteModal").classList.remove("hidden"); // Menampilkan modal
    } else {
        alert("Pilih setidaknya satu pengguna sebelum melanjutkan!");
    }
});

// Fungsi untuk menutup modal
function toggleDeleteModal(show) {
    const modal = document.getElementById("deleteModal");
    if (show) {
        modal.classList.toggle("hidden", !show);
    }
}

function handleDelete() {
    // Tutup modal konfirmasi
    document.getElementById("deleteModal").classList.add("hidden");
    
    // Tampilkan modal sukses
    document.getElementById("successModal").classList.remove("hidden");
}


function toggleDeleteModal(show) {
    const modal = document.getElementById("deleteModal");
    if (show) {
        modal.classList.remove("hidden");
    } else {
        modal.classList.add("hidden");
    }
}

function toggleSuccessModal(show) {
    const modal = document.getElementById("successModal");
    if (show) {
        modal.classList.remove("hidden");
    } else {
        modal.classList.add("hidden");
    }
}

function handleDelete1() {
    // Tutup modal konfirmasi
    
    // Tampilkan modal sukses
    document.getElementById("successModal").classList.remove("hidden");
}


function toggleDeleteModal(show) {
    const modal = document.getElementById("deleteModal");
    if (show) {
        modal.classList.remove("hidden");
    } else {
        modal.classList.add("hidden");
    }
}

function toggleSuccessModal1(show) {
    const modal = document.getElementById("successModal");
    if (show) {
        modal.classList.remove("hidden");
    } else {
        modal.classList.add("hidden");
    }
}

function handleDelete1() {
    document.getElementById("successModal").classList.add("hidden");
}

</script>



@endsection