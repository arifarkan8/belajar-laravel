<?php

use Illuminate\Support\Facades\Route;

Route::get('/client-mahasiswa', function () {
    return view('client_mahasiswa');
});

Route::get('/perpus/katalog-api', function () {
    return view('perpus_katalog_api');
});