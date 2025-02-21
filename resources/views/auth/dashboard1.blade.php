<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data APAR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("-translate-x-full");
            document.getElementById("overlay").classList.toggle("hidden");
        }

        function closeSidebar(event) {
            const sidebar = document.getElementById("sidebar");
            if (!sidebar.contains(event.target) && !event.target.closest("#menuButton")) {
                sidebar.classList.add("-translate-x-full");
                document.getElementById("overlay").classList.add("hidden");
            }
        }

        function toggleDropdown() {
            document.getElementById("dropdownMenu").classList.toggle("hidden");
            document.getElementById("dropdownIcon").classList.toggle("rotate-180");
        }

        function openLogoutModal() {
            document.getElementById("logoutModal").classList.remove("hidden");
        }

        function closeLogoutModal() {
            document.getElementById("logoutModal").classList.add("hidden");
        }
        
    </script>
</head>
<body class="bg-gray-100 relative" onclick="closeSidebar(event)">
    <!-- Overlay -->
    <div id="overlay" class="hidden fixed inset-0 bg-black opacity-50 md:hidden"></div>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-[#223E88] text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
        <div class="p-4 text-center border-b border-blue-700">
            <img src="{{ asset('storage/Dokumen.png') }}" alt="Logo" class="h-10 w-auto object-contain mx-auto">
        </div>
        <nav class="mt-1">
        <a href="#" class="block px-6 py-3 mx-4 rounded-lg text-white hover:bg-blue-700 hover:text-white mb-2 flex items-center">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
        <path d="M4 21V9L12 3L20 9V21H14V14H10V21H4Z" fill="currentColor"/>
    </svg>
    Beranda
</a>

<a href="/admin/pengguna" class="block px-6 py-3 mx-4 rounded-lg text-white hover:bg-blue-700 hover:text-white mb-2 flex items-center">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
        <path d="M1.66663 3.3275C1.66815 3.10865 1.75571 2.89918 1.91039 2.74435C2.06506 2.58951 2.27444 2.50175 2.49329 2.5H17.5066C17.9633 2.5 18.3333 2.87083 18.3333 3.3275V16.6725C18.3318 16.8914 18.2442 17.1008 18.0895 17.2557C17.9349 17.4105 17.7255 17.4983 17.5066 17.5H2.49329C2.27397 17.4998 2.06371 17.4125 1.9087 17.2573C1.75369 17.1022 1.66663 16.8918 1.66663 16.6725V3.3275ZM4.99996 12.5V14.1667H15V12.5H4.99996ZM4.99996 5.83333V10.8333H9.99996V5.83333H4.99996ZM11.6666 5.83333V7.5H15V5.83333H11.6666ZM11.6666 9.16667V10.8333H15V9.16667H11.6666ZM6.66663 7.5H8.33329V9.16667H6.66663V7.5Z" 
        fill="currentColor"/>
    </svg>
    Pengguna
</a>


             <!-- Inventaris dengan Dropdown -->
    <div class="relative mx-6">
    <button onclick="toggleDropdown()" class="flex items-center justify-between w-full px-5 py-3 rounded-lg bg-white text-[#223E88] mb-2">
        <div class="flex items-center">
            <!-- Ikon Inventaris -->
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
                <path d="M16.6665 1.66663H3.33317C2.49984 1.66663 1.6665 2.41663 1.6665 3.33329V5.84163C1.6665 6.44163 2.02484 6.95829 2.49984 7.24996V16.6666C2.49984 17.5833 3.4165 18.3333 4.1665 18.3333H15.8332C16.5832 18.3333 17.4998 17.5833 17.4998 16.6666V7.24996C17.9748 6.95829 18.3332 6.44163 18.3332 5.84163V3.33329C18.3332 2.41663 17.4998 1.66663 16.6665 1.66663ZM12.4998 11.6666H7.49984V9.99996H12.4998V11.6666ZM16.6665 5.83329H3.33317V3.33329L16.6665 3.31663V5.83329Z"
                      fill="currentColor"/>
            </svg>
            <span>Inventaris</span>
        </div>
        <!-- Ikon Dropdown -->
        <svg id="dropdownIcon" class="w-5 h-5 ml-4 transition-transform transform rotate-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
        <div id="dropdownMenu" class="hidden">
            <a href="/admin/daftarapar" class="block px-6 py-3 pl-10 rounded-lg text-white hover:bg-blue-700 hover:text-white">APAR</a>
            <a href="/admin/daftarsparepart" class="block px-6 py-3 pl-10 rounded-lg text-white hover:bg-blue-700 hover:text-white">Sparepart</a>
        </div>
    </div>


        
    <a href="/admin/daftarlokasi" class="block px-6 py-3 mx-4 rounded-lg text-white hover:bg-blue-700 hover:text-white mb-2 flex items-center">
    <!-- Ikon Lokasi -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
    </svg>
    <span>Lokasi</span>
</a>


<a href="/admin/daftarbarcode" class="block px-6 py-3 mx-4 rounded-lg text-white hover:bg-blue-700 hover:text-white mb-2 flex items-center">
    <!-- Ikon Barcode -->
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
        <path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19" fill="yellow"/>
        <path d="M14 3V7C14 7.26522 14.1054 7.51957 14.2929 7.70711C14.4804 7.89464 14.7348 8 15 8H19" stroke="#223E88" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M17 21H7C6.46957 21 5.96086 20.7893 5.58579 20.4142C5.21071 20.0391 5 19.5304 5 19V5C5 4.46957 5.21071 3.96086 5.58579 3.58579C5.96086 3.21071 6.46957 3 7 3H14L19 8V19C19 19.5304 18.7893 20.0391 18.4142 20.4142C18.0391 20.7893 17.5304 21 17 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M12 13V16M8 13H9V16H8V13ZM15 13H16V16H15V13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <span>Barcode</span>
</a>

        </nav>
        <button onclick="openLogoutModal()" class="absolute bottom-4 left-4 right-4 bg-red-500 text-center py-2 rounded-lg hover:bg-red-600">
            Keluar
        </button>
    </div>

    <!-- Modal Logout -->
    <div id="logoutModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg p-6 md:p-4 text-center space-y-3 w-auto  h-[56%] md:max-h-[56%] max-h-80 relative flex flex-col">
    <!-- Tombol X di Pojok Kanan Atas -->
        <button onclick="toggleModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Ikon dengan gambar kecil di tengah -->
        <div class="relative w-32 md:w-48 h-32 md:h-48 mx-auto mb-2">
            <!-- Gambar Utama -->
            <img src="{{ asset('storage/tes1.png') }}" alt="Keluar Icon" class="w-full h-full">
            <!-- Gambar Kecil di Tengah -->
            <img src="{{ asset('storage/icon.png') }}" alt="Icon Tengah" class="absolute inset-0 w-16 md:w-32 h-16 md:h-32 m-auto">
        </div>

       <!-- Teks -->
       <h2 class="text-lg font-semibold ">Yakin ingin keluar?</h2>

<!-- Tombol -->
<div class="flex flex-col-reverse md:flex-row justify-center md:space-x-4 mt-6 w-full">
    <button onclick="toggleModal()" class="w-full md:w-32 px-4 py-2 border border-yellow-400 text-yellow-500 rounded mt-2 md:mt-0">
        Kembali
    </button>
    <a href="/logout" class="w-full md:w-32 px-4 py-2 bg-yellow-400 text-white font-bold rounded mb-2 md:mb-0">
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



    <!-- Main Content -->
    <div class="md:ml-64">
      <!-- Top Bar -->
<header class="fixed top-0 left-0 h-16 right-0 bg-[#223E88] shadow-md flex items-center px-6 z-40 justify-between">
    <!-- Kiri: Tombol Menu dan Judul -->
    <div class="flex items-center">
        <button id="menuButton" class="md:hidden text-white text-2xl mr-4" onclick="toggleSidebar()">☰</button>
        <h1 class="text-lg text-white font-bold ml-0 md:ml-64">Inventaris</h1>
    </div>

    <!-- Kanan: Ikon Notifikasi dan Profil -->
    <div class="flex items-center space-x-4">
        <!-- Ikon Notifikasi -->
        <a href="/admin/notifications" class="text-white hover:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
            </svg>
        </a>

        <!-- Ikon Profil -->
        <a href="/admin/profil" class="text-white hover:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
</header>

<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Tambah APAR</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 -mt-4 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <!-- 🔹 Tulisan "Edit APAR" -->
        <h2 class="text-center text-xl font-bold mb-2">Edit Data APAR</h2>
        <p class="text-center text-gray-500 mb-4">Masukkan data APAR dengan tepat</p>


                <form>
                    <!-- Form -->
    <form class="space-y-4">
        <!-- NIP Input -->
        <div>
            <label for="Nomor Apar" class="block text-sm font-medium text-gray-700">
                Nomor Apar<span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="Nomor Apar" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
                placeholder="Gedung A">
        </div>

        <!-- Pemilik (Warna Client) -->
<div>
    <label for="Pemilik" class="block text-sm font-medium text-gray-700 mt-4">
        Pemilik<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Pemilik" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Nama Pemilik">
</div>

<!-- Merek -->
<div>
    <label for="Merek" class="block text-sm font-medium text-gray-700 mt-4">
        Merek<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Merek" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Merek Apar">
</div>

<!-- Sistem Kerja Alat -->
<div>
    <label for="Sistem Kerja" class="block text-sm font-medium text-gray-700 mt-4">
        Sistem Kerja Alat<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Sistem Kerja" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Jenis Sistem Kerja">
</div>

        <!-- Peran Dropdown -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700 mt-4">
                Jenis Media<span class="text-red-500">*</span>
            </label>
            <div class="relative">
    <button type="button" id="role-button" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D] flex justify-between items-center z-50">
        Pilih Jenis Media
        <svg id="dropdown-icon" class="w-5 h-5 ml-2 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path>
        </svg>
    </button>
    <ul id="role-dropdown" class="absolute w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg hidden z-50">
        <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Admin">Admin</li>
        <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Manager">Manager</li>
        <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Staff">Staff</li>
    </ul>
</div>


          <!-- Kapasitas -->
          <div>
            <label for="Kapasitas" class="block text-sm font-medium text-gray-700 mt-4">
            Kapasitas<span class="text-red-500">*</span>
            </label>
            <input 
                type="Kapasitas" 
                id="Kapasitas" 
                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
                placeholder="Masukkan Kapasitas">
        </div>

        <!-- Peran model Tabung -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-700 mt-4">
                Model Tabung<span class="text-red-500">*</span>
            </label>
            <div class="relative"> <!-- Tambahkan class relative -->
    <button type="button" id="role-button1" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D] flex justify-between items-center z-50">
        Pilih Model Tabung
        <svg id="dropdown-icon1" class="w-5 h-5 ml-2 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path>
        </svg>
    </button>
    <ul id="role-dropdown1" class="absolute w-full mt-2 bg-white border border-gray-300 rounded-lg shadow-lg hidden z-50">
        <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Admin">Besar</li>
        <li class="px-4 py-2 cursor-pointer hover:bg-yellow-400" data-role="Manager">Kecil</li>
    </ul>
</div>


       
          <!-- Nomor Tabung -->
<div>
    <label for="Nomor Tabung" class="block text-sm font-medium text-gray-700 mt-4">
        Nomor Tabung<span class="text-red-500">*</span>
    </label>
    <input 
        type="text" 
        id="Nomor Tabung" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Masukkan Nomor Tabung">
                    </div>


        <!-- Tanggal Kadaluarsa -->
<div>
    <label for="tanggal_kadaluwarsa" class="block text-sm font-medium text-gray-700 mt-4">
        Tanggal kadaluwarsa<span class="text-red-500">*</span>
    </label>
    <input 
        type="date" 
        id="tanggal_kadaluwarsa" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]">
</div>

<!-- Keterangan -->
<div>
    <label for="Keterangan" class="block text-sm font-medium text-gray-700 mt-4">
        Keterangan
    </label>
    <textarea 
        id="Keterangan" 
        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2  text-sm focus:ring-[#6C757D] focus:border-[#6C757D] text-[#6C757D]" 
        placeholder="Tambahkan keterangan tambahan..." rows="3"></textarea>
</div>


     <!-- Foto -->
<div>
    <label for="foto" class="block text-sm font-medium text-gray-700 mt-4 z-50">
        Foto<span class="text-red-500">*</span>
    </label>
    <div class="mt-1 relative w-full">
        <input 
            type="file" 
            id="foto" 
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
            accept="image/*"
            onchange="updateFileName(this)">
        <div class="border border-gray-300 rounded-lg flex items-center justify-between p-2 w-full">
            <span id="file-name" class="text-gray-400 text-sm pl-2">Belum ada file dipilih</span>
            <label for="foto" class="bg-yellow-400 text-black font-semibold text-sm py-1 px-2 rounded-lg cursor-pointer hover:bg-yellow-500 transition">
                Pilih File
            </label>
        </div>
    </div>
</div>

<!-- Script untuk menampilkan nama file -->
<script>
    function updateFileName(input) {
        const fileNameSpan = document.getElementById("file-name");
        if (input.files.length > 0) {
            fileNameSpan.textContent = input.files[0].name; // Menampilkan nama file
            fileNameSpan.classList.remove("text-gray-400"); // Menghilangkan warna abu-abu default
        } else {
            fileNameSpan.textContent = "Belum ada file dipilih"; // Reset jika tidak ada file
            fileNameSpan.classList.add("text-gray-400");
        }
    }
</script>

        <!-- Tombol Simpan -->
        <div class="flex justify-center">
            <button 
                type="submit" 
                class="bg-[#FFDF00] w-80 text-black font-bold px-8 py-2 rounded-lg hover:bg-yellow-500 transition mt-4">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
    // Fungsi untuk menangani dropdown umum
    function setupDropdown(buttonId, dropdownId, iconId) {
        const button = document.getElementById(buttonId);
        const dropdown = document.getElementById(dropdownId);
        const icon = document.getElementById(iconId);

        button.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });

        // Pilih opsi dan update teks tombol
        document.querySelectorAll(`#${dropdownId} li`).forEach(item => {
            item.addEventListener('click', () => {
                button.innerHTML = `${item.innerText} <svg id="${iconId}" class="w-5 h-5 ml-2 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path></svg>`;
                dropdown.classList.add('hidden');
                icon.classList.remove('rotate-180');
            });
        });

        // Tutup dropdown jika klik di luar
        document.addEventListener('click', (event) => {
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        });
    }

    // Setup dropdown untuk Peran
    setupDropdown('role-button', 'role-dropdown', 'dropdown-icon');

    // Setup dropdown untuk Jenis Kelamin
    setupDropdown('role-button1', 'role-dropdown1', 'dropdown-icon1');
</script>


<style>
    /* Animasi untuk dropdown */
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>

         

