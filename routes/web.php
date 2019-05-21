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
Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/register', 'UserController@registerIndex')->name('register.index');

    Route::post('/register', 'UserController@store')->name('register.store');
});

/**
 * Routes of login
*/
Route::group(['middleware' => ['web']], function () {
    Route::get('/auth', 'LoginController@index')->name('auth.index');

    Route::post('/login', 'LoginController@login')->name('login.login');

    Route::post('/logout', 'LoginController@logout')->name('logout');
});

/**
 * Routes dashboard
*/
Route::prefix('dashboard')->group(function() {
    Route::group(['middleware' => 'auth'], function (){
        /**
         * Routes of admin
         */
        Route::get('/admin', 'UserController@showAdmin')->name('admin');

        /**
         * Routes of the profile of user
        */
        Route::prefix('profile')->group(function() {
            /** Route index of profile **/
            Route::get('/', 'UserController@index')->name('profile.index');

            /** Routes for change the image **/
            Route::prefix('updateImage')->group(function () {
                Route::get('/', 'UserController@showIndexUpdateImage')->name('changeImage.show');
                Route::put('/', 'UserController@updateImage')->name('changeImage.update');
            });

            Route::prefix('updateImage')->group(function () {

            });
        });
    });
});
