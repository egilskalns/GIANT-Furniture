<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');
Route::get('/categories/{category}', [ShopController::class, 'index'])->name('shop.index');
Route::get('/categories/{category}/{product}', [ShopController::class, 'show'])->name('shop.show');

Auth::routes();
