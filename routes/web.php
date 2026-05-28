<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SiswaController;


Route::get('/', function () {
    return view('login');
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'proses_register']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'proses_login']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard-admin', [AuthController::class, 'dashboard_admin'])->name('admin.dashboard');

Route::get('/dashboard-petugas', function () {
    return view('petugas.dashboard-petugas');
});

Route::get('/peminjaman-admin', function () {
    return view('admin.peminjaman-admin');
});

Route::get('/pengembalian-admin', function () {
    return view('admin.pengembalian-admin');
});

Route::get('/laporan-admin', function () {
    return view('admin.laporan-admin');
});

Route::resource('alat', AlatController::class);
Route::resource('kategori', KategoriController::class);

route::get('/alat', [AlatController::class, 'index'])->name('alat.index');
route::get('/tambah-alat', [AlatController::class, 'create'])->name('tambah-alat');
route::post('/alat', [AlatController::class, 'store'])->name('alat.store');
route::get('/alat/{id}/edit', [AlatController::class, 'edit'])->name('alat.edit');
route::put('/alat/{id}', [AlatController::class, 'update'])->name('alat.update');
route::delete('/alat/{id}', [AlatController::class, 'destroy'])->name('alat.destroy');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('siswa', SiswaController::class);
});

Route::prefix('petugas')->group(function () {
    Route::get('/dashboard', function () {
        return view('petugas.dashboard-petugas');
    });

    Route::get('/log-aktifitas', function () {
        return view('petugas.log-aktifitas');
    });

    Route::get('/peninjauan-peminjaman', function () {
        return view('petugas.peninjauan-peminjaman');
    });

    Route::get('/peninjauan-pengembalian', function () {
        return view('petugas.peninjauan-pengembalian');
    });

});