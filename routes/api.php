<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/produk/{produk}', [ProdukAdminController::class, 'update'])->name('produk.update');
Route::apiResource('produk',ProdukAdminController::class);
Route::apiResource('kategori',KategoriController::class);
