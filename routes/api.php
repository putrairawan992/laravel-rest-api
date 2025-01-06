<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Menambahkan user
Route::post('/users', [UserController::class, 'store']);


// Mengambil daftar user
Route::get('/users', [UserController::class, 'index']);
