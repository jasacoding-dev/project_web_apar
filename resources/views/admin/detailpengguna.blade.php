@extends('layouts.pengguna.app')

@section('title', 'Pengguna')

@section('content')
    <!-- Back Button with Title -->
    <div class="flex items-center mb-6">
        <!-- Back SVG -->
        <button onclick="history.back()" class="mr-4 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-600 hover:text-black transition">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        <!-- Page Title -->
        <h1 class="text-lg font-bold text-gray-800">Detail Pengguna</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 w-full">
    <!-- Title with Icons -->
    <div class="flex justify-between items-center mb-4 -mt-3">
        <h2 class="text-xl font-bold">Data Diri Pengguna</h2>
        <div class="flex -space-x-2">
            <!-- Edit Button -->
            <button
            class="text-white p-2 rounded-md "
            onclick="window.location.href='/admin/editpengguna'"
        >
            <img src="{{ asset('storage/pengguna2.png') }}" alt="Edit" class="h-7 w-7">
        </button>
            <!-- Delete Button -->
<button
    class="text-white p-2 rounded-md"
    onclick="toggleDeleteModal(true)"
>
    <img src="{{ asset('storage/pengguna1.png') }}" alt="Delete" class="h-7 w-7">
</button>

<!-- Modal -->
<div
    id="deleteModal"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden"
>
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center relative">
        <!-- Close Button -->
        <button class="absolute -top-1 right-2 text-black text-xl font-bold" onclick="toggleDeleteModal(false)">
            &times;
        </button>


      <!-- Icon -->
<div class="mb-4 mt-4 flex justify-center">
    <div class="rounded-full border-4 border-[#FFDF00] bg-[#0168AD] p-4 flex items-center justify-center">
        <img
            src="{{ asset('storage/popup1.png') }}"
            alt="Question Icon"
            class="h-16 w-16"
        />
    </div>
</div>

        <!-- Title -->
        <h2 class="text-lg font-semibold mb-2">Apakah ingin menghapus data?</h2>

        <p class="text-xs text-gray-600 mb-6 whitespace-nowrap overflow-hidden text-ellipsis">
    Data yang sudah terhapus tidak akan dapat dikembalikan
</p>


        <!-- Buttons -->
        <div class="flex justify-center space-x-4">
        <button class="border border-[#FFDF00] text-black font-semibold w-40 px-4 py-1 rounded-lg " onclick="toggleDeleteModal(false)">
    Kembali
</button>

<button class="bg-[#FFDF00] text-black font-semibold px-4 py-1 w-40 rounded-lg" onclick="handleDelete()">
    Ya
</button>

        </div>
    </div>
</div>

<!-- Modal Success -->
<div
    id="successModal"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden"
    role="dialog"
    aria-hidden="true"
    aria-labelledby="successModalTitle"
    aria-describedby="successModalDescription"
>
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 text-center relative">
        <!-- Close Button -->
        <button
            class="absolute top-2 right-2 text-black text-xl font-bold"
            onclick="toggleSuccessModal(false)"
        >
            &times;
        </button>

        <!-- Icon -->
        <div class="mb-4 mt-4 flex justify-center">
            <div class="rounded-full border-4 border-[#FFDF00] bg-green-500 p-4 flex items-center justify-center">
                <img
                    src="{{ asset('storage/centang.png') }}"
                    alt="Success Icon"
                    class="h-16 w-16"
                />
            </div>
        </div>

        <!-- Title -->
        <h2 id="successModalTitle" class="text-lg font-semibold mb-2">Berhasil!</h2>

        <!-- Description -->
        <p
            id="successModalDescription"
            class="text-sm font-semibold text-gray-600 mb-6"
        >
            Data berhasil dihapus
        </p>

        <!-- Close Button -->
        <button
            class="bg-[#FFDF00] text-black font-semibold px-4 py-1 w-40 rounded-lg"
            onclick="toggleSuccessModal(false)"
        >
            Kembali
        </button>
    </div>
</div>


<script>
    function toggleModal(show) {
        const modal = document.getElementById('logoutModal'); // Pastikan ID sesuai modal logout
        modal.classList.toggle('hidden', !show);
        document.body.style.overflow = show ? 'hidden' : '';
    }

    function toggleDeleteModal(show) {
        const modal = document.getElementById('deleteModal');
        modal.classList.toggle('hidden', !show);
        document.body.style.overflow = show ? 'hidden' : '';
    }

    function handleDelete() {
        toggleDeleteModal(false); // Tutup modal delete
        setTimeout(() => {
            alert("Item berhasil dihapus!"); // Ganti dengan modal sukses jika ada
        }, 500);
    }
</script>


        </div>
    </div>

    <!-- Content -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Left Column -->
        <div class="space-y-4">
            <div>
                <span class="font-semibold">NIP</span>
                <p>XXXXXXXXXX</p>
            </div>
            <div>
                <span class="font-semibold">Peran</span>
                <p>Staff</p>
            </div>
            <div>
                <span class="font-semibold">Email</span>
                <p>xxxxx@gmail.com</p>
            </div>
            <div>
                <span class="font-semibold">Jenis Kelamin</span>
                <p>Perempuan</p>
            </div>
            <div>
                <span class="font-semibold">Tanggal Lahir</span>
                <p>32/01/2000</p>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-4">
            <div>
                <span class="font-semibold">Nama Pengguna</span>
                <p>Bella</p>
            </div>
            <div>
                <span class="font-semibold">No. Telepon</span>
                <p>XXXXXXXXXXXXXX</p>
            </div>
            <div>
                <span class="font-semibold">Alamat</span>
                <p>Jl. Kenangan 02</p>
            </div>
            <div>
                <span class="font-semibold">Tempat Lahir</span>
                <p>Bandung</p>
            </div>
        </div>
    </div>
</div>

@endsection
