<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route Login & Logout
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Home - Redirect ke dashboard jika sudah login, atau ke login jika belum
Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'kepala_toko') {
            return redirect()->route('kepala.dashboard');
        } else {
            return redirect()->route('kasir.dashboard');
        }
    }

    return redirect('/login');
});

// Route Dashboard per role (dilindungi middleware)
Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
    ->name('admin.dashboard')
    ->middleware('role:admin');

Route::get('/kepala/dashboard', [DashboardController::class, 'kepalaDashboard'])
    ->name('kepala.dashboard')
    ->middleware('role:kepala_toko');

Route::get('/kasir/dashboard', [DashboardController::class, 'kasirDashboard'])
    ->name('kasir.dashboard')
    ->middleware('role:kasir');
    // Route lainnya (belum ada middleware, akan ditambahkan nanti)

// Route Transaksi - semua role yang login bisa akses
Route::get('/Transaksi', function () {
    return view('transaksi', ['title' => 'Transaksi']);
})->middleware('auth');

// Route Data Produk - hanya admin dan kepala_toko
Route::get('/DataProduk', function () {
    return view('data-produk', ['title' => 'Data Produk']);
})->middleware('role:admin,kepala_toko');

// Route About - semua role yang login bisa akses
Route::get('/About', function () {
    return view('about', ['title' => 'About']);
})->middleware('auth');

// Route Kelola User - hanya admin
Route::get('/users', function () {
    return view('users', ['title' => 'Kelola User']);
})->middleware('role:admin');

// Route Pengaturan Role - hanya admin
Route::get('/roles', function () {
    return view('roles', ['title' => 'Pengaturan Role']);
})->middleware('role:admin');

// untuk memanggil ProduckController dan method index dengan url [/DataProduk]
Route::get('/DataProduk', [ProdukController::class, 'index']);

// untuk memanggil halaman Tambah_Produk dengan url [/TambahProduk]
Route::get('/TambahProduk', [ProdukController::class, 'tambah']);

// untuk menyimpan data produk baru dengan url [/SimpanProduk]
Route::post('/SimpanProduk', [ProdukController::class, 'simpan']);

// untuk memanggil halaman Detail_Produk dengan url [/DetailProduk/id]
Route::get('/DetailProduk/{id}', [ProdukController::class, 'detail']);

// untuk memanggil halaman Edit_Produk dengan url [/EditProduk/id]
Route::get('/EditProduk/{id}', [ProdukController::class, 'edit']);

// untuk update data produk dengan url [/UpdateProduk/id]
Route::post('/UpdateProduk/{id}', [ProdukController::class, 'update']);

// untuk hapus data produk dengan url [/HapusProduk/id]
Route::get('/HapusProduk/{id}', [ProdukController::class, 'hapus']);

Route::middleware(['auth'])->group(function () {
    Route::resource('produk', ProdukController::class);
    
    // Route Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/baru', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
});