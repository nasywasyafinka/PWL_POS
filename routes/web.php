<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
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

// Route untuk LevelController
Route::get('/level', [LevelController::class, 'index']);

// Route untuk KategoriController
Route::get('/kategori', [KategoriController::class, 'index']);

// Route untuk UserController
Route::get('/user', [UserController::class, 'index']);