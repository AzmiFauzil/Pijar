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
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('alat', AlatController::class);

Route::resource('kategori', KategoriController::class);