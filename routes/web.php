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

Route::get('/', function () {
    return view('welcome');
});

// level
Route::get('/level', [LevelController::class, 'index']);
// kategori
Route::get('/kategori', [KategoriController::class, 'index']);
//user
Route::get('/user', [UserController::class, 'index']);
//user tambah
Route::get('/user/tambah', [UserController::class, 'tambah']);
//tambah simpan
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
//ubah
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
//ubah simpan
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
//delete
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

//Jobsheet 5 Praktikum 2
Route::get('/', [WelcomeController::class, 'index']);