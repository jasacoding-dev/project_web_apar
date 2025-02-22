@extends('layouts.client.lokasi.app')

@section('title', 'Lokasi')

@section('content')

<!-- Tombol Back dengan Ikon -->
<div class="flex items-center mt-20 mb-2 ml-4"> <!-- Tambahkan mb-2 untuk mengurangi jarak bawah -->
    <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="text-lg font-semibold">Detail Lokasi</span>
    </a>
</div>

<!-- Form Container -->
<main class="p-6 -mt-4 max-w-full mx-auto"> <!-- mt-4 untuk mendekatkan ke tombol back -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
    <!-- Title with Icons -->
    <div class="flex justify-between items-center mb-4 -mt-3">
        <h2 class="text-xl font-bold">Informasi Lokasi</h2>
        <div class="flex -space-x-2">
           <!-- Edit Button -->
<button
    class="text-white p-1 rounded-lg border-2 px-1 -py-2 bg-[#0168AD] transition mr-4"
    onclick="window.location.href='/client/editlokasi'"
>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-7 w-7">
        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
    </svg>
</button>

            <!-- Delete Button -->
            <button
    class="text-white p-1 rounded-lg border-2 px-1 -py-2 bg-[#F13A3A] transition mr-2"
    onclick="toggleDeleteModal(true)"
>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-7 w-7">
        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
    </svg>
</button>

<!-- Modal -->
<div
    id="deleteModal"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50"
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
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50"
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
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGIAAABWCAYAAAA0TkO1AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAMiSURBVHgB7d3RUdtAFIXhaypICUoHlEA6oIMkFSQdoFQAHSQdUIJLIB0sHVDCn2VwJkBsrWTp3F3Z95vR+IUBa8/A8Wq1wiwsBrjLx2cL9eQAbvjnxoK/PPAd/4swPO1CSOx3n48PFvR2gz0kPYdlQeddL0QYNeSBvWSap3xcW1gOw71QEiW+FMq9EGGoMb4XSuIT1bHywF2xrESU+DTM64ViGBsLo+TB2uaXK9P4baGM5Xrh4G+EhWEs3wvvxdyiBF0v/NVbKMsD9YDOvYUyohfqy4N0jVZnYRj6XvhuoUwcwp2FMvS9ENeWSvIgfUEnEb1Qhr4XYtI2BjFpqy8P1C06WwtlRC/Ux0svPKFzaaGM6IX60PZCTNrGyAP1DZ1ETNrK0PbC8/ftzMtaE39+32h7wW9fBC/XYhIr/FiGthd688LbC2JpTWGg7YUH88L+q5JpDWGwfxPJUpLbGDB8adjvjRwBfS/4TNoYd30+0WgY+X39Qqc3D0xbJEk0FgbaXvhpHjhupSrRSBjoe0H/EZ55y4WJymGgXeTxmbSxzJptomIYaHtBP2lj2YXzRIUw0C7+96YmOoGEYxhoe0E/aeMEbi1E2wvJ4xwu8qHcrNLlY+twIre7n6XwdbPZPJqHPFA9WkkVBmvvhT0ntLowmL7pfAqfSduBE1tNGOh7oe66CysJg/mbzg/xXWkbQuNhoO2Ftm6bp9Ew0G4ubPMODBoLA3EvWMtoKIz8dVs0Eq30whAaCANtL1zZWlAxDLSbC3tbGyqEgbYX1rvXGecw0G06T6z9tnmcwkDbC52dAnzCUDmtvc7ow1BoctI2ey2Cl08da3lY4GNeW/hoDbqwmfKJ9fnlh7XvMR+f7NTR/p+p89nrTLth9HZuaC+M831AFe2EkTj3vc60EUZnoXoY8YCq19Dei3pI7HXexzmMtlfaanMKIxG9UOYQRjygaixhGL2FaQRhxAOqjrVgGInohXkWCqOzMN/MMHoLyzkyjJi0KUwMIxEPqNIZGUY7t82fshFhxD/u9jIQRm/B154w/B5QFd56FUaKXqhsF8bJP1X4D2ZAFj1Engf9AAAAAElFTkSuQmCC"
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
    // Function to toggle the delete modal
    function toggleDeleteModal(show) {
        const modal = document.getElementById('deleteModal');
        modal.classList.toggle('hidden', !show);
        document.body.style.overflow = show ? 'hidden' : '';
    }

    // Function to toggle the success modal
    function toggleSuccessModal(show) {
        const modal = document.getElementById('successModal');
        modal.classList.toggle('hidden', !show);
        document.body.style.overflow = show ? 'hidden' : '';
    }

    // Handle delete action and show success modal
    function handleDelete() {
        toggleDeleteModal(false); // Close the delete modal
        setTimeout(() => {
            toggleSuccessModal(true); // Show the success modal after deletion
        }, 500); // Simulate some delay for the delete action
    }
</script>

        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-4">
    <!-- Kolom Kiri -->
    <div class="pr-8 md:pr-16 text-sm flex-1">
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
    <div class="pl-0 md:pl-10 text-sm mr-48 flex-1">
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

<div class="bg-white shadow-md rounded-lg p-6 w-full mt-4">
    <h2 class="text-lg font-bold mb-4">Riwayat Pengecekan dan Perbaikan</h2>
    
<!-- Item 1 -->
<div class="mb-4">
    <button 
        class="w-full bg-[#F8FDFF] border border-gray-400 rounded-lg p-4 flex justify-between items-center hover:border-[#223E88] transition cursor-pointer"
        type="button" 
        onclick="window.location.href='/admin/detailriwayat'">
        <div class="text-left">
            <p class="font-semibold">
                Pengecekan Agustus 2024 - Baik
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
    <button 
        class="w-full bg-[#F8FDFF] p-4 flex justify-between items-center cursor-pointer"
        type="button"
        onclick="window.location.href='/admin/detailriwayat2'">
        <div class="text-left">
            <p class="font-semibold">
                Perbaikan Agustus 2024 - Baik
            </p>
            <p class="text-sm text-gray-600">Tidak Berfungsi</p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 18l6-6-6-6"/>
        </svg>
    </button>
</div>

@endsection