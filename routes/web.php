<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;


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

//Jobsheet 5 Praktikum 2
Route::get('/', [WelcomeController::class, 'index']);

//Jobsheet 5 Praktikum 3
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); //halaman awal
    Route::post('/list', [UserController::class, 'list']);  //data user (json)
    Route::get('/create', [UserController::class, 'create']); //form tambah user
    Route::post('/', [UserController::class, 'store']); //data user baru
    Route::get('/{id}', [UserController::class, 'show']); //detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); //form edit
    Route::put('/{id}', [UserController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [UserController::class, 'destroy']); //hapus data user
});
