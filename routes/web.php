<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/create', function () {
    return view('admin.create');
});

Route::get('/admin/edit', function () {
    return view('admin.edit');
});
