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

Route::get('/dashboard', function () {
    return view('administrador.app.layout');
})->name('admin');


// Routes login
Route::post('/login', 'LoginController@login')->name('login.login');
