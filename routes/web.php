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
Route::get('/phpinfo', function () {
    return phpinfo();
});
//Startseite
Route::get('/', function () {
    return view('welcome');
});
//Hilfeseiten
Route::get('/about', function () { return view('about'); });
Route::get('/faq', function () { return view('faq'); });
Route::get('/nettiquette', function () { return view('nettiquette'); });
//Auth::routes(['verify' => true]); //E-Mail-Verifizierung für Test ausgesetzt
Auth::routes();
Route::get('/home', 'HomeController@index');
//PROFIL
Route::get('/profile/{username}', 'ProfilesController@index')->name('profile.show');
//Zeigt das Formular an
Route::get('/profile/{username}/edit', 'ProfilesController@edit')->name('profile.edit');
//Kümmert sich ums Updaten
Route::patch('/profile/{username}', 'ProfilesController@update')->name('profile.update');
//Gästebucheintrag
Route::post('/profile/{username}', 'CommentsController@store')->name('comments.store');
//SUCHE
Route::get('/search', 'SearchController@search')->name('search');
//USER Einstellungen
Route::get('/user/{username}/edit', 'UsersController@edit')->name('user.edit');
Route::patch('/user/{username}', 'UsersController@destroy')->name('user.destroy');
//MESSENGER
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create/{user:username}', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
} );

//Admin Bereich
Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware' => 'is_admin'], function() {
    Route::resource('pages', \Admin\PageController::class);
    //Route::get('/pages', 'Admin\PageController@index')->name('pages.index');
    Route::get('/index', 'Admin\PageController@index')->name('admin.index');
});
//Nötig, sonst Fehler Route [verification.verify] not defined.
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');


