<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/store', function () {
    return Inertia::render('Store');
})->name('store');

Route::get('/store', [StoreController::class, 'index'])->name('store');

Route::get('/store/{id}', [StoreController::class, 'show'])->name('store.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

