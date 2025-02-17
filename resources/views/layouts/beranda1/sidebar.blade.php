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
    <aside id="sidebar" class="w-52 bg-[#223E88] text-white min-h-screen fixed flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300">
    <!-- Sidebar Content -->
      <div class="flex items-center justify-center py-4">
        <img src="{{ asset('storage/Dokumen.png') }}" alt="Logo" class="h-10 w-auto">
      </div>
      <nav class="mt-4 flex-1 px-4 space-y-4 font-bold">
        <ul>
        <li>
    <a href="#" class="bg-white flex items-center px-4 py-2 rounded text-[#223E88]">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
            <path d="M4 21V9L12 3L20 9V21H14V14H10V21H4Z" fill="#223E88"/>
        </svg>
        Beranda
    </a>
</li>

<li class="mt-4">
    <a href="/admin/pengguna" class=" flex items-center px-4 text-white py-2 font-bold rounded hover:bg-blue-700">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
            <path d="M1.66663 3.3275C1.66815 3.10865 1.75571 2.89918 1.91039 2.74435C2.06506 2.58951 2.27444 2.50175 2.49329 2.5H17.5066C17.9633 2.5 18.3333 2.87083 18.3333 3.3275V16.6725C18.3318 16.8914 18.2442 17.1008 18.0895 17.2557C17.9349 17.4105 17.7255 17.4983 17.5066 17.5H2.49329C2.27397 17.4998 2.06371 17.4125 1.9087 17.2573C1.75369 17.1022 1.66663 16.8918 1.66663 16.6725V3.3275ZM4.99996 12.5V14.1667H15V12.5H4.99996ZM4.99996 5.83333V10.8333H9.99996V5.83333H4.99996ZM11.6666 5.83333V7.5H15V5.83333H11.6666ZM11.6666 9.16667V10.8333H15V9.16667H11.6666ZM6.66663 7.5H8.33329V9.16667H6.66663V7.5Z" 
            fill="white"/>
        </svg>
        Pengguna
    </a>
</li>

<li class="mt-4">
    <button class="flex items-center justify-between w-full px-4 py-2 hover:bg-blue-700 rounded" 
        onclick="toggleDropdown('componentsDropdown', 'dropdownIcon')">
        <div class="flex items-center">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
                <path d="M16.6665 1.66663H3.33317C2.49984 1.66663 1.6665 2.41663 1.6665 3.33329V5.84163C1.6665 6.44163 2.02484 6.95829 2.49984 7.24996V16.6666C2.49984 17.5833 3.4165 18.3333 4.1665 18.3333H15.8332C16.5832 18.3333 17.4998 17.5833 17.4998 16.6666V7.24996C17.9748 6.95829 18.3332 6.44163 18.3332 5.84163V3.33329C18.3332 2.41663 17.4998 1.66663 16.6665 1.66663ZM12.4998 11.6666H7.49984V9.99996H12.4998V11.6666ZM16.6665 5.83329H3.33317V3.33329L16.6665 3.31663V5.83329Z"
                 fill="white"/>
            </svg>
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
    <a href="/admin/daftarbarcode" class=" text-white flex items-center px-4 py-2 font-bold rounded hover:bg-blue-700">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
            <path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19" fill="yellow"/>
            <path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19" stroke="#223E88" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M17 21H7C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H14L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12 13V16M8 13H9V16H8V13ZM15 13H16V16H15V13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
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