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

// Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user'], function () {

    Route::get('/login', array('uses' => 'UsersController@index'))->name('users.get.login');

    Route::post('/login', array('uses' => 'UsersController@store'))->name('users.post.login');

    Route::post('/dashboard', array('uses' => 'UsersController@showDash'))->name('dashboard');

    Route::get('logout', array('uses' => 'UsersController@doLogout'))->name('logout');
});

Route::post('2fa', 'TwoFactorController@verifyTwoFactor');

Route::get('/{vue?}', function () {
    return view('welcome');
})->where('vue', '[\/\w\.-]*');

