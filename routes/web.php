<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/forgotpassword1', function () {
    return view('auth.forgotpassword1');
})->name('password.request');

Route::get('/forgotpassword2', function () {
    return view('auth.forgotpassword2');
})->name('password.request');

Route::get('/resetpassword', function () {
    return view('auth.resetpassword');
})->name('resetpassword');

Route::get('/createaccount', function () {
    return view('auth.createaccount');
})->name('createaccount');

// Route ke halaman utama (Dashboard)
Route::get('admin/dashboard', function () {
    return view('admin.dashboard'); // Ganti dengan view dashboard yang sesuai
})->name('dashboard');

// Route ke halaman utama (Dashboard)
Route::get('admin/pengguna', function () {
    return view('admin.pengguna'); // Ganti dengan view dashboard yang sesuai
})->name('pengguna');

// Route ke halaman utama (Dashboard)
Route::get('admin/tambahpengguna', function () {
    return view('admin.tambahpengguna'); // Ganti dengan view dashboard yang sesuai
})->name('tambahpengguna');

// Route ke halaman utama (Dashboard)
Route::get('admin/editpengguna', function () {
    return view('admin.editpengguna'); // Ganti dengan view dashboard yang sesuai
})->name('editpengguna');

// Route ke halaman utama (Dashboard)
Route::get('admin/detailpengguna', function () {
    return view('admin.detailpengguna'); // Ganti dengan view dashboard yang sesuai
})->name('detailpengguna');

// Route ke halaman utama (Dashboard)
Route::get('admin/notifications', function () {
    return view('admin.notifications'); // Ganti dengan view dashboard yang sesuai
})->name('notifications');

// Route ke halaman utama (Dashboard)
Route::get('admin/profil', function () {
    return view('admin.profil'); // Ganti dengan view dashboard yang sesuai
})->name('profil');

// Route ke halaman utama (Dashboard)
Route::get('admin/ubahprofil', function () {
    return view('admin.ubahprofil'); // Ganti dengan view dashboard yang sesuai
})->name('ubahprofil');

// Route ke halaman utama (Dashboard)
Route::get('admin/ubahkatasandi', function () {
    return view('admin.ubahkatasandi'); // Ganti dengan view dashboard yang sesuai
})->name('ubahkatasandi');

// Route ke halaman utama (Dashboard)
Route::get('admin/lupasandi', function () {
    return view('admin.lupasandi'); // Ganti dengan view dashboard yang sesuai
})->name('lupasandi');

// Route ke halaman utama (Dashboard)
Route::get('admin/lupasandi2', function () {
    return view('admin.lupasandi2'); // Ganti dengan view dashboard yang sesuai
})->name('lupasandi2');

// Route ke halaman utama (Dashboard)
Route::get('admin/daftarapar', function () {
    return view('admin.daftarapar'); // Ganti dengan view dashboard yang sesuai
})->name('daftarapar');

// Route ke halaman utama (Dashboard)
Route::get('admin/tambahapar', function () {
    return view('admin.tambahapar'); // Ganti dengan view dashboard yang sesuai
})->name('tambahapar');

// Route ke halaman utama (Dashboard)
Route::get('admin/detailapar', function () {
    return view('admin.detailapar'); // Ganti dengan view dashboard yang sesuai
})->name('detailapar');

// Route ke halaman utama (Dashboard)
Route::get('admin/editapar', function () {
    return view('admin.editapar'); // Ganti dengan view dashboard yang sesuai
})->name('editapar');

// Route ke halaman utama (Dashboard)
Route::get('admin/daftarsparepart', function () {
    return view('admin.daftarsparepart'); // Ganti dengan view dashboard yang sesuai
})->name('daftarsparepart');

// Route ke halaman utama (Dashboard)
Route::get('admin/tambahsparepart', function () {
    return view('admin.tambahsparepart'); // Ganti dengan view dashboard yang sesuai
})->name('tambahsparepart');

// Route ke halaman utama (Dashboard)
Route::get('admin/detailsparepart', function () {
    return view('admin.detailsparepart'); // Ganti dengan view dashboard yang sesuai
})->name('detailsparepart');

// Route ke halaman utama (Dashboard)
Route::get('admin/editsparepart', function () {
    return view('admin.editsparepart'); // Ganti dengan view dashboard yang sesuai
})->name('editsparepart');

// Route ke halaman utama (Dashboard)
Route::get('admin/daftarlokasi', function () {
    return view('admin.daftarlokasi'); // Ganti dengan view dashboard yang sesuai
})->name('daftarlokasi');

// Route ke halaman utama (Dashboard)
Route::get('admin/tambahlokasi', function () {
    return view('admin.tambahlokasi'); // Ganti dengan view dashboard yang sesuai
})->name('tambahlokasi');

// Route ke halaman utama (Dashboard)
Route::get('admin/detaillokasi', function () {
    return view('admin.detaillokasi'); // Ganti dengan view dashboard yang sesuai
})->name('detaillokasi');

// Route ke halaman utama (Dashboard)
Route::get('admin/detailriwayat', function () {
    return view('admin.detailriwayat'); // Ganti dengan view dashboard yang sesuai
})->name('detailriwayat');

// Route ke halaman utama (Dashboard)
Route::get('admin/detailriwayat2', function () {
    return view('admin.detailriwayat2'); // Ganti dengan view dashboard yang sesuai
})->name('detailriwayat2');

// Route ke halaman utama (Dashboard)
Route::get('admin/editlokasi', function () {
    return view('admin.editlokasi'); // Ganti dengan view dashboard yang sesuai
})->name('editlokasi');

// Route ke halaman utama (Dashboard)
Route::get('admin/daftarbarcode', function () {
    return view('admin.daftarbarcode'); // Ganti dengan view dashboard yang sesuai
})->name('daftarbarcode');

// Route ke halaman utama (Dashboard)
Route::get('admin/cetakbarcode', function () {
    return view('admin.cetakbarcode'); // Ganti dengan view dashboard yang sesuai
})->name('cetakbarcode');

// Route ke halaman utama (Dashboard)
Route::get('/dashboard1', function () {
    return view('auth.dashboard1'); // Ganti dengan view dashboard yang sesuai
})->name('dashboard1');


