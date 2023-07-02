<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruUserController;
use App\Http\Controllers\SiswaUserController;
use App\Http\Controllers\UserController;
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
});

Route::post('/siswa', [SiswaUserController::class, 'store']);
Route::get('/siswa', [SiswaUserController::class, 'index']);
Route::delete('/siswa/{user}',[SiswaUserController::class, 'destroy']);
Route::get('/siswa/edit/{user}', [SiswaUserController::class, 'edit']);
Route::patch('/siswa/{user}',[SiswaUserController::class, 'update']);
// Route::delete('siswa/{id}', ['UserController@destroy']);

Route::get('/guru',[GuruUserController::class, 'index']);
Route::post('/guru', [GuruUserController::class, 'store']);
Route::get('/guru/{user}/edit', [GuruUserController::class, 'edit']);
Route::patch('/guru/{user}', [GuruUserController::class, 'update']);
Route::delete('/guru/{user}', [GuruUserController::class, 'destroy']);
