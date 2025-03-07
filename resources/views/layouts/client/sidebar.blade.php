<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
            const dropdownMenu = document.getElementById("dropdownMenu");
            const dropdownIcon = document.getElementById("dropdownIcon");

            dropdownMenu.classList.toggle("hidden");
            dropdownIcon.classList.toggle("rotate-180");

            // Simpan status dropdown di localStorage
            if (dropdownMenu.classList.contains("hidden")) {
                localStorage.setItem("dropdownOpen", "false");
            } else {
                localStorage.setItem("dropdownOpen", "true");
            }
        }

        function restoreDropdownState() {
            const dropdownMenu = document.getElementById("dropdownMenu");
            const dropdownIcon = document.getElementById("dropdownIcon");

            if (localStorage.getItem("dropdownOpen") === "true") {
                dropdownMenu.classList.remove("hidden");
                dropdownIcon.classList.add("rotate-180");
            }
        }

        document.addEventListener("DOMContentLoaded", restoreDropdownState);

        function openLogoutModal() {
            document.getElementById("logoutModal").classList.remove("hidden");
        }

        function closeLogoutModal() {
            document.getElementById("logoutModal").classList.add("hidden");
        }

      // Fungsi untuk mengatur menu aktif
function setActiveMenu(event) {
    document.querySelectorAll(".menu-item").forEach(item => {
        item.classList.remove("bg-white", "text-[#223E88]", "hover:bg-blue-700", "hover:text-white");
    });

    const menuHref = event.currentTarget.getAttribute("href");
    localStorage.setItem("activeMenu", menuHref);

    event.currentTarget.classList.add("bg-white", "text-[#223E88]");
    event.currentTarget.classList.remove("hover:bg-blue-700", "hover:text-white");
}

// Fungsi untuk menyimpan menu aktif sebelum logout
function handleLogout() {
    localStorage.setItem("activeMenuBeforeLogout", localStorage.getItem("activeMenu"));
}

// Fungsi untuk memulihkan menu setelah login kembali
function restoreAfterLogin() {
    const lastActiveMenu = localStorage.getItem("activeMenuBeforeLogout");

    if (lastActiveMenu) {
        // Reset ke dashboard setelah login
        localStorage.setItem("activeMenu", "/admin/dashboard");
        localStorage.removeItem("activeMenuBeforeLogout");
    }
}

// Fungsi untuk memulihkan menu aktif saat halaman dimuat
function restoreActiveMenu() {
    const activeMenu = localStorage.getItem("activeMenu") || "/admin/dashboard"; // Default ke dashboard
    const menuItem = document.querySelector(`.menu-item[href='${activeMenu}']`);

    if (menuItem) {
        menuItem.classList.add("bg-white", "text-[#223E88]");
        menuItem.classList.remove("hover:bg-blue-700", "hover:text-white");
    }
}

// Event Listener
document.addEventListener("DOMContentLoaded", function () {
    restoreAfterLogin(); // Pulihkan menu setelah login
    restoreActiveMenu(); // Terapkan menu aktif setelah halaman dimuat
});

    </script>
</head>

<body class="bg-gray-100 relative" onclick="closeSidebar(event)">
    <!-- Overlay -->
    <div id="overlay" class="hidden fixed inset-0 bg-black opacity-50 md:hidden"></div>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-[#223E88] text-white transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
        <div class="p-4 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48" height="48" viewBox="0 0 375 375">
                <defs>
                    <clipPath id="clip-path">
                        <path d="M 81.21875 19.195312 L 293.46875 19.195312 L 293.46875 252 L 81.21875 252 Z M 81.21875 19.195312 " clip-rule="nonzero" />
                    </clipPath>
                </defs>
                <g clip-path="url(#clip-path)">
                    <path fill="#ed1c24" d="M 187.488281 39.40625 C 184.652344 39.40625 181.84375 39.519531 179.0625 39.738281 C 179.417969 40.457031 179.789062 41.167969 180.179688 41.859375 C 184.023438 48.683594 189.339844 54.601562 193.050781 61.5 C 197.382812 69.554688 199.210938 78.84375 198.601562 87.964844 C 198.222656 93.558594 204.804688 96.898438 208.972656 93.144531 C 209.019531 93.105469 209.0625 93.066406 209.109375 93.023438 C 216.738281 86.074219 220.109375 74.785156 217.542969 64.789062 C 230.039062 81.9375 232.421875 105.929688 223.550781 125.203125 C 221.734375 129.148438 219.457031 132.976562 218.683594 137.253906 C 217.71875 142.597656 219.742188 149.082031 225.980469 150.003906 C 228.898438 150.433594 231.820312 149.363281 234.007812 147.390625 C 238.492188 143.34375 239.359375 137.140625 239.101562 131.363281 C 238.882812 126.4375 237.953125 121.53125 238.269531 116.613281 C 253.695312 132.371094 285.023438 225.960938 190.8125 242.996094 C 230.523438 214.960938 227.347656 171.949219 208.75 141.097656 C 210.429688 143.886719 220.503906 187.832031 192.691406 196.839844 C 190.507812 197.546875 187.929688 197.179688 186.183594 195.691406 C 184.867188 194.566406 184.125 192.867188 183.917969 191.144531 C 183.484375 187.519531 185.109375 183.855469 186.449219 180.582031 C 193.796875 162.640625 193.847656 141.832031 186.59375 123.855469 C 189.34375 147.875 177.605469 150.898438 170.054688 162.855469 C 162.03125 175.550781 156.351562 195.53125 167.441406 204.003906 C 163.132812 202.3125 150.667969 196.082031 145.132812 179.53125 C 142.605469 217.710938 153.234375 225.59375 171.746094 242.089844 C 150.121094 235.671875 135.476562 223.375 123.722656 203.046875 C 113.664062 185.648438 114.015625 162.398438 119.5 143.0625 C 124.984375 123.726562 136.617188 106.570312 150.542969 92.078125 C 150.542969 92.078125 136.1875 115.433594 140.199219 139.480469 C 141.371094 146.503906 143.628906 160.613281 152.140625 162.554688 C 156.917969 163.644531 159.125 159.152344 157.316406 155.175781 C 156.308594 152.960938 154.476562 151.253906 153.0625 149.304688 C 146.03125 139.628906 149.3125 125.894531 155.058594 115.40625 C 160.804688 104.914062 168.835938 95.273438 171.121094 83.535156 C 173.25 72.597656 170.074219 61.429688 168.746094 50.367188 C 167.417969 39.304688 168.574219 26.652344 177.019531 19.386719 C 177.019531 19.386719 164.128906 25.429688 160.070312 42.976562 C 114.667969 55.070312 81.21875 96.464844 81.21875 145.675781 C 81.21875 204.367188 128.796875 251.945312 187.488281 251.945312 C 246.179688 251.945312 293.761719 204.367188 293.761719 145.675781 C 293.761719 86.984375 246.179688 39.40625 187.488281 39.40625 " fill-opacity="1" fill-rule="nonzero" />
                </g>
            </svg>
        </div>

        <nav class="mt-0">
            <a href="/client/dashboard" onclick="setActiveMenu(event)" class="menu-item block px-6 py-3 mx-4 rounded-lg text-white hover:bg-blue-700 mb-2 flex items-center">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2">
                    <path d="M4 21V9L12 3L20 9V21H14V14H10V21H4Z" fill="currentColor" />
                </svg>
                Beranda
            </a>

            <a href="/client/daftarlokasi" onclick="setActiveMenu(event)" class="menu-item block px-6 py-3 mx-4 rounded-lg text-white hover:bg-blue-700 mb-2 flex items-center">
                <!-- Ikon Lokasi -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                    <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                </svg>
                <span>Lokasi</span>
            </a>

        </nav>
        <button onclick="handleLogout(); openLogoutModal();" class="absolute bottom-4 left-4 right-4 bg-red-500 text-white text-center py-2 rounded-lg hover:bg-red-600 flex items-center justify-center gap-2">
    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4.58366 3.25H10.5V4.08333H4.58333H4.08333V4.58333V17.4167V17.9167H4.58333H10.5V18.75H4.58333C4.2127 18.75 3.90817 18.624 3.64255 18.3584C3.37699 18.0928 3.25051 17.7878 3.25 17.4163V4.58333C3.25 4.21298 3.37612 3.90853 3.64225 3.64285C3.9088 3.37676 4.21371 3.25051 4.58366 3.25ZM15.7437 11.4167H8.75V10.5833H15.7437H16.9509L16.0973 9.72978L14.1041 7.73657L14.6762 7.13328L18.5429 11L14.6762 14.8667L14.1041 14.2634L16.0973 12.2702L16.9509 11.4167H15.7437Z"
            fill="white" stroke="white" />
    </svg>
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
            <div class="relative w-32 md:w-48 h-32 md:h-48 mx-auto mb-2 flex items-center justify-center">
                <!-- Lingkaran dengan border kuning dan bg merah -->
                <div class="w-40 h-40 rounded-full border-4 border-yellow-500 bg-red-500 flex items-center justify-center">
                    <!-- SVG di Tengah -->
                    <svg width="96" height="96" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.58366 3.25H10.5V4.08333H4.58333H4.08333V4.58333V17.4167V17.9167H4.58333H10.5V18.75H4.58333C4.2127 18.75 3.90817 18.624 3.64255 18.3584C3.37699 18.0928 3.25051 17.7878 3.25 17.4163V4.58333C3.25 4.21298 3.37612 3.90853 3.64225 3.64285C3.9088 3.37676 4.21371 3.25051 4.58366 3.25ZM15.7437 11.4167H8.75V10.5833H15.7437H16.9509L16.0973 9.72978L14.1041 7.73657L14.6762 7.13328L18.5429 11L14.6762 14.8667L14.1041 14.2634L16.0973 12.2702L16.9509 11.4167H15.7437Z"
                            fill="white" stroke="white" />
                    </svg>
                </div>
            </div>


            <!-- Teks -->
            <h2 class="text-lg font-semibold ">Yakin ingin keluar?</h2>

            <!-- Tombol -->
            <div class="flex flex-col-reverse md:flex-row justify-center md:space-x-4 mt-6 w-full">
                <button onclick="toggleModal()" class="w-full md:w-32 px-4 py-2 border border-yellow-400 text-yellow-500 rounded mt-2 md:mt-0">
                    Kembali
                </button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full md:w-32 px-4 py-2 bg-yellow-400 text-white font-bold rounded mb-2 md:mb-0">
                        Ya
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.toggle('hidden');
        }
    </script>