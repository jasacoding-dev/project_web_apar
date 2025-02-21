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

<a href="/admin/pengguna" class="bg-white block px-6 py-3 mx-4 rounded-lg  text-[#223E88]  mb-2 flex items-center">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
        <path d="M1.66663 3.3275C1.66815 3.10865 1.75571 2.89918 1.91039 2.74435C2.06506 2.58951 2.27444 2.50175 2.49329 2.5H17.5066C17.9633 2.5 18.3333 2.87083 18.3333 3.3275V16.6725C18.3318 16.8914 18.2442 17.1008 18.0895 17.2557C17.9349 17.4105 17.7255 17.4983 17.5066 17.5H2.49329C2.27397 17.4998 2.06371 17.4125 1.9087 17.2573C1.75369 17.1022 1.66663 16.8918 1.66663 16.6725V3.3275ZM4.99996 12.5V14.1667H15V12.5H4.99996ZM4.99996 5.83333V10.8333H9.99996V5.83333H4.99996ZM11.6666 5.83333V7.5H15V5.83333H11.6666ZM11.6666 9.16667V10.8333H15V9.16667H11.6666ZM6.66663 7.5H8.33329V9.16667H6.66663V7.5Z" 
        fill="currentColor"/>
    </svg>
    Pengguna
</a>


             <!-- Inventaris dengan Dropdown -->
    <div class="relative mx-6">
    <button onclick="toggleDropdown()" class="flex items-center justify-between w-full px-5 py-3 rounded-lg   text-white mb-2">
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

    