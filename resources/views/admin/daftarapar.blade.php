@extends('layouts.apar.app')

@section('title', 'Inventaris')

@section('content')
<!-- Form Container -->
<main class="p-6 mt-16 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
<div class="bg-white shadow-md rounded-b-lg p-4 w-auto sm:w-[96%] md:w-full min-h-[96vh] md:min-h-0 flex flex-col justify-start overflow-auto">
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

        <!-- Dropdown -->
        <div class="relative">
            <button id="dropdownButton1" class="bg-white border border-black px-4 py-2 rounded-lg flex items-center space-x-2 text-gray-700">
            <span id="dropdownText1" class="truncate">Tipe</span>
            <svg id="dropdownIcon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 transition-transform duration-300 transform">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="dropdownMenu1" class="absolute right-0 mt-2 w-40 bg-white border border-gray-300 shadow-lg rounded-lg hidden overflow-hidden">
        <ul class="py-2">
            <li><a href="#" class="dropdown-option block px-4 py-2 hover:bg-[#0168AD] text-gray-700"> 1</a></li>
            <li><a href="#" class="dropdown-option block px-4 py-2 hover:bg-[#0168AD] text-gray-700">Tipe 2</a></li>
            <li><a href="#" class="dropdown-option block px-4 py-2 hover:bg-[#0168AD] text-gray-700">Tipe 3</a></li>
        </ul>
    </div>
</div>

</div>

    <!-- Add Button -->
    <a href="/admin/tambahapar" class="bg-[#FFDF00] text-black font-bold px-6 py-2 rounded-lg flex items-center space-x-2 whitespace-nowrap">
        <span>Tambah</span>
    </a>
</div>

<style>
    /* Tambahkan class khusus agar tidak konflik */
    .rotate-180-dropdown {
        transform: rotate(180deg);
    }
</style>

<script>
    document.getElementById("dropdownButton1").addEventListener("click", function () {
        let dropdownMenu = document.getElementById("dropdownMenu1");
        let dropdownIcon = document.getElementById("dropdownIcon1");

        dropdownMenu.classList.toggle("hidden");
        dropdownIcon.classList.toggle("rotate-180-dropdown"); // Menggunakan class unik agar tidak bentrok dengan sidebar
    });

    document.querySelectorAll(".dropdown-option").forEach(item => {
        item.addEventListener("click", function (event) {
            event.preventDefault();
            document.getElementById("dropdownText1").innerText = this.innerText;
            document.getElementById("dropdownMenu1").classList.add("hidden");
            document.getElementById("dropdownIcon1").classList.remove("rotate-180-dropdown"); // Reset ikon setelah memilih
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        let dropdown = document.getElementById("dropdownMenu1");
        let button = document.getElementById("dropdownButton1");

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
            document.getElementById("dropdownIcon1").classList.remove("rotate-180-dropdown"); // Reset ikon jika klik di luar
        }
    });
</script>


<div class="w-full min-h-screen sm:min-w-full md:w-full md:min-h-[300px] lg:w-full max-h-[360px] overflow-y-auto overflow-x-auto border border-gray-300 rounded-lg shadow-md">
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-[#0168AD] text-white">
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Nomer Apar</th>
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Jenis Media</th>
                <th class="border border-gray-300 px-4 py-2 text-left min-w-[200px]">Model Tabung</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data pengguna -->
            <tr class="bg-white">
            <td class="border border-gray-300 px-4 py-2 font-bold">
                    <a href="/admin/detailapar" class="text-blue-500 hover:underline">111</a>
                </td>
                                <td class="border border-gray-300 px-4 py-2">Staff</td>
                <td class="border border-gray-300 px-4 py-2">user@gmail.com</td>
            </tr>
            <!-- Tambahkan lebih banyak data jika perlu -->
        </tbody>
    </table>
</div>


@endsection