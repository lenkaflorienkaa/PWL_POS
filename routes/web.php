<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\LevelController;
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
Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
Route::get('/', [UserController::class, 'index']); //menampilkan halaman awal user
Route::post('/list', [UserController::class, 'list']); //menampilkan data user dalam bentuk json untuk datatables
Route::get('/create', [UserController::class, 'create']); //menampilkan halaman form tambah user
Route::post('/', [UserController::class, 'store']); //menyimpan data user baru
Route::get('/{id}', [UserController::class, 'show']); //menampilkan detail user
Route::get('/{id}/edit', [UserController::class, 'edit']); //menampilkan halaman form edit user
Route::put('/{id}', [UserController::class, 'update']); //menyimpan perubahan data user
Route::delete('/{id}', [UserController::class, 'destroy']); //menghapus data user
});


Route::group(['prefix' => 'stok'], function() {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/list', [StokController::class, 'list']);
    Route::get('/create', [StokController::class, 'create']);
    Route::post('/', [StokController::class, 'store']);
    Route::get('/{id}', [StokController::class, 'show']);
    Route::get('/{id}/edit', [StokController::class, 'edit']);
    Route::put('/{id}', [StokController::class, 'update']);
    Route::delete('/{id}', [StokController::class, 'destroy']);
});

Route::group(['prefix' => 'level'], function() {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [levelController::class, 'destroy']);
});

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index'])->name('/user');

// Route::get('/user/tambah', [UserController::class, 'tambah'])->name('/user/tambah');
// Route::get('/user/ubah{id}', [UserController::class, 'ubah'])->name('/user/ubah');
// Route::get('/user/hapus{id}', [UserController::class, 'hapus'])->name('/user/hapus');

// Route::post('/user/tambah_simpan',[UserController::class,'tambah_simpan'])->name('/user/tambah_simpan');
// Route::put('/user/ubah_simpan/{id}',[UserController::class,'ubah_simpan'])->name('/user/ubah_simpan');

// Route::get('/kategori/create', [KategoriController::class, 'create']);
// Route::post('/kategori', [KategoriController::class, 'store']);
// Route::get('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
// Route::put('/kategori/update_save/{id}', [KategoriController::class, 'update_save'])->name('kategori.update_save');
// Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

// Route::get('/welcome', function() {
//     return view('welcome');
// }); 

// Route::get('/', [WelcomeController::class, 'index']);

