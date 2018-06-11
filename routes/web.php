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

Route::group(['prefix' => 'admin'], function () {

    Route::post('/login', array('uses' => 'LoginController@store'))->name('users.post.login');

    Route::post('/dashboard', array('uses' => 'LoginController@showDash'))->name('dashboard');

    Route::get('/logout', array('uses' => 'LoginController@doLogout'))->name('logout');
    
    Route::post('/security', 'LoginController@verifyTwoFactor'); 
});

Route::get('/{vue?}', function () {
    return view('welcome');
})->where('vue', '[\/\w\.-]*');