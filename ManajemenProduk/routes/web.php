<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
});
Route::resource('produk', ProdukController::class);
