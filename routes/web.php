<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Secara otomatis mengarahkan halaman utama (root) ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// Rute untuk menampilkan form login dan memproses data login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// ==========================================
// RUTE DASHBOARD DENGAN MIDDLEWARE CEK ROLE
// ==========================================

// Akses khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return '<h1>Selamat Datang di Dashboard Admin</h1>';
    })->name('admin.dashboard');
});

// Akses khusus Kepala Toko
Route::middleware(['auth', 'role:kepala_toko'])->group(function () {
    Route::get('/kepala/dashboard', function () {
        return '<h1>Selamat Datang di Dashboard Kepala Toko</h1>';
    })->name('kepala.dashboard');
});

// Akses khusus Kasir
Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/kasir/dashboard', function () {
        return '<h1>Selamat Datang di Dashboard Kasir</h1>';
    })->name('kasir.dashboard'); // Sesuaikan dengan nama rute di LoginController kamu jika ada
});