<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// manajemen produk
Route::get("produk",[ProdukController::class, 'getProduk']);
Route::post("produk",[ProdukController::class, 'storeProduk']);
Route::delete("produk/{id}",[ProdukController::class, 'destroyProduk']);
