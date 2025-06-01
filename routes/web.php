<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\KategoriAcaraController;
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
    // // Acara Route
    Route::resource('acaras', AcaraController::class);
    // Route::get('/acaras', [AcaraController::class, "index"])->name('acaras.index');
    // Route::get('/acaras/create', [AcaraController::class, "create"])->name('acaras.create');
    // Route::post('/acaras', [AcaraController::class, "store"])->name('acaras.store');
    // Route::get('/acaras/{id}', [AcaraController::class, "show"])->name('acaras.show');
    // Route::get('/acaras/{id}/edit', [AcaraController::class, "edit"])->name('acaras.edit');
    // Route::put('/acaras/{id}', [AcaraController::class, "update"])->name('acaras.update');
    // Route::delete('/acaras/{id}', [AcaraController::class, "destroy"])->name('acaras.destroy');
    // KategoriAcara Route
    Route::resource('kategori_acaras', KategoriAcaraController::class);
    // Route::get('/kategori_acaras', [KategoriAcaraController::class, "index"])->name('kategori_acaras.index');
    // Route::get('/kategori_acaras/create', [KategoriAcaraController::class, "create"])->name('kategori_acaras.create');
    // Route::post('/kategori_acaras', [KategoriAcaraController::class, "store"])->name('kategori_acaras.store');
    // Route::get('/kategori_acaras/{id}', [KategoriAcaraController::class, "show"])->name('kategori_acaras.show');
    // Route::get('/kategori_acaras/{id}/edit', [KategoriAcaraController::class, "edit"])->name('kategori_acaras.edit');
    // Route::put('/kategori_acaras/{id}', [KategoriAcaraController::class, "update"])->name('kategori_acaras.update');
    // Route::delete('/kategori_acaras/{id}', [KategoriAcaraController::class, "destroy"])->name('kategori_acaras.destroy');
    // Klien Route
    Route::resource('kliens', KlienController::class);
    // Route::get('/kliens', [KlienController::class, "index"])->name('kliens.index');
    // Route::get('/kliens/create', [KlienController::class, "create"])->name('kliens.create');
    // Route::post('/kliens', [KlienController::class, "store"])->name('kliens.store');
    // Route::get('/kliens/{id}', [KlienController::class, "show"])->name('kliens.show');
    // Route::get('/kliens/{id}/edit', [KlienController::class, "edit"])->name('kliens.edit');
    // Route::put('/kliens/{id}', [KlienController::class, "update"])->name('kliens.update');
    // Route::delete('/kliens/{id}', [KlienController::class, "destroy"])->name('kliens.destroy');
});