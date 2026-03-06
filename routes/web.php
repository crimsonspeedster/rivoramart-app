<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlugResolverController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{slug}', [SlugResolverController::class, 'resolver'])
    ->where('slug', '.*')
    ->name('slug.resolver');
