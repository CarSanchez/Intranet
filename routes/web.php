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



Route::get('/register');


Route::group(['middleware' => ['web']], function () {
    // Routes login
    Route::get('/auth', 'LoginController@index')->name('auth.index');

    Route::post('/login', 'LoginController@login')->name('login.login');

    Route::post('/logout', 'LoginController@logout')->name('logout');
});


Route::group(['middleware' => 'auth'], function (){
    Route::get('/dashboard', function () {
        return view('user.app.layout');
    })->name('admin');
});
