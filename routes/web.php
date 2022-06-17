<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/403', function () {
    return view('403');
})->name('403');

Auth::routes();

Route::middleware(['auth', 'mahasiswa'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'pendaftaran', 'as' => 'pendaftaran.'], function () {
        Route::get('/', [PendaftaranController::class, 'index'])->name('index');
        Route::post('/store', [PendaftaranController::class, 'store'])->name('store');
        Route::put('/update', [PendaftaranController::class, 'update'])->name('update');
    });
    Route::prefix('jadwal')->as('jadwal.')->group(function () {
        Route::get('/', [JadwalController::class, 'index'])->name('index');
        Route::get('/get-data', [JadwalController::class, 'getjadwal'])->name('get');
        Route::get('/create', [JadwalController::class, 'create'])->name('create');
        Route::post('/store', [JadwalController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [JadwalController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [JadwalController::class, 'update'])->name('update');
    });
});

Route::prefix('dosen')->as('dosen.')->middleware(['auth', 'dosen'])->group(function () {
    Route::get('/home', [HomeController::class, 'dosen'])->name('home');
    Route::prefix('konfirmasi')->as('konfirmasi.')->group(function () {
        Route::get('/', [KonfirmasiController::class, 'index'])->name('index');
        Route::get('/get-data', [KonfirmasiController::class, 'getdatasidang'])->name('get');
        Route::get('/read/{judul}', [KonfirmasiController::class, 'readberkas'])->name('read');
        Route::get('/verif/{id}', [KonfirmasiController::class, 'verif'])->name('verif');
    });
});
