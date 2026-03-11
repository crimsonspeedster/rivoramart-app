<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlugResolverController;

// GET
Route::get('/', [HomePageController::class, 'show'])
    ->name('home');

Route::get('/cart', [CartController::class, 'show'])
    ->name('cart');

Route::get('/{slug}', [SlugResolverController::class, 'resolver'])
    ->where('slug', '.*')
    ->name('slug.resolver');


// POST
Route::post('/cart/add', [CartController::class, 'add'])
    ->name('cart.add');
