<?php

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

Route::get('/', function () {
    return view('principal.index');
})->name('index');


/**
 * Routes of register
*/
Route::get('/register', 'RegisterController@index')->name('register.index');

Route::post('/register', 'RegisterController@store')->name('register.store');


/**
 * Routes of login
*/
Route::group(['middleware' => ['web']], function () {
    Route::get('/auth', 'LoginController@index')->name('auth.index');

    Route::post('/login', 'LoginController@login')->name('login.login');

    Route::post('/logout', 'LoginController@logout')->name('logout');
});


Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', function () {
        return view('consumers.app.layout');
    })->name('admin');
});
