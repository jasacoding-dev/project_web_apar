@extends('layouts.staff.barcode.app')

@section('title', 'Barcode')

@section('content')

<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Detail Scan Barcode</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 -mt-4 max-w-full mx-auto "> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
    <!-- Title with Icons -->
    <div class="flex justify-between items-center mb-4 -mt-3">
        <h2 class="text-xl font-bold">Detail Apar </h2>
        <div class="flex -space-x-2">
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-4">
    <!-- Kolom Kiri -->
    <div class="pr-8 md:pr-16 text-sm flex-1">
        <div class="mb-4">
            <p class="font-bold">Kode Barcode</p>
            <p>Gedung Serbaguna</p>
        </div>
        <div class="mb-4">
            <p class="font-bold">Merek Alat</p>
            <p>Ruangan 1</p>
        </div>
        <div class="mb-4">
            <p class="font-bold">Jenis Media</p>
            <p>Jln aaa</p>
        </div>
        <div class="mb-4">
            <p class="font-bold">Sistem Kerja Alat</p>
            <p>4 xl</p>
        </div>
        <div class="mb-4">
            <p class="font-bold">Lokasi Penempatan</p>
            <p>XX/XX/XXXX</p>
        </div>
    </div>

    <!-- Kolom Kanan -->
    <div class="pl-0 md:pl-10 text-sm mr-48 flex-1">
        <div class="mb-4">
            <p class="font-bold">Lokasi Gedung</p>
            <p>XXXXX</p>
        </div>
        <div class="mb-4">
            <p class="font-bold">Model Tabung</p>
            <p>XXXXX</p>
        </div>
        <div class="mb-4">
            <p class="font-bold">Kapasitas</p>
            <p>XXXXX</p>
        </div>
        <div class="mb-4">
            <p class="font-bold">Satuan Kerja </p>
            <p>XX/XX/XXXX</p>
        </div>
        <div class="mb-4">
            <p class="font-bold">Status </p>
            <p>XX/XX/XXXX</p>
            </div>
    </div>
</div>

<!-- Tombol seperti pada gambar -->
<div class="flex justify-center items-center mt-6">
<div class="flex flex-col gap-2 w-80">
        <button onclick="openModal()" class="border-2 border-[#FFDF00] text-black font-bold py-2 px-4 rounded">
            Ubah Status
        </button>
        <button class="bg-[#FFDF00] text-black font-bold py-2 px-4 rounded">
            Selesai
        </button>
    </div>

   <!-- Modal -->
   <div id="statusModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white p-6 rounded-lg w-96 shadow-lg relative">
            <!-- Tombol Close -->
            <button onclick="closeModal()" class="absolute top-3 right-3 text-black font-bold text-lg">✖</button>
            
            <!-- Judul -->
            <h2 class="text-lg font-bold mb-4">Ubah Status</h2>

            <!-- Checkbox List -->
            <div class="space-y-2">
                <label class="flex items-center border p-2 rounded border-gray-400 cursor-pointer">
                    <input type="radio" name="status" class="hidden" onclick="toggleCheckbox(this)">
                    <span class="w-5 h-5 border-2 border-gray-400 flex items-center justify-center rounded mr-2 transition-all">
                        <svg class="hidden w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L7 13.586l-2.293-2.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l9-9a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Baik
                </label>

                <label class="flex items-center border p-2 rounded border-gray-400 cursor-pointer">
                    <input type="radio" name="status" class="hidden" onclick="toggleCheckbox(this)">
                    <span class="w-5 h-5 border-2 border-gray-400 flex items-center justify-center rounded mr-2 transition-all">
                        <svg class="hidden w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L7 13.586l-2.293-2.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l9-9a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Perlu Perbaikan
                </label>
                

                <label class="flex items-center border p-2 rounded border-gray-400 cursor-pointer">
                    <input type="radio" name="status" class="hidden" onclick="toggleCheckbox(this)">
                    <span class="w-5 h-5 border-2 border-gray-400 flex items-center justify-center rounded mr-2 transition-all">
                        <svg class="hidden w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L7 13.586l-2.293-2.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l9-9a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Refilling
                </label>
                <!-- Modal Konfirmasi -->
<div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center relative">
        <button class="absolute -top-1 right-2 text-black text-xl font-bold" onclick="toggleDeleteModal(false)">&times;</button>

        <div class="mb-4 mt-4 flex justify-center">
            <div class="rounded-full border-4 border-[#FFDF00] bg-[#0168AD] p-4 flex items-center justify-center">
                <svg width="64" height="64" viewBox="0 0 187 187" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M83.7604 122.719H103.24V142.198H83.7604V122.719Z"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M93.5 62.3333C84.189 62.3333 77.9167 70.7951 77.9167 77.9167H62.3334C62.3334 63.8761 73.9897 46.75 93.5 46.75C112.948 46.75 124.667 63.4397 124.667 77.9167C124.667 90.2119 116.034 96.4453 110.688 100.302L109.785 100.957C103.902 105.258 101.292 107.704 101.292 112.979H85.7084C85.7084 99.2502 94.7545 92.6429 100.567 88.3965L100.59 88.3809C107.073 83.6358 109.083 81.8359 109.083 77.9167C109.083 70.5146 102.881 62.3333 93.5 62.3333Z"/>
                </svg>
            </div>
        </div>

        <h2 class="text-lg font-semibold mb-2">Apakah ingin mengajukan permohonan Reffiling?</h2>
        <p class="text-xs text-gray-600 mb-6">Data yang sudah dipilih tidak dapat diubah</p>

        <div class="flex justify-center space-x-4">
            <button class="border border-[#FFDF00] text-black font-semibold w-40 px-4 py-1 rounded-lg" onclick="toggleDeleteModal(false)">Kembali</button>
            <button class="bg-[#FFDF00] text-black font-semibold px-4 py-1 w-40 rounded-lg" onclick="handleDelete()">Ya</button>
        </div>
    </div>
</div>

<!-- Modal Sukses -->
<div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center relative">
        <button class="absolute top-2 right-2 text-black text-xl font-bold" onclick="toggleSuccessModal(false)">&times;</button>

        <div class="mb-4 mt-4 flex justify-center">
    <div class="rounded-full border-4 border-[#FFDF00] bg-green-500 p-4 flex items-center justify-center">
        <svg width="70" height="65" viewBox="0 0 85 75" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M72.5986 0L33.6514 51.7801L10.625 28.577L0 39.2913L35.4111 75L85 10.7143L72.5986 0Z" fill="white"/>
        </svg>
    </div>
        </div>
        <h2 class="text-lg font-semibold mb-2">Berhasil</h2>
        <p>Permohonan refilling berhasil diajukan</p>
        
        <!-- Tombol Baru -->
        <div class="mt-4 flex justify-center gap-4">
            <button id="deleteButton" class="bg-[#FFDF00] text-black font-semibold px-4 py-1 w-40 rounded-lg" onclick="handleDelete1()">Ya</button>
        </div>
    </div>
        </div>


                <label class="flex items-center border p-2 rounded border-gray-400 cursor-pointer">
                    <input type="radio" name="status" class="hidden" onclick="toggleCheckbox(this)">
                    <span class="w-5 h-5 border-2 border-gray-400 flex items-center justify-center rounded mr-2 transition-all">
                        <svg class="hidden w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L7 13.586l-2.293-2.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l9-9a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Kustom
                </label>
            </div>
<!-- Tombol Simpan -->
<div class="flex justify-center">
    <button class="mt-4 w-48 bg-[#FFDF00] text-black font-bold py-2 px-4 rounded" onclick="showModalOnSave()">
        Simpan
    </button>
</div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('statusModal').classList.remove('hidden');
        }
        

        function closeModal() {
            document.getElementById('statusModal').classList.add('hidden');
        }

        function toggleCheckbox(selected) {
        let labels = document.querySelectorAll("label");

        // Reset semua checkbox dan ikon
        labels.forEach(label => {
            let svgIcon = label.querySelector("svg");
            let spanBox = label.querySelector("span");

            svgIcon.classList.add("hidden");
            spanBox.classList.remove("bg-[#12B227]", "border-green-600");
        });

        // Tandai checkbox yang dipilih
        let parentLabel = selected.parentElement;
        let svgIcon = parentLabel.querySelector("svg");
        let spanBox = parentLabel.querySelector("span");

        svgIcon.classList.remove("hidden");
        spanBox.classList.add("bg-[#12B227]", "border-green-600");
    }

    function toggleDeleteModal(show) {
    let modal = document.getElementById("deleteModal");
    if (modal) {
        modal.classList.toggle("hidden", !show);
    }
}

function handleDelete() {
    toggleDeleteModal(false); // Tutup modal konfirmasi
    toggleSuccessModal(true); // Tampilkan modal sukses
}

function toggleSuccessModal(show) {
    let modal = document.getElementById("successModal");
    if (modal) {
        modal.classList.toggle("hidden", !show);
    }
}

function handleDelete1() {
    console.log("Tombol Ya di Modal Sukses diklik"); // Debugging
    let successModal = document.getElementById("successModal");

    if (successModal) {
        successModal.classList.add("hidden"); // Tutup modal sukses
    }

    // Ambil status yang dipilih
    let selectedRadio = document.querySelector("input[name='status']:checked");

    if (!selectedRadio) {
        alert("Silakan pilih status terlebih dahulu.");
        return;
    }

    let selectedText = selectedRadio.parentElement.textContent.trim();

    // Redirect berdasarkan status
    setTimeout(() => {
        if (selectedText === "Baik") {
            window.location.href = "/staff/barcode";
        } else if (selectedText === "Perlu Perbaikan") {
            window.location.href = "/staff/perbaikan";
        } else if (selectedText === "Kustom") {
            window.location.href = "/staff/kustom";
        }
    }, 1000); // Delay agar modal terlihat sebentar sebelum redirect
}

function showModalOnSave() {
    let selectedRadio = document.querySelector("input[name='status']:checked");

    if (!selectedRadio) {
        alert("Silakan pilih status terlebih dahulu.");
        return;
    }

    let selectedText = selectedRadio.parentElement.textContent.trim();

    if (selectedText === "Refilling") {
        toggleDeleteModal(true); // Munculkan modal konfirmasi
    } else {
        handleDelete1(); // Langsung jalankan handleDelete1 untuk redirect
    }
}

    </script>

@endsection