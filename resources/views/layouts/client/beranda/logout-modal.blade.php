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