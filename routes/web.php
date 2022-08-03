<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukAdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProdukController::class, 'index'])->name('home');

Route::resources(
    [
        'produk' => ProdukController::class,
        'kategori' => KategoriController::class,
    ]
);

Route::get('/loginview', [UserController::class, 'loginview'])->name('login.view');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/registerview', [UserController::class, 'registerview'])->name('register.view');
Route::post('/register', [UserController::class, 'register'])->name('register.proccess');

Route::middleware('auth')->group(function () {
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/keranjang', [ProdukController::class, 'keranjang'])->name('pelanggan.keranjang');
    Route::post('/postkeranjang/{produk}', [ProdukController::class, 'postkeranjang'])->name('pelanggan.postkeranjang');
    Route::get('/bayar/{detailtransaksi}', [ProdukController::class, 'bayar'])->name('pelanggan.bayar');
    Route::post('/prosesbayar/{detailtransaksi}', [ProdukController::class, 'prosesbayar'])->name('pelanggan.prosesbayar');
    Route::get('/summary', [ProdukController::class, 'summary'])->name('pelanggan.summary');

    Route::get('admin/produk', [ProdukAdminController::class, 'produkIndex'])->name('admin.produk');
    Route::get('admin/viewaddproduk', [ProdukAdminController::class, 'viewaddproduk'])->name('admin.viewaddproduk');
    Route::post('admin/addproduk', [ProdukAdminController::class, 'addproduk'])->name('admin.addproduk');
    Route::get('admin/editproduk{produk}', [ProdukAdminController::class, 'editproduk'])->name('admin.editproduk');
    Route::post('admin/updateproduk/{produk}', [ProdukAdminController::class, 'updateproduk'])->name('admin.updateproduk');
    Route::get('admin/deleteProduk/{produk}',[ProdukAdminController::class,'deleteproduk'])->name('admin.deleteproduk');
    Route::get('admin/category', [KategoriController::class,'category'])->name('admin.category');
    Route::get('admin/viewaddcategory',[KategoriController::class,'viewaddcategory'])->name('admin.viewaddcategory');
    Route::post('admin/addcategory',[KategoriController::class,'addcategory'])->name('admin.addcategory');
    Route::get('admin/editcategory{kategori}',[KategoriController::class,'editcategory'])->name('admin.editcategory');
    Route::post('admin/updatecategory/{kategori}',[KategoriController::class,'updatecategory'])->name('admin.updatecategory');
    Route::get('admin/deleteCategory/{kategori}',[KategoriController::class,'deletecategory'])->name('admin.deletecategory');
    Route::get('admin/users', [AdminController::class,'userslist'])->name('admin.users');
});
