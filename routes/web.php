<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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
//Halaman Home
//Route tabel transaksi
Route::get('/home',[TransaksiController::class, 'index']);

//Route Input Data
Route::get('/home/tambah', [TransaksiController::class, 'tambah']);
Route::post('/home/store', [TransaksiController::class, 'store']);

//Route Edit Data
Route::get('/home/transaksi/edit/{id}', [TransaksiController::class, 'edit']);
Route::post('/home/transaksi/update/', [TransaksiController::class, 'update']);

//Route Hapus
Route::get('/home/transaksi/hapus/{id}', [TransaksiController::class, 'delete']);



//Route export pdf
Route::get('/downloadpdf', [TransaksiController::class, 'downloadpdf']);



//Halaman Kelola Data Produk
//Route tabel barang
Route::get('/home/brg',[BarangController::class, 'indexbrg']);

//Route Input Data
Route::get('/home/brg/tambah', [BarangController::class, 'tambahbrg']);

Route::post('/home/brg/store', [BarangController::class, 'storebrg']);

//Route Edit Data
Route::get('/home/brg/edit/{id}', [BarangController::class, 'editbrg']);
Route::post('/home/brg/update/', [BarangController::class, 'updatebrg']);

//Route Hapus
Route::get('/home/brg/hapus/{id}', [BarangController::class, 'deletebrg']);



//Halaman Kelola Data User
//Route user
Route::get('/home/user',[UserController::class, 'indexuser']);

//Route Input Data
Route::get('/home/user/tambah', [UserController::class, 'tambahuser']);

Route::post('/home/user/store', [UserController::class, 'storeuser']);

//Route Edit Data
Route::get('/home/user/edit/{id}', [UserController::class, 'edituser']);

Route::post('/home/user/update/', [UserController::class, 'updateuser']);

//Route Hapus
Route::get('/home/user/hapus/{id}', [UserController::class, 'deleteuser']);


//Laporan Penjualan
Route::get('/home/laporan',[LaporanController::class, 'indexl']);

//Route Edit Data
Route::get('/home/laporan/edit/{id}', [LaporanController::class, 'editl']);
Route::post('/home/laporan/update/', [LaporanController::class, 'updatel']);

//Route Hapus
Route::get('/home/laporan/hapus/{id}', [LaporanController::class, 'deletel']);

//Route export pdf
Route::get('/downloadpdf', [LaporanController::class, 'downloadpdf']);
