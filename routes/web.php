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
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use Monolog\Level;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); //halaman awal
    Route::post('/list', [UserController::class, 'list']);  //data user (json)
    Route::get('/create', [UserController::class, 'create']); //form tambah user
    Route::post('/', [UserController::class, 'store']); //data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']); // Menampilkan data user baru Ajax
    Route::get('/{id}', [UserController::class, 'show']); //detail user
    Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']); //js 6 tugas
    Route::get('/{id}/edit', [UserController::class, 'edit']); //form edit
    Route::put('/{id}', [UserController::class, 'update']); // simpan perubahan data
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
    Route::delete('/{id}', [UserController::class, 'destroy']); //hapus data user
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']); //halaman awal
    Route::post('/list', [LevelController::class, 'list']);  //data level (json)
    Route::get('/create', [LevelController::class, 'create']); //form tambah level
    Route::post('/', [LevelController::class, 'store']); //data level baru
    Route::get('/{id}', [LevelController::class, 'show']); //detail level
    Route::get('/{id}/edit', [LevelController::class, 'edit']); //form edit
    Route::put('/{id}', [LevelController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [LevelController::class, 'destroy']); //hapus data level
    //tugas js 6
    Route::get('/', [LevelController::class, 'index']);          // menampilkan halaman awal level
    Route::post('/list', [LevelController::class, 'list']);      // menampilkan data level dalam json untuk datables
    Route::get('/create', [LevelController::class, 'create']);   // menampilkan halaman form tambah level
    Route::post('/', [LevelController::class, 'store']);          // menyimpan data level baru
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah level Ajax
    Route::post('/ajax', [LevelController::class, 'store_ajax']); // Menampilkan data level baru Ajax
    Route::get('/{id}', [LevelController::class, 'show']);       // menampilkan detail level
    Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);  // menampilkan halaman form edit level
    Route::put('/{id}', [LevelController::class, 'update']);     // menyimpan perubahan data level
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // Menampilkan halaman form edit level Ajax
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); // Menyimpan perubahan data level Ajax
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete level Ajax
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data level Ajax
    Route::delete('/{id}', [LevelController::class, 'destroy']); // menghapus data level
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']); //halaman awal
    Route::post('/list', [KategoriController::class, 'list']);  //data kategori (json)
    Route::get('/create', [KategoriController::class, 'create']); //form tambah kategori
    Route::post('/', [KategoriController::class, 'store']); //data kategori baru
    Route::get('/{id}', [KategoriController::class, 'show']); //detail kategori
    Route::get('/{id}/edit', [KategoriController::class, 'edit']); //form edit
    Route::put('/{id}', [KategoriController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [KategoriController::class, 'destroy']); //hapus data kategori
    //tugas js 6
    Route::get('/', [KategoriController::class, 'index']);          // menampilkan halaman awal kategori
    Route::post('/list', [KategoriController::class, 'list']);      // menampilkan data kategori dalam json untuk datables
    Route::get('/create', [KategoriController::class, 'create']);   // menampilkan halaman form tambah kategori
    Route::post('/', [KategoriController::class, 'store']);          // menyimpan data kategori baru
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); // Menampilkan halaman form tambah kategori Ajax
    Route::post('/ajax', [KategoriController::class, 'store_ajax']); // Menampilkan data kategori baru Ajax
    Route::get('/{id}', [KategoriController::class, 'show']);       // menampilkan detail kategori
    Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);  // menampilkan halaman form edit kategori
    Route::put('/{id}', [KategoriController::class, 'update']);     // menyimpan perubahan data kategori
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); // Menampilkan halaman form edit kategori Ajax
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); // Menyimpan perubahan data kategori Ajax
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete kategori Ajax
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); // Untuk hapus data kategori Ajax
    Route::delete('/{id}', [KategoriController::class, 'destroy']); // menghapus data kategori
});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index']); //halaman awal
    Route::post('/list', [SupplierController::class, 'list']);  //data supplier (json)
    Route::get('/create', [SupplierController::class, 'create']); //form tambah supplier
    Route::post('/', [SupplierController::class, 'store']); //data supplier baru
    Route::get('/{id}', [SupplierController::class, 'show']); //detail supplier
    Route::get('/{id}/edit', [SupplierController::class, 'edit']); //form edit
    Route::put('/{id}', [SupplierController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [SupplierController::class, 'destroy']); //hapus data supplier
    //js 6 tugas
    Route::get('/', [SupplierController::class, 'index']);          // menampilkan halaman awal supplier
    Route::post('/list', [SupplierController::class, 'list']);      // menampilkan data supplier dalam json untuk datables
    Route::get('/create', [SupplierController::class, 'create']);   // menampilkan halaman form tambah supplier
    Route::post('/', [SupplierController::class, 'store']);          // menyimpan data supplier baru
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); // Menampilkan halaman form tambah supplier Ajax
    Route::post('/ajax', [SupplierController::class, 'store_ajax']); // Menampilkan data supplier baru Ajax
    Route::get('/{id}', [SupplierController::class, 'show']);       // menampilkan detail supplier
    Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);  // menampilkan halaman form edit supplier
    Route::put('/{id}', [SupplierController::class, 'update']);     // menyimpan perubahan data supplier
    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); // Menampilkan halaman form edit supplier Ajax
    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); // Menyimpan perubahan data supplier Ajax
    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete supplier Ajax
    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); // Untuk hapus data supplier Ajax
    Route::delete('/{id}', [SupplierController::class, 'destroy']); // menghapus data supplier
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']); //halaman awal
    Route::post('/list', [BarangController::class, 'list']);  //data barang (json)
    Route::get('/create', [BarangController::class, 'create']); //form tambah barang
    Route::post('/', [BarangController::class, 'store']); //data barang baru
    Route::get('/{id}', [BarangController::class, 'show']); //detail barang
    Route::get('/{id}/edit', [BarangController::class, 'edit']); //form edit
    Route::put('/{id}', [BarangController::class, 'update']); // simpan perubahan data
    Route::delete('/{id}', [BarangController::class, 'destroy']); //hapus data barang
    //js 6 tugas
    Route::get('/', [BarangController::class, 'index']);          // menampilkan halaman awal barang
    Route::post('/list', [BarangController::class, 'list']);      // menampilkan data barang dalam json untuk datables
    Route::get('/create', [BarangController::class, 'create']);   // menampilkan halaman form tambah barang
    Route::post('/', [BarangController::class, 'store']);          // menyimpan data barang baru
    Route::get('/create_ajax', [BarangController::class, 'create_ajax']); // Menampilkan halaman form tambah barang Ajax
    Route::post('/ajax', [BarangController::class, 'store_ajax']); // Menampilkan data barang baru Ajax
    Route::get('/{id}', [BarangController::class, 'show']);       // menampilkan detail barang
    Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);  // menampilkan halaman form edit barang
    Route::put('/{id}', [BarangController::class, 'update']);     // menyimpan perubahan data barang
    Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // Menampilkan halaman form edit barang Ajax
    Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); // Menyimpan perubahan data barang Ajax
    Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete barang Ajax
    Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // Untuk hapus data barang Ajax
    Route::delete('/{id}', [BarangController::class, 'destroy']); // menghapus data barang
});

Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter (id), maka harus berupa angka
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu
    // masukkan semua route yang perlu autentikasi di sini
});
