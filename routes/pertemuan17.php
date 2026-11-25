<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

Route::prefix('laporan')->group(function () {
    Route::get('/', [LaporanController::class, 'index']);
    Route::get('/pdf', [LaporanController::class, 'exportPdf']);
    Route::get('/excel', [LaporanController::class, 'exportExcel']);
});