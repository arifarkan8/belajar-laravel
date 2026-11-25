<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiAkademikController;

Route::prefix('uji-nilai')->group(function () {
    Route::get('/', [NilaiAkademikController::class, 'index']);
    Route::get('/hitung/{nim}', [NilaiAkademikController::class, 'hitungIp']);
});