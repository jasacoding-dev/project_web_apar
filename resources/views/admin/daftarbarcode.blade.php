@extends('layouts.barcode.app')

@section('title', 'Barcode')

@section('content')
<div class="bg-white shadow-md rounded-b-lg p-4 w-auto sm:w-full md:w-full  md:h-auto flex flex-col justify-start overflow-auto">
     <!-- Header (Search Bar, Dropdown, and Add Button) -->
<div class="flex flex-row items-center justify-between w-full mb-4">
    <div class="flex items-center gap-2">
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

    <!-- Add Button -->
    <a href="/admin/cetakbarcode" class="bg-[#FFDF00] text-black font-bold px-6 py-2 rounded-lg flex items-center space-x-2 whitespace-nowrap">
        <span>Cetak barcode</span>
    </a>
</div>

<style>
    /* Tambahkan class khusus agar tidak konflik */
    .rotate-180-dropdown {
        transform: rotate(180deg);
    }
</style>

<script>
    document.getElementById("dropdownButton").addEventListener("click", function () {
        let dropdownMenu = document.getElementById("dropdownMenu");
        let dropdownIcon = document.getElementById("dropdownIcon1");

        dropdownMenu.classList.toggle("hidden");
        dropdownIcon.classList.toggle("rotate-180-dropdown"); // Menggunakan class unik agar tidak bentrok dengan sidebar
    });

    document.querySelectorAll(".dropdown-option").forEach(item => {
        item.addEventListener("click", function (event) {
            event.preventDefault();
            document.getElementById("dropdownText").innerText = this.innerText;
            document.getElementById("dropdownMenu").classList.add("hidden");
            document.getElementById("dropdownIcon1").classList.remove("rotate-180-dropdown"); // Reset ikon setelah memilih
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        let dropdown = document.getElementById("dropdownMenu");
        let button = document.getElementById("dropdownButton");

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
            document.getElementById("dropdownIcon1").classList.remove("rotate-180-dropdown"); // Reset ikon jika klik di luar
        }
    });
</script>


<div class="w-[480px] min-h-screen sm:min-w-full md:w-full md:min-h-[300px] lg:w-full max-h-[360px] overflow-y-auto overflow-x-auto border border-gray-300 rounded-lg shadow-md">
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
            <!-- Tambahkan lebih banyak data jika perlu -->
        </tbody>
    </table>
</div>

<script>
    // JavaScript untuk mengontrol checkbox "Select All"
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>

@endsection