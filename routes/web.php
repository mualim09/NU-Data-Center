<?php

use App\Http\Controllers\Admin\DataAnggotaController;
use App\Http\Controllers\Admin\Laporan\LaporanController;
use App\Http\Controllers\Api\AnggotaResource;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\DataTables;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DataAnggotaController::class, 'index']);
        Route::get('data_anggota/list', [DataAnggotaController::class, 'list'])->name('data_anggota.list');
        Route::resource('data_anggota', DataAnggotaController::class)->parameter('data_anggota', 'anggota');

        Route::get('laporan/', [LaporanController::class, 'index'])->name('laporan');
        Route::get('laporan/anggota', [LaporanController::class, 'index'])->name('laporan.anggota');
    });

    Route::resource('anggota', AnggotaResource::class)->parameter('anggota', 'anggota');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.logout');
});


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('home');
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'store']);
});
