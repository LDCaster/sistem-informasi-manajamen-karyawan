<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontrakKerja;
use App\Http\Controllers\ManajemenKaryawan;
use App\Http\Controllers\PelatihanKaryawan;
use App\Http\Controllers\ResignasiKaryawan;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

Route::resource('/', DashboardController::class);
Route::resource('/karyawan', ManajemenKaryawan::class);
Route::resource('/kontrak-kerja', KontrakKerja::class);
Route::resource('/pelatihan-karyawan', PelatihanKaryawan::class);
Route::resource('/resignasi-karyawan', ResignasiKaryawan::class);
Route::resource('/users', Users::class);

// Route untuk profile
Route::get('/profile', [Users::class, 'profile'])->name('profile.index');
