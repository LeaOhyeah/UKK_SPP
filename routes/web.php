<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.welcome');
});


// kelas
Route::resource('/master/kelas', KelasController::class)->middleware('auth:petugas');
// user
Route::resource('/master/user', UserController::class)->middleware('auth:petugas');
// spp
Route::resource('/master/spp', SppController::class)->middleware('auth:petugas');
// petugas
Route::resource('/master/petugas', PetugasController::class)->middleware('auth:petugas');

// pembayaran
Route::resource('/pembayaran/trs', PembayaranController::class)->middleware('auth:petugas');
Route::get('/pembayaran/cari', [PembayaranController::class, 'index'])->middleware('auth:petugas');

// tampilan siswa
Route::get('/siswa', [AuthController::class, 'indexUser']);
Route::get('/rincian', [AuthController::class, 'rincian']);

// arsip
Route::get('/arsip/kelas', [ArsipController::class, 'trashKelas'])->middleware('auth:petugas');
Route::get('/arsip/user', [ArsipController::class, 'trashUser'])->middleware('auth:petugas');
Route::get('/arsip/spp', [ArsipController::class, 'trashSpp'])->middleware('auth:petugas');
Route::get('/arsip/petugas', [ArsipController::class, 'trashPetugas'])->middleware('auth:petugas');

// auth
Route::get('/login', [AuthController::class, 'index'])->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::post('/logout', [AuthController::class, 'logout']);



