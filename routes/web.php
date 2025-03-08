<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AparController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SparepartController;
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
    // Route ke halaman utama (Dashboard)
    Route::get('admin/profil', [AdminController::class, 'show'])->name('admin.profile');

    // Route ke halaman utama (Dashboard)
    Route::get('admin/ubahprofil', function () {
        return view('admin.ubahprofil'); // Ganti dengan view dashboard yang sesuai
    })->name('ubahprofil');

    Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/admin/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/admin/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/admin/pengguna/{id}/show', [PenggunaController::class, 'show'])->name('pengguna.show');
    Route::get('/admin/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('/admin/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/admin/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');


    Route::get('/admin/apar', [AparController::class, 'index'])->name('apar.index');
    Route::get('/admin/apar/create', [AparController::class, 'create'])->name('apar.create');
    Route::post('/admin/apar/store', [AparController::class, 'store'])->name('apar.store');
    Route::get('/admin/apar/{id}/show', [AparController::class, 'show'])->name('apar.show');
    Route::get('/admin/apar/{id}/edit', [AparController::class, 'edit'])->name('apar.edit');
    Route::post('/admin/apar/{id}', [AparController::class, 'update'])->name('apar.update');
    Route::delete('/admin/apar/{id}', [AparController::class, 'destroy'])->name('apar.destroy');


    Route::get('admin/sparepart', [SparepartController::class, 'index'])->name('sparepart.index');
    Route::get('admin/sparepart/create', [SparepartController::class, 'create'])->name('sparepart.create');
    Route::post('admin/sparepart/store', [SparepartController::class, 'store'])->name('sparepart.store');
    Route::get('admin/sparepart/{id}/show', [SparepartController::class, 'show'])->name('sparepart.show');
    Route::get('admin/sparepart/{id}/edit', [SparepartController::class, 'edit'])->name('sparepart.edit');
    Route::post('/admin/sparepart/{id}', [SparepartController::class, 'update'])->name('sparepart.update');
    Route::delete('/admin/sparepart/{id}', [SparepartController::class, 'destroy'])->name('sparepart.destroy');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('client/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
});

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

// Route ke halaman utama (Dashboard)
Route::get('client/profil', function () {
    return view('client.profil'); // Ganti dengan view dashboard yang sesuai
})->name('profil');

// Route ke halaman utama (Dashboard)
Route::get('client/profil', function () {
    return view('client.profil'); // Ganti dengan view dashboard yang sesuai
})->name('profil');

// Route ke halaman utama (Dashboard)
Route::get('client/lupasandi', function () {
    return view('client.lupasandi'); // Ganti dengan view dashboard yang sesuai
})->name('lupasandi');

// Route ke halaman utama (Dashboard)
Route::get('client/lupasandi2', function () {
    return view('client.lupasandi2'); // Ganti dengan view dashboard yang sesuai
})->name('lupasandi2');

// Route ke halaman utama (Dashboard)
Route::get('client/ubahkatasandi', function () {
    return view('client.ubahkatasandi'); // Ganti dengan view dashboard yang sesuai
})->name('ubahkatasandi');


// Route ke halaman utama (Dashboard)
Route::get('client/notifications', function () {
    return view('client.notifications'); // Ganti dengan view dashboard yang sesuai
})->name('notifications');




// Route Staff

Route::get('staff/login', function () {
    return view('authstaff.login');
})->name('login');

Route::get('staff/forgotpassword1', function () {
    return view('authstaff.forgotpassword1');
})->name('password.request');

Route::get('staff/forgotpassword2', function () {
    return view('authstaff.forgotpassword2');
})->name('password.request');

Route::get('staff/resetpassword', function () {
    return view('authstaff.resetpassword');
})->name('resetpassword');

Route::get('staff/createaccount', function () {
    return view('authstaff.createaccount');
})->name('createaccount');

Route::get('staff/daftarlokasi', function () {
    return view('staff.daftarlokasi');
})->name('daftarlokasi');

// Route ke halaman utama (Dashboard)
Route::get('staff/tambahlokasi', function () {
    return view('staff.tambahlokasi'); // Ganti dengan view dashboard yang sesuai
})->name('tambahlokasi');

// Route ke halaman utama (Dashboard)
Route::get('staff/detaillokasi', function () {
    return view('staff.detaillokasi'); // Ganti dengan view dashboard yang sesuai
})->name('detaillokasi');

// Route ke halaman utama (Dashboard)
Route::get('staff/detailriwayat', function () {
    return view('staff.detailriwayat'); // Ganti dengan view dashboard yang sesuai
})->name('detailriwayat');

// Route ke halaman utama (Dashboard)
Route::get('staff/detailriwayat2', function () {
    return view('staff.detailriwayat2'); // Ganti dengan view dashboard yang sesuai
})->name('detailriwayat2');

// Route ke halaman utama (Dashboard)
Route::get('staff/editlokasi', function () {
    return view('staff.editlokasi'); // Ganti dengan view dashboard yang sesuai
})->name('editlokasi');

Route::get('staff/profil', function () {
    return view('staff.profil'); // Ganti dengan view dashboard yang sesuai
})->name('profil');

Route::get('staff/ubahprofil', function () {
    return view('staff.ubahprofil'); // Ganti dengan view dashboard yang sesuai
})->name('ubahprofil');

Route::get('staff/barcode', function () {
    return view('staff.barcode');
})->name('barcode');


require __DIR__ . '/auth.php';
