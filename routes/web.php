<?php

use App\Http\Controllers\Admin\TenantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\AuthController;

Route::view('404', 'errors.404')->name('erro-404');

/** Posts */
// Route::get('artigos/set-status', 'PostController@artigoSetStatus')->name('artigos.artigoSetStatus');
// Route::get('artigos/delete', 'PostController@delete')->name('artigos.delete');
// Route::delete('artigos/deleteon', 'PostController@deleteon')->name('artigos.deleteon');
// Route::post('artigos/image-set-cover', 'PostController@imageSetCover')->name('artigos.imageSetCover');
// Route::delete('artigos/image-remove', 'PostController@imageRemove')->name('artigos.imageRemove');
Route::resource('artigos', PostController::class);

// Route::get('/admin', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['subdomain_master'], 'prefix' => 'admin'], function(){
    
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.admin');
    Route::post('login', [AuthController::class, 'login'])->name('login.do');
    Route::post('recoverpass', [AuthController::class, 'recoverpass'])->name('recover.do');

    /** Dashboard Home */
    Route::get('home', [AuthController::class, 'home'])->name('home');


    Route::resource('tenants', TenantController::class);
});

/*********************** Usuários *******************************************/
Route::match(['post', 'get'], 'users/fetchCity', 'UserController@fetchCity')->name('users.fetchCity');
Route::get('users/team', 'UserController@team')->name('users.team');
Route::get('users/set-status', 'UserController@userSetStatus')->name('users.userSetStatus');
Route::get('users/view/{id}', 'UserController@view')->name('users.view');
Route::get('users/delete', 'UserController@delete')->name('users.delete');
Route::delete('users/deleteon', 'UserController@deleteon')->name('users.deleteon');
Route::get('users/deletecli', 'UserController@deletecli')->name('users.deletecli');
Route::delete('users/deleteoncli', 'UserController@deleteoncli')->name('users.deleteoncli');
//Route::get('users/delete{id}', 'UserController@destroy')->name('users.delete');
Route::resource('users', 'UserController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
