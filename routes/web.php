<?php

use Illuminate\Support\Facades\Route;

// Halaman utama: dashboard link tugas
Route::get('/', function () {
    return view('dashboard');
});

// Muat otomatis semua file routes/pertemuan*.php
foreach (glob(__DIR__ . '/pertemuan*.php') as $file) {
    require $file;
}