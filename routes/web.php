<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\WebController::class,'index'])->name('index');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [\App\Http\Controllers\WebController::class, 'products'])->name('products');
Route::get('/onas', [\App\Http\Controllers\WebController::class, 'onas'])->name('onas');
Route::get('/product/{id}', [\App\Http\Controllers\WebController::class, 'product'])->name('product');
Route::get('/admin', [\App\Http\Controllers\WebController::class, 'admin'])->name('admin');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/category', [\App\Http\Controllers\WebController::class, 'addCategory'])->name('addCategory');
Route::delete('/category', [\App\Http\Controllers\WebController::class, 'delCategory'])->name('delCategory');

Route::post('/product', [\App\Http\Controllers\WebController::class, 'addProduct'])->name('addProduct');
Route::delete('/product', [\App\Http\Controllers\WebController::class, 'delProduct'])->name('delProduct');
Route::get('/AllProduct', [\App\Http\Controllers\WebController::class, 'AllProduct'])->name('AllProduct');
Route::get('/search',  [\App\Http\Controllers\WebController::class,'search'])->name('search');
Route::get('/filterByPrice', [\App\Http\Controllers\WebController::class,'filterByPrice'])->name('filterByPrice');
Route::get('/basket/index', [\App\Http\Controllers\BasketController::class,'index'])->name('basket.index');
Route::get('/basket/checkout', [\App\Http\Controllers\BasketController::class, 'checkout'])->name('basket.checkout');
Route::post('/basket/add/{id}', [\App\Http\Controllers\BasketController::class, 'add'])
    ->where('id', '[0-9]+')
    ->name('basket.add');
Route::post('/basket/plus/{id}', [\App\Http\Controllers\BasketController::class, 'plus'])
    ->where('id', '[0-9]+')
    ->name('basket.plus');
Route::post('/basket/minus/{id}', [\App\Http\Controllers\BasketController::class, 'minus'])
    ->where('id', '[0-9]+')
    ->name('basket.minus');
