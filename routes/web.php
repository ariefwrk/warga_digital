<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KegiatanWargaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekapitulasiTransaksiController;

// Halaman Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Route Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Resource routes untuk berbagai controller
Route::resource('warga', WargaController::class);
Route::resource('kegiatanwarga', KegiatanWargaController::class);
Route::resource('rekapitulasi-transaksi', RekapitulasiTransaksiController::class);

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');