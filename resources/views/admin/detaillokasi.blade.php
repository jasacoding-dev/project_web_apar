@extends('layouts.detaillokasi.app')

@section('title', 'detaillokasi')

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
        <h1 class="text-lg font-bold text-gray-800 ">Detail Lokasi</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 w-full -mt-4 overflow-y-auto 
            h-[770px] sm:h-[800px] md:h-[420px] ">
    <!-- Title with Icons -->
    <div class="flex justify-between items-center mb-4 -mt-4">
        <h2 class="text-xl font-bold">Informasi Lokasi</h2>
        <div class="flex -space-x-2">
                      <!-- Edit Button -->
                      <button
            class="text-white p-2 rounded-md "
            onclick="window.location.href='/admin/editlokasi'"
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
    <!-- Wrapper untuk mode mobile -->
    <div class="flex flex-col md:grid md:grid-cols-2 gap-x-4 gap-y-2">
    <div class="pr-0 md:pr-10 text-sm">
            <div class="mb-4">
                <p class="font-bold">Nama Gedung</p>
                <p>Gedung Serbaguna</p>
            </div>
            <div class="mb-4">
                <p class="font-bold">Nama Ruangan</p>
                <p>Ruangan 1</p>
            </div>
            <div class="mb-4">
                <p class="font-bold">Alamat Gedung</p>
                <p>Jln aaa</p>
            </div>
            <div class="mb-4">
                <p class="font-bold">Satuan Kerja</p>
                <p>4 xl</p>
            </div>
            <div class="mb-4">
                <p class="font-bold">Tanggal Kadaluwarsa</p>
                <p>XX/XX/XXXX</p>
            </div>
        </div>


        <!-- Kolom Kanan -->
        <div class="pl-0 md:pl-10 text-sm">
            <div class="mb-4">
                <p class="font-bold">Lantai</p>
                <p>XXXXX</p>
            </div>
            <div class="mb-4">
                <p class="font-bold">Pemilik Gedung</p>
                <p>XXXXX</p>
            </div>
            <div class="mb-4">
                <p class="font-bold">Pic Gedung</p>
                <p>XXXXX</p>
            </div>
            <div class="mb-4">
                <p class="font-bold">Tanggal Pengecekan</p>
                <p>XX/XX/XXXX</p>
            </div>
            <div class="mb-4">
                <p class="font-bold">Foto</p>
                <img src="{{ asset('storage/dashboard.png') }}" alt="APAR" class="w-40 h-40 rounded-lg shadow-md">
            </div>
        </div>
    </div>
</div>
</div>

<div class="bg-white shadow-md rounded-lg p-6 w-full mt-4">
    <h2 class="text-lg font-bold mb-4">Riwayat Pengecekan dan Perbaikan</h2>
    
    <!-- Item 1 -->
<div class="border border-gray-400 rounded-lg overflow-hidden mb-4 hover:border-[#223E88] transition">
    <button class="w-full bg-[#F8FDFF] p-4 flex justify-between items-center cursor-pointer">
        <div class="text-left">
        <p class="font-semibold">
            <a href="/admin/detailriwayat" class="text-black hover:underline">Pengecekan Agustus 2024 - Baik</a>
        </p>
         <p class="text-sm text-gray-600">17 Agustus 2024</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 18l6-6-6-6"/>
        </svg>
    </button>
</div>

<!-- Item 2 -->
<div class="border border-gray-400 rounded-lg overflow-hidden hover:border-[#223E88] transition">
    <button class="w-full bg-[#F8FDFF] p-4 flex justify-between items-center cursor-pointer">
        <div class="text-left">
        <p class="font-semibold">
            <a href="/admin/detailriwayat2" class="text-black hover:underline">Perbaikan Agustus 2024 - Baik</a>
        </p>
        <p class="text-sm text-gray-600">Tidak Berfungsi</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 18l6-6-6-6"/>
        </svg>
    </button>
</div>

@endsection