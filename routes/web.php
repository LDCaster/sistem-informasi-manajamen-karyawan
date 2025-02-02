<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontrakKerja;
use App\Http\Controllers\LaporanKaryawanController;
use App\Http\Controllers\ManajemenKaryawan;
use App\Http\Controllers\ManajemenUsers;
use App\Http\Controllers\PelatihanKaryawan;
use App\Http\Controllers\ResignasiKaryawan;
use App\Http\Controllers\Users;
use App\Http\Middleware\AuthLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/auth/login', [AuthController::class, 'authenticate'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('/dashboard', DashboardController::class)->middleware(AuthLogin::class);
Route::resource('/karyawan', ManajemenKaryawan::class)->middleware(AuthLogin::class);

Route::resource('/kontrak-kerja', KontrakKerja::class)->middleware(AuthLogin::class);
Route::resource('/pelatihan-karyawan', PelatihanKaryawan::class)->middleware(AuthLogin::class);
Route::resource('/resignasi-karyawan', ResignasiKaryawan::class)->middleware(AuthLogin::class);
Route::resource('/users', ManajemenUsers::class)->middleware(AuthLogin::class);

Route::resource('/laporan-karyawan', LaporanKaryawanController::class)->middleware(AuthLogin::class);
// Route untuk profile
Route::get('/profile', [Users::class, 'profile'])->name('profile.index');
