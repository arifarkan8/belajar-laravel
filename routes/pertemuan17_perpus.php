<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanBukuController;

Route::prefix('perpus/laporan-buku')->group(function () {
    Route::get('/', [LaporanBukuController::class, 'index']);
    Route::get('/pdf', [LaporanBukuController::class, 'exportPdf']);
    Route::get('/excel', [LaporanBukuController::class, 'exportExcel']);
});