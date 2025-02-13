<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col">
  <div class="flex flex-grow min-h-screen">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-52 bg-[#223E88] text-white min-h-screen fixed md:relative hidden md:flex flex-col">
      <!-- Sidebar Content -->
      <div class="flex items-center justify-center py-4">
        <img src="{{ asset('storage/Dokumen.png') }}" alt="Logo" class="h-10 w-auto">
      </div>
      <nav class="mt-4 flex-1 px-4 space-y-4 font-bold">
        <ul>
          <li>
            <a href="#" class="bg-white flex items-center px-4 py-2  rounded text-[#223E88]">
              <img src="{{ asset('storage/dashboard.png') }}" alt="Icon" class="w-5 h-5 mr-2"> Beranda
            </a>
          </li>
          <li class="mt-4">
            <a href="/admin/pengguna" class="flex items-center px-4 text-white py-2 hover:bg-blue-700 font-bold rounded">
              <img src="{{ asset('storage/ke2.png') }}" alt="Icon" class="w-5 h-5 mr-2" style="filter: hue-rotate(210deg);">
              Pengguna
            </a>
          </li>
                   <li class="mt-4">
    <button class="flex items-center justify-between w-full px-4 py-2 hover:bg-blue-700 rounded" 
        onclick="toggleDropdown('componentsDropdown', 'dropdownIcon')">
        <div class="flex items-center">
        <img src="{{ asset('storage/ke3.png') }}" alt="Icon" class="w-5 h-5 mr-2">
            Inventaris
        </div>
        <svg id="dropdownIcon" class="w-4 h-4 transition-transform transform duration-300" fill="currentColor" 
            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" 
                clip-rule="evenodd">
            </path>
        </svg>
    </button>
    <ul id="componentsDropdown" class="hidden pl-8 space-y-1 text-gray-300">
        <li>
            <a href="/admin/daftarapar" class="block px-4 py-2 font-bold hover:text-white hover:bg-blue-700 rounded">Apar</a>
        </li>
        <li>
            <a href="/admin/daftarsparepart" class="block px-4 py-2 font-bold hover:text-white  hover:bg-blue-700 rounded">Sparepart</a>
        </li>
    </ul>
</li>

<script>
    function toggleDropdown(menuId, iconId) {
        const menu = document.getElementById(menuId);
        const icon = document.getElementById(iconId);

        menu.classList.toggle("hidden"); // Menampilkan/menghilangkan dropdown
        icon.classList.toggle("rotate-180"); // Menambah/menghapus rotasi ikon
    }
</script>

                    <li class="mt-4">
                        <a href="#" class="flex items-center px-4 py-2 hover:bg-blue-700 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                            </svg>
                            Lokasi
                        </a>
                    </li>

                    
                    <li class="mt-4">
                        <a href="/pengguna" class=" flex items-center px-4 text-white py-2 hover:bg-blue-700 font-bold rounded">
                        <img src="{{ asset('storage/ke5.png') }}" alt="Icon" class="w-5 h-5 mr-2" style="filter: hue-rotate(210deg);">
                        Barcode
                        </a>
                    </li>

                 <!-- Log Out -->
                 <li class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-[98%] px-4">
    <button onclick="toggleModal()" class="bg-red-500 w-full text-white flex items-center px-4 py-2 rounded ">
        <img src="{{ asset('storage/keluar.png') }}" alt="Icon" class="w-5 h-5 mr-2"> Keluar
    </button>
</li>
                </ul>
            </nav>
        </aside>

    <!-- Modal Pop-Up -->
<div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 md:p-8  text-center space-y-3 w-[70%] md:w-[50%] lg:w-[32%] h-[46%] md:h-auto relative flex flex-col">
        <!-- Tombol X di Pojok Kanan Atas -->
        <button onclick="toggleModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Ikon dengan gambar kecil di tengah -->
        <div class="relative w-32 md:w-48 h-32 md:h-48 mx-auto mb-4">
            <!-- Gambar Utama -->
            <img src="{{ asset('storage/tes1.png') }}" alt="Keluar Icon" class="w-full h-full">
            <!-- Gambar Kecil di Tengah -->
            <img src="{{ asset('storage/icon.png') }}" alt="Icon Tengah" class="absolute inset-0 w-16 md:w-32 h-16 md:h-32 m-auto">
        </div>

       <!-- Teks -->
       <h2 class="text-lg font-semibold mt-[-28px] md:mt-32">Yakin ingin keluar?</h2>

<!-- Tombol -->
<div class="flex flex-col-reverse md:flex-row justify-center md:space-x-4 mt-6">
    <button onclick="toggleModal()" class="w-full md:w-40 lg:w-48 px-4 py-2 border border-yellow-400 text-yellow-500 rounded  mt-2 md:mt-0">
        Kembali
    </button>
    <a href="/logout" class="w-full md:w-40 lg:w-48 px-4 py-2 bg-yellow-400 text-white font-bold rounded  mb-2 md:mb-0">
        Ya
    </a>
</div>
</div>
</div>

<script>
    function toggleModal() {
        const modal = document.getElementById('logoutModal');
        modal.classList.toggle('hidden');
    }
</script>

        <!-- Hamburger Button -->
        <button id="menuButton" class="md:hidden absolute top-4 left-4 bg-gray-700 text-white p-2 rounded" onclick="toggleSidebar()">
            &#9776;
        </button>
    
        <script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');

        if (sidebar.classList.contains('hidden')) {
            // Buka sidebar
            sidebar.classList.remove('hidden');
            sidebar.classList.add('absolute', 'z-50');
        } else {
            // Tutup sidebar
            sidebar.classList.add('hidden');
            sidebar.classList.remove('absolute', 'z-50');
        }
    }

    // Tutup sidebar jika pengguna mengklik di luar sidebar
    document.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const menuButton = document.getElementById('menuButton');

        if (!sidebar.contains(event.target) && !menuButton.contains(event.target)) {
            sidebar.classList.add('hidden');
            sidebar.classList.remove('absolute', 'z-50');
        }
    });
</script>