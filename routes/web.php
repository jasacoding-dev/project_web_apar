<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AparController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\StaffController;
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


    Route::get('/admin/profil', [AdminController::class, 'show'])->name('admin.profile');
    Route::get('/admin/profil/ubah', [AdminController::class, 'editprofile'])->name('admin.profile.edit');
    Route::post('/admin/profil/update', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::post('/admin/profile/update-picture', [AdminController::class, 'updateProfilePicture'])->name('admin.profile.updatePicture');
    Route::get('/admin/ubahkatasandi', [AdminController::class, 'showChangePasswordForm'])->name('admin.ubahkatasandi');
    Route::post('/admin/ubahkatasandi', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
    Route::get('/admin/lupasandi', [AdminController::class, 'showForgotPasswordForm'])->name('admin.lupasandi');
    Route::post('/admin/lupasandi', [AdminController::class, 'sendResetLinkEmail'])->name('admin.sendResetLink');
    Route::get('/admin/lupasandi2', [AdminController::class, 'showResetPasswordForm'])->name('admin.lupasandi2');
    Route::post('/admin/lupasandi2', [AdminController::class, 'resetPassword'])->name('admin.resetPassword');


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


    Route::get('admin/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::get('admin/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
    Route::post('admin/lokasi/store', [LokasiController::class, 'store'])->name('lokasi.store');
    Route::get('admin/lokasi/{id}/show', [LokasiController::class, 'show'])->name('lokasi.show');
    Route::get('admin/lokasi/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
    Route::post('/admin/lokasi/{id}', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('/admin/lokasi/{id}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');

    Route::get('/client/profil', [ClientController::class, 'profile'])->name('client.profile');
    Route::get('/client/profil/ubah', [ClientController::class, 'editprofile'])->name('client.profile.edit');
    Route::post('/client/profil/update', [ClientController::class, 'updateProfile'])->name('client.updateProfile');
    Route::post('/client/profile/update-picture', [ClientController::class, 'updateProfilePicture'])->name('client.profile.updatePicture');
    Route::get('/client/ubahkatasandi', [ClientController::class, 'showChangePasswordForm'])->name('client.ubahkatasandi');
    Route::post('/client/ubahkatasandi', [ClientController::class, 'updatePassword'])->name('client.updatePassword');
    Route::get('/client/lupasandi', [ClientController::class, 'showForgotPasswordForm'])->name('client.lupasandi');
    Route::post('/client/lupasandi', [ClientController::class, 'sendResetLinkEmail'])->name('client.sendResetLink');
    Route::get('/client/lupasandi2', [ClientController::class, 'showResetPasswordForm'])->name('client.lupasandi2');
    Route::post('/client/lupasandi2', [ClientController::class, 'resetPassword'])->name('client.resetPassword');

    Route::get('client/lokasi', [ClientController::class, 'lokasi'])->name('client.lokasi');
    Route::get('client/lokasi/{id}/show', [ClientController::class, 'showlokasi'])->name('client.showlokasi');
});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/lokasi', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/lokasi/create', [StaffController::class, 'createlokasi'])->name('staff.lokasi.create');
    Route::post('/staff/lokasi/store', [StaffController::class, 'storelokasi'])->name('staff.lokasi.store');
    Route::get('/staff/lokasi/{id}/show', [StaffController::class, 'showlokasi'])->name('staff.lokasi.show');
    Route::get('/staff/lokasi/{id}/edit', [StaffController::class, 'editlokasi'])->name('staff.lokasi.edit');
    Route::post('/staff/lokasi/{id}', [StaffController::class, 'updatelokasi'])->name('staff.lokasi.update');
    Route::delete('/staff/lokasi/{id}', [StaffController::class, 'destroylokasi'])->name('staff.lokasi.destroy');
    

    Route::get('/staff/barcode', [StaffController::class, 'indexbarcode'])->name('barcode.index');
    
    Route::get('staff/detailbarcode', function () {
        return view('staff.detailbarcode');
    })->name('detailbarcode');
    

    Route::get('/staff/profil', [StaffController::class, 'profile'])->name('staff.profile');
    Route::get('/staff/profil/ubah', [StaffController::class, 'editprofile'])->name('staff.profile.edit');
    Route::post('/staff/profil/update', [StaffController::class, 'updateProfile'])->name('staff.updateProfile');
    Route::post('/staff/profil/update-picture', [StaffController::class, 'updateProfilePicture'])->name('staff.profile.updatePicture');
    Route::get('/staff/ubahkatasandi', [StaffController::class, 'showChangePasswordForm'])->name('staff.ubahkatasandi');
    Route::post('/staff/ubahkatasandi', [StaffController::class, 'updatePassword'])->name('staff.updatePassword');
    Route::get('/staff/lupasandi', [StaffController::class, 'showForgotPasswordForm'])->name('staff.lupasandi');
    Route::post('/staff/lupasandi', [StaffController::class, 'sendResetLinkEmail'])->name('staff.sendResetLink');
    Route::get('/staff/lupasandi2', [StaffController::class, 'showResetPasswordForm'])->name('staff.lupasandi2');
    Route::post('/staff/lupasandi2', [StaffController::class, 'resetPassword'])->name('staff.resetPassword');



    // Route ke halaman utama (Dashboard)
    Route::get('staff/detailriwayat', function () {
        return view('staff.detailriwayat'); // Ganti dengan view dashboard yang sesuai
    })->name('detailriwayat');
    
    // Route ke halaman utama (Dashboard)
    Route::get('staff/detailriwayat2', function () {
        return view('staff.detailriwayat2'); // Ganti dengan view dashboard yang sesuai
    })->name('detailriwayat2');
});




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
Route::get('admin/detailriwayat', function () {
    return view('admin.detailriwayat'); // Ganti dengan view dashboard yang sesuai
})->name('detailriwayat');

// Route ke halaman utama (Dashboard)
Route::get('admin/detailriwayat2', function () {
    return view('admin.detailriwayat2'); // Ganti dengan view dashboard yang sesuai
})->name('detailriwayat2');

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

// Route ke halaman utama (Dashboard)
Route::get('client/detailriwayat2', function () {
    return view('client.detailriwayat2'); // Ganti dengan view dashboard yang sesuai
})->name('detailriwayat2');

// Route ke halaman utama (Dashboard)
Route::get('client/notifications', function () {
    return view('client.notifications'); // Ganti dengan view dashboard yang sesuai
})->name('notifications');







Route::get('staff/kustom', function () {
    return view('staff.kustom');
})->name('kustom');

Route::get('staff/perbaikan', function () {
    return view('staff.perbaikan');
})->name('perbaikan');







require __DIR__ . '/auth.php';
