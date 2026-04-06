<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'getRandomSix'])->name('home');

Route::get('/store', function () {
    return Inertia::render('Store');
})->name('store');

Route::get('/store', [ProductController::class, 'index'])->name('store');

Route::get('/store/{product}', [ProductController::class, 'show'])->name('store.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

