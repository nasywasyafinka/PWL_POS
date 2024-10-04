<!-- ?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;

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
}); -->

<!-- jobsheet 5 tugas -->
<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;

Route::get('/', [WelcomeController::class,'index']);

Route::group(['prefix' => 'user'], function(){
    Route::get('/', [UserController::class, 'index']); //halaman awal
    Route::post('/list', [UserController::class, 'list']);  //data user (json)
    Route::get('/create', [UserController::class, 'create']); //form tambah user
    Route::post('/', [UserController::class, 'store']); //data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']); // Menampilkan data user baru Ajax
    Route::get('/{id}', [UserController::class, 'show']); //detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']); //form edit
    Route::put('/{id}', [UserController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [UserController::class, 'destroy']); //hapus data user
});

Route::group(['prefix' => 'level'], function(){
    Route::get('/', [LevelController::class, 'index']); //halaman awal
    Route::post('/list', [LevelController::class, 'list']);  //data level (json)
    Route::get('/create', [LevelController::class, 'create']); //form tambah level
    Route::post('/', [LevelController::class, 'store']); //data level baru
    Route::get('/{id}', [LevelController::class, 'show']); //detail level
    Route::get('/{id}/edit', [LevelController::class, 'edit']); //form edit
    Route::put('/{id}', [LevelController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [LevelController::class, 'destroy']); //hapus data level
});

Route::group(['prefix' => 'kategori'], function(){
    Route::get('/', [KategoriController::class, 'index']); //halaman awal
    Route::post('/list', [KategoriController::class, 'list']);  //data kategori (json)
    Route::get('/create', [KategoriController::class, 'create']); //form tambah kategori
    Route::post('/', [KategoriController::class, 'store']); //data kategori baru
    Route::get('/{id}', [KategoriController::class, 'show']); //detail kategori
    Route::get('/{id}/edit', [KategoriController::class, 'edit']); //form edit
    Route::put('/{id}', [KategoriController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [KategoriController::class, 'destroy']); //hapus data kategori
});

Route::group(['prefix' => 'supplier'], function(){
    Route::get('/', [SupplierController::class, 'index']); //halaman awal
    Route::post('/list', [SupplierController::class, 'list']);  //data supplier (json)
    Route::get('/create', [SupplierController::class, 'create']); //form tambah supplier
    Route::post('/', [SupplierController::class, 'store']); //data supplier baru
    Route::get('/{id}', [SupplierController::class, 'show']); //detail supplier
    Route::get('/{id}/edit', [SupplierController::class, 'edit']); //form edit
    Route::put('/{id}', [SupplierController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [SupplierController::class, 'destroy']); //hapus data supplier
});

Route::group(['prefix' => 'barang'], function(){
    Route::get('/', [BarangController::class, 'index']); //halaman awal
    Route::post('/list', [BarangController::class, 'list']);  //data barang (json)
    Route::get('/create', [BarangController::class, 'create']); //form tambah barang
    Route::post('/', [BarangController::class, 'store']); //data barang baru
    Route::get('/{id}', [BarangController::class, 'show']); //detail barang
    Route::get('/{id}/edit', [BarangController::class, 'edit']); //form edit
    Route::put('/{id}', [BarangController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [BarangController::class, 'destroy']); //hapus data barang
});

