<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Models\penjualan;
use App\Models\produk;
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

    $produk = produk::count();
    $penjualan = penjualan::count();
    return view('layouts.dashboard',compact('produk','penjualan'));
});

//login
Route::get('/login', [LoginController::class, 'login']);
Route::get('/loginproses', [LoginController::class, 'loginproses']);
Route::get('/logout', [LoginController::class, 'logout']);

//register
Route::get('/registerindex', [LoginController::class, 'registerindex']);
Route::get('/addregister', [LoginController::class, 'addregister']);
Route::post('/insertregister', [LoginController::class, 'insertregister']);

//produk
Route::get('/produk', [ProdukController::class, 'produk'])->name('produk');
Route::get('/addproduk', [ProdukController::class, 'addproduk']);
Route::post('/insertproduk', [ProdukController::class, 'insertproduk']);
Route::get('/showproduk/{id}', [ProdukController::class, 'showproduk']);
Route::post('/updateproduk/{id}', [ProdukController::class, 'updateproduk']);
Route::get('/deleteproduk/{id}', [ProdukController::class, 'deleteproduk']);

//pelanggan
Route::get('/pelanggan', [PelangganController::class, 'pelanggan'])->name('pelanggan');
Route::get('/addpelanggan', [PelangganController::class, 'addpelanggan']);
Route::post('/insertpelanggan', [PelangganController::class, 'insertpelanggan']);
Route::get('/showpelanggan/{id}', [PelangganController::class, 'showpelanggan']);
Route::post('/updatepelanggan/{id}', [PelangganController::class, 'updatepelanggan']);
Route::get('/deletepelanggan/{id}', [PelangganController::class, 'deletepelanggan']);

//penjualan
Route::get('/penjualan', [PenjualanController::class, 'penjualan']);
Route::get('/addpenjualan', [PenjualanController::class, 'addpenjualan']);
Route::post('/insertpenjualan', [PenjualanController::class, 'insertpenjualan']);
Route::get('/getproducts', [PenjualanController::class, 'getproducts']);
