<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'getRandomSix'])->name('home');

Route::get('/store', [ProductController::class, 'index'])->name('store');
Route::get('/store/{product}', [ProductController::class, 'show'])->name('store.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/orders/{token}/approve',  [OrderController::class, 'approveShow']);
Route::post('/orders/{token}/approve', [OrderController::class, 'approveStore']);
Route::get('/orders/{token}/deny',     [OrderController::class, 'denyShow']);
Route::post('/orders/{token}/deny',    [OrderController::class, 'denyStore']);
