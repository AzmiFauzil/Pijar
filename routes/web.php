<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'proses_register']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'proses_login']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);

Route::get('/logout', [AuthController::class, 'logout']);