<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaApiController;
use App\Http\Controllers\Api\BukuApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('mahasiswa', MahasiswaApiController::class);
Route::apiResource('buku', BukuApiController::class);