<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\LaboratoriumController;

// ---------- Latihan: Katalog Mata Kuliah ----------
Route::prefix('matakuliah')->group(function () {
    Route::get('/', [MataKuliahController::class, 'index']);
    Route::get('/{kode}', [MataKuliahController::class, 'detail']);
});

// ---------- Tugas: Direktori & Inventaris Laboratorium ----------
Route::prefix('laboratorium')->group(function () {
    Route::get('/', [LaboratoriumController::class, 'index']);
    Route::get('/detail/{kode}', [LaboratoriumController::class, 'detail']);
    Route::get('/status/{status?}', [LaboratoriumController::class, 'statusLab']);
});