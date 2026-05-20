<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\KategoriController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'proses_register']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'proses_login']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard-admin', function () {
    return view('dashboard-admin');
});

Route::get('/dashboard-petugas', function () {
    return view('dashboard-petugas');
});

Route::resource('alat', AlatController::class);
Route::resource('kategori', KategoriController::class);



Route::get('/alat', [AlatController::class, 'index'])->name('alat.index');
Route::get('/alat/create', [AlatController::class, 'create'])->name('alat.create');
Route::post('/alat', [AlatController::class, 'store'])->name('alat.store');
Route::get('/alat/{id}/edit', [AlatController::class, 'edit'])->name('alat.edit');
Route::put('/alat/{id}', [AlatController::class, 'update'])->name('alat.update');
Route::delete('/alat/{id}', [AlatController::class, 'destroy'])->name('alat.destroy');