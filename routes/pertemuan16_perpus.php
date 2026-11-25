<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpusUjiController;

Route::prefix('perpus/uji-denda')->group(function () {
    Route::get('/', [PerpusUjiController::class, 'index']);
    Route::get('/hitung/{kode}', [PerpusUjiController::class, 'hitungDenda']);
});