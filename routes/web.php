<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\CobaController;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/daftar_pengajuan', function () {
    return view('daftar_pengajuan');
})->name('daftar_pengajuan');

Route::get('/pengajuan', function () {
    return view('pengajuan');
})->name('pengajuan');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::resource('/pengajuan', PengajuanController::class);
Route::resource('/coba', CobaController::class);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/waiting', [PengajuanController::class, 'waiting'])->name('pengajuan.waiting');
// web.php
Route::get('/approved', [PengajuanController::class, 'approved'])->name('pengajuan.approved');
  