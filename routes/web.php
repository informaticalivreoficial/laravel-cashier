<?php

use App\Http\Controllers\Admin\TenantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::view('404', 'errors.404')->name('erro-404');

/** Posts */
// Route::get('artigos/set-status', 'PostController@artigoSetStatus')->name('artigos.artigoSetStatus');
// Route::get('artigos/delete', 'PostController@delete')->name('artigos.delete');
// Route::delete('artigos/deleteon', 'PostController@deleteon')->name('artigos.deleteon');
// Route::post('artigos/image-set-cover', 'PostController@imageSetCover')->name('artigos.imageSetCover');
// Route::delete('artigos/image-remove', 'PostController@imageRemove')->name('artigos.imageRemove');
Route::resource('artigos', PostController::class);

Route::group(['middleware' => ['subdomain_master'], 'prefix' => 'admin'], function(){
    Route::resource('tenants', TenantController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
