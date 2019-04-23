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


// Routes login_and_register
Route::get('/auth', 'LoginController@index')->name('auth.index');

Route::post('/login', 'LoginController@login')->name('login.login');

Route::get('/dashboard', function () {
    return view('admin.app.layout');
})->name('admin');
