<?php

use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'pendaftaran', 'as' => 'pendaftaran.'], function () {
        Route::get('/', [PendaftaranController::class, 'index'])->name('index');
        Route::post('/store', [PendaftaranController::class, 'store'])->name('store');
        Route::put('/update', [PendaftaranController::class, 'update'])->name('update');
    });
});
Route::get('/dosen/home', [HomeController::class, 'dosen'])->name('dosen.home')->middleware(['dosen']);
