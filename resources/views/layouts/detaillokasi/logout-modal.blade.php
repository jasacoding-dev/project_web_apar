<!-- resources/views/layouts/logout-modal.blade.php -->
<div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 md:p-8 text-center space-y-3 w-[70%] md:w-[50%] lg:w-[32%] h-[46%] md:h-auto relative flex flex-col">
        <button onclick="toggleModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-lg font-semibold mt-[-28px] md:mt-32">Yakin ingin keluar?</h2>
        <div class="flex flex-col-reverse md:flex-row justify-center md:space-x-4 mt-6">
            <button onclick="toggleModal()" class="w-full md:w-40 lg:w-48 px-4 py-2 border border-yellow-400 text-yellow-500 rounded hover:bg-yellow-100 mt-2 md:mt-0">Kembali</button>
            <a href="/logout" class="w-full md:w-40 lg:w-48 px-4 py-2 bg-yellow-400 text-white font-bold rounded hover:bg-yellow-500 mb-2 md:mb-0">Ya</a>
        </div>
    </div>
</div>
<script>
    function toggleModal() {
        document.getElementById('logoutModal').classList.toggle('hidden');
    }
</script>
