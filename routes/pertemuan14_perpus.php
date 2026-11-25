<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpusAuthController;

Route::prefix('perpus')->group(function () {
    Route::get('/register', [PerpusAuthController::class, 'register']);
    Route::post('/register', [PerpusAuthController::class, 'simpanRegister']);

    Route::get('/login', [PerpusAuthController::class, 'login']);
    Route::post('/login', [PerpusAuthController::class, 'cekLogin']);

    Route::post('/logout', [PerpusAuthController::class, 'logout'])->middleware('auth');

    Route::get('/dashboard', function () {
        return view('perpus_dashboard');
    })->middleware('auth');

    Route::get('/kelola-buku', function () {
        return "<h1>Kelola Buku Perpustakaan</h1><p>Halo Pustakawan! Di sini kamu mengelola koleksi buku perpustakaan kampus.</p><a href='/perpus/dashboard'>Kembali ke Dashboard</a>";
    })->middleware(['auth', 'role:pustakawan']);

    Route::get('/pinjam-buku', function () {
        return "<h1>Peminjaman Buku</h1><p>Halo Anggota! Silakan pilih buku yang ingin kamu pinjam.</p><a href='/perpus/dashboard'>Kembali ke Dashboard</a>";
    })->middleware(['auth', 'role:anggota']);
});