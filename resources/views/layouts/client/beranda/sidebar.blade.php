<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
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
        <div class="p-2 text-center">
            <img src="{{ asset('storage/Logoooo.png') }}" alt="Logo" class="h-14 w-auto object-contain mx-auto">
        </div>
        <nav class="mt-1">
        <a href="/admin/dashboard" class="bg-white block px-6 py-3 mx-4 rounded-lg text-[#223E88] mb-2 flex items-center">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
        <path d="M4 21V9L12 3L20 9V21H14V14H10V21H4Z" fill="currentColor"/>
    </svg>
    Beranda
</a>

    <a href="/admin/daftarlokasi" class="block px-6 py-3 mx-4 rounded-lg text-white hover:bg-blue-700 hover:text-white mb-2 flex items-center">
    <!-- Ikon Lokasi -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
    </svg>
    <span>Lokasi</span>
</a>

        </nav>
        <button onclick="openLogoutModal()" class="absolute bottom-4 left-4 right-4 bg-red-500 text-center py-2 rounded-lg hover:bg-red-600">
            Keluar
        </button>
    </div>

    