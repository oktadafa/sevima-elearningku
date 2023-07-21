<?php

use App\Http\Controllers\BabPelajaranController;
use App\Http\Controllers\DaftarHadirController;
use App\Http\Controllers\GuruUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SiswaUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::post('/siswa', [SiswaUserController::class, 'store']);
Route::get('/siswa', [SiswaUserController::class, 'index']);
Route::delete('/siswa/{user}',[SiswaUserController::class, 'destroy']);
Route::get('/siswa/edit/{user}', [SiswaUserController::class, 'edit']);
Route::patch('/siswa/{user}',[SiswaUserController::class, 'update']);

Route::get('/guru',[GuruUserController::class, 'index']);
Route::post('/guru', [GuruUserController::class, 'store']);
Route::get('/guru/{user}/edit', [GuruUserController::class, 'edit']);
Route::patch('/guru/{user}', [GuruUserController::class, 'update']);
Route::delete('/guru/{user}', [GuruUserController::class, 'destroy']);

Route::resource('/pelajaran', MapelController::class);
Route::resource('/bab', BabPelajaranController::class);
Route::get('/materi/create/{judul}', [MateriController::class, 'create']);
Route::resource('/materi', MateriController::class);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/siswa');

Route::get('/back/materi/{materi}', [DaftarHadirController::class, 'hadir']);
