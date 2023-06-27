<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::post('/siswa', [UserController::class, 'store']);
Route::get('/siswa', [UserController::class, 'index']);
Route::delete('/siswa/{user}',[UserController::class, 'destroy']);
Route::get('/siswa/edit/{user}', [UserController::class, 'edit']);
Route::patch('/siswa/{user}',[UserController::class, 'update']);
// Route::delete('siswa/{id}', ['UserController@destroy']);


Route::resource('guru', GuruController::class);
