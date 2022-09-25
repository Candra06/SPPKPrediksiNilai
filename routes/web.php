<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;

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

Route::get('/', [UserController::class, 'home'])->name('login');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);
Route::middleware('auth')->group(function () {
    Route::post('/importUsers', [UserController::class, 'importUsers']);
    Route::post('/importMapel', [MapelController::class, 'importMapel']);
    Route::post('/importKelas', [KelasController::class, 'importKelas']);
    Route::post('/importMengajar', [MengajarController::class, 'importMengajar']);
    Route::post('/importNilai', [NilaiController::class, 'importNilai']);
    Route::get('/file-import',[UserController::class,'importView']);
    Route::get('/dashboard/admin', [UserController::class, 'dashboardAdmin']);
    Route::get('/dashboard/pengajar', [UserController::class, 'dashboardPengajar']);
    Route::resource('mapel', MapelController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('nilai', NilaiController::class);
    Route::resource('mengajar', MengajarController::class);
    Route::resource('akun', UserController::class);
    Route::post('/nilai/inputBy', [NilaiController::class, 'inputBy']);
    Route::post('/nilai/input', [NilaiController::class, 'input']);
    Route::get('/detailNilai/{mengajar}/{periode}', [NilaiController::class, 'detail']);
    Route::get('/dataMengajar', [MengajarController::class, 'dataMengajar']);
    Route::get('/dataNilai/{idKelas}', [MengajarController::class, 'dataNilai']);
    Route::get('/prediksi/{idMengajar}', [MengajarController::class, 'prediksi']);
});
