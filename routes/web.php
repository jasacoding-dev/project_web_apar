<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/admin/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/admin/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/admin/pengguna/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');
    Route::get('/admin/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('/admin/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/admin/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
});

Route::middleware(['auth', 'role:client'])->group(function () {});

Route::middleware(['auth', 'role:staff'])->group(function () {});




// Route ke halaman utama (Dashboard)
// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard'); // Ganti dengan view dashboard yang sesuai
// })->name('dashboard');


Route::get('/forgotpassword1', function () {
    return view('auth.forgotpassword1');
})->name('password.request');

Route::get('/forgotpassword2', function () {
    return view('auth.forgotpassword2');
})->name('password.request');

Route::get('/resetpassword', function () {
    return view('auth.resetpassword');
})->name('resetpassword');

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







// Route Client

Route::get('client/login', function () {
    return view('authclient.login');
})->name('login');

Route::get('client/forgotpassword1', function () {
    return view('authclient.forgotpassword1');
})->name('password.request');

Route::get('client/forgotpassword2', function () {
    return view('authclient.forgotpassword2');
})->name('password.request');

Route::get('client/resetpassword', function () {
    return view('authclient.resetpassword');
})->name('resetpassword');

Route::get('client/createaccount', function () {
    return view('authclient.createaccount');
})->name('createaccount');


Route::get('client/dashboard', function () {
    return view('client.dashboard'); // Ganti dengan view dashboard yang sesuai
})->name('dashboard');


Route::get('client/daftarlokasi', function () {
    return view('client.daftarlokasi'); // Ganti dengan view dashboard yang sesuai
})->name('daftarlokasi');

// Route ke halaman utama (Dashboard)
Route::get('client/tambahlokasi', function () {
    return view('client.tambahlokasi'); // Ganti dengan view dashboard yang sesuai
})->name('tambahlokasi');

// Route ke halaman utama (Dashboard)
Route::get('client/detaillokasi', function () {
    return view('client.detaillokasi'); // Ganti dengan view dashboard yang sesuai
})->name('detaillokasi');

// Route ke halaman utama (Dashboard)
Route::get('client/detailriwayat', function () {
    return view('client.detailriwayat'); // Ganti dengan view dashboard yang sesuai
})->name('detailriwayat');

// Route ke halaman utama (Dashboard)
Route::get('client/detailriwayat2', function () {
    return view('client.detailriwayat2'); // Ganti dengan view dashboard yang sesuai
})->name('detailriwayat2');

// Route ke halaman utama (Dashboard)
Route::get('client/editlokasi', function () {
    return view('client.editlokasi'); // Ganti dengan view dashboard yang sesuai
})->name('editlokasi');

require __DIR__ . '/auth.php';
