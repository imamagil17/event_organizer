<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\KategoriAcaraController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\JadwalAcaraController;
use App\Http\Controllers\AcaraVendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AuthController::class, "register"])->name('auth.register');
Route::get('login', [AuthController::class, "login"])->name('auth.login');
Route::post('register', [AuthController::class, 'store'])->name('auth.store');
Route::post('login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');

    // Profile route
    Route::get('/profile', [ProfileController::class, "index"])->name('profile.index');

    // Acara Route
    Route::resource('acaras', AcaraController::class);

    // KategoriAcara Route
    Route::resource('kategori_acaras', KategoriAcaraController::class);

    // Klien Route
    Route::resource('kliens', KlienController::class);

    // Vendor Route
    Route::resource('vendors', VendorController::class);

    // JadwalAcara Route
    Route::resource('jadwal_acaras', JadwalAcaraController::class);

     // Acara-Vendor Relationship Routes
    Route::post('/acaras/vendors/attach', [AcaraVendorController::class, 'attach'])->name('acaras.vendors.attach');
    Route::post('/acaras/vendors/detach', [AcaraVendorController::class, 'detach'])->name('acaras.vendors.detach');
});
