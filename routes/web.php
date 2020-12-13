<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/info', function () {
    return view('info');
});
Route::get('/phpinfo', function () {
    return phpinfo();
});
Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
//Zeigt das Formular an
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
//Kümmert sich ums Updaten
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
