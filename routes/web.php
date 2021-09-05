<?php

use Illuminate\Support\Facades\Route;

Route::view('404', 'errors.404')->name('erro-404');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
