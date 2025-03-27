<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AparController;
use App\Http\Controllers\Auth\OTPVerificationController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
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


Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/verify-otp', [OTPVerificationController::class, 'show'])
    ->middleware('guest')
    ->name('password.otp');

Route::post('/verify-otp', [OTPVerificationController::class, 'verify'])
    ->middleware('guest')
    ->name('password.otp.verify');

Route::post('/resend-otp', [OTPVerificationController::class, 'resend'])
    ->middleware('guest')
    ->name('password.otp.resend');

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

    Route::get('admin/barcode', [AdminController::class, 'indexbarcode'])->name('admin.barcode');
    Route::get('/search-barcode', [AdminController::class, 'searchbarcode'])->name('search.barcode');

    Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/search-users', [PenggunaController::class, 'search'])->name('search.users');
    Route::get('/admin/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::post('/admin/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/admin/pengguna/{id}/show', [PenggunaController::class, 'show'])->name('pengguna.show');
    Route::get('/admin/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('/admin/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::delete('/admin/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

    Route::get('/admin/apar', [AparController::class, 'index'])->name('apar.index');
    Route::get('/search-apar', [AparController::class, 'search'])->name('search.apar');
    Route::get('/admin/apar/create', [AparController::class, 'create'])->name('apar.create');
    Route::post('/admin/apar/store', [AparController::class, 'store'])->name('apar.store');
    Route::get('/admin/apar/{id}/show', [AparController::class, 'show'])->name('apar.show');
    Route::get('/admin/apar/{id}/edit', [AparController::class, 'edit'])->name('apar.edit');
    Route::post('/admin/apar/{id}', [AparController::class, 'update'])->name('apar.update');
    Route::delete('/admin/apar/{id}', [AparController::class, 'destroy'])->name('apar.destroy');

    Route::get('admin/sparepart', [SparepartController::class, 'index'])->name('sparepart.index');
    Route::get('/search-sparepart', [SparepartController::class, 'search'])->name('search.sparepart');
    Route::get('admin/sparepart/create', [SparepartController::class, 'create'])->name('sparepart.create');
    Route::post('admin/sparepart/store', [SparepartController::class, 'store'])->name('sparepart.store');
    Route::get('admin/sparepart/{id}/show', [SparepartController::class, 'show'])->name('sparepart.show');
    Route::get('admin/sparepart/{id}/edit', [SparepartController::class, 'edit'])->name('sparepart.edit');
    Route::post('/admin/sparepart/{id}', [SparepartController::class, 'update'])->name('sparepart.update');
    Route::delete('/admin/sparepart/{id}', [SparepartController::class, 'destroy'])->name('sparepart.destroy');

    Route::get('admin/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::get('/search-lokasi', [LokasiController::class, 'search'])->name('search.lokasi');
    Route::get('admin/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
    Route::post('admin/lokasi/store', [LokasiController::class, 'store'])->name('lokasi.store');
    Route::get('admin/lokasi/{id}/show', [LokasiController::class, 'show'])->name('lokasi.show');
    Route::get('admin/lokasi/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
    Route::post('/admin/lokasi/{id}', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('/admin/lokasi/{id}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');

    Route::get('/admin/detail/{id}/riwayat', [LokasiController::class, 'showriwayat'])->name('detail.riwayat.show');
    Route::get('/admin/detail/{id}/perbaikan', [LokasiController::class, 'showriwayatperbaikan'])->name('detail.perbaikan.show');

    Route::get('admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');

    Route::get('/client/notifications', [ClientController::class, 'notifications'])->name('client.notifications');

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
    Route::get('/client-search-lokasi', [ClientController::class, 'search'])->name('search.lokasi');
    Route::get('client/lokasi/{id}/show', [ClientController::class, 'showlokasi'])->name('client.showlokasi');
    Route::get('/client/detail/{id}/riwayat', [ClientController::class, 'showriwayat'])->name('client.detail.riwayat.show');
    Route::get('/client/detail/{id}/perbaikan', [ClientController::class, 'showriwayatperbaikan'])->name('client.detail.perbaikan.show');
});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/lokasi', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/search-lokasi', [StaffController::class, 'searchlokasi'])->name('search.lokasi');
    Route::get('/staff/lokasi/create', [StaffController::class, 'createlokasi'])->name('staff.lokasi.create');
    Route::post('/staff/lokasi/store', [StaffController::class, 'storelokasi'])->name('staff.lokasi.store');
    Route::get('/staff/lokasi/{id}/show', [StaffController::class, 'showlokasi'])->name('staff.lokasi.show');
    Route::get('/staff/lokasi/{id}/edit', [StaffController::class, 'editlokasi'])->name('staff.lokasi.edit');
    Route::post('/staff/lokasi/{id}', [StaffController::class, 'updatelokasi'])->name('staff.lokasi.update');
    Route::delete('/staff/lokasi/{id}', [StaffController::class, 'destroylokasi'])->name('staff.lokasi.destroy');

    Route::get('/staff/barcode', [StaffController::class, 'indexbarcode'])->name('barcode.index');
    Route::get('/search-barcode', [StaffController::class, 'searchbarcode'])->name('search.barcode');
    Route::get('/staff/scan-barcode', [StaffController::class, 'showScanPage'])->name('staff.scan.barcode');
    Route::get('/staff/barcode/detail/{nomor_apar}', [StaffController::class, 'showDetailbarcode'])->name('staff.barcode.detail');
    Route::post('/staff/barcode/detail/{nomor_apar}/update-status', [StaffController::class, 'updateStatus'])->name('barcode.updateStatus');
    Route::get('/staff/barcode/perbaikan/{nomor_apar}', [StaffController::class, 'statusperbaikan'])->name('staff.status.perbaikan');
    Route::post('/staff/barcode/perbaikan/{nomor_apar}/store', [StaffController::class, 'storesparepart'])->name('staff.status.perbaikan.store');
    Route::get('/staff/barcode/kustom/{nomor_apar}', [StaffController::class, 'statuskustom'])->name('staff.status.kustom');
    Route::post('/staff/barcode/kustom/{nomor_apar}/store', [StaffController::class, 'storekustom'])->name('laporan.kustom.store');

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

    Route::get('/staff/detail/{id}/riwayat', [StaffController::class, 'showriwayat'])->name('staff.detail.riwayat.show');
    Route::get('/staff/detail/{id}/perbaikan', [StaffController::class, 'showriwayatperbaikan'])->name('staff.detail.perbaikan.show');
});

require __DIR__ . '/auth.php';
