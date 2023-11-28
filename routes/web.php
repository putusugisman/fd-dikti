<?php

use App\Http\Controllers\ListDosenController;
use App\Http\Controllers\ListMahasiswaController;
use App\Http\Controllers\ProdiPtController;
use App\Http\Controllers\ProfilPtController;
use App\Http\Controllers\RiwayatPendidikanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListMahasiswaController::class, 'index']);
Route::get('/ajax/load_list_mahasiswa', [ListMahasiswaController::class, 'data']);

Route::get('/riwayat_pendidikan', [RiwayatPendidikanController::class, 'index']);
Route::get('/ajax/load_riwayat_pendidikan', [RiwayatPendidikanController::class, 'data']);

Route::get('/profil_pt', [ProfilPtController::class, 'index']);

Route::get('/prodi_pt', [ProdiPtController::class, 'index']);
Route::get('/ajax/load_prodi_pt', [ProdiPtController::class, 'data']);

Route::get('/list_dosen', [ListDosenController::class, 'index']);
Route::get('/ajax/load_list_dosen', [ListDosenController::class, 'data']);