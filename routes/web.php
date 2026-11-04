<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;

Route::get('/', function () {
    return redirect()->route('surat-masuk.index');
});

Route::resource('surat-masuk', SuratMasukController::class);
Route::resource('surat-keluar', SuratKeluarController::class);