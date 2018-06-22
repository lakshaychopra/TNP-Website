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

Route::post('/admin/login', array('uses' => 'LoginController@loginUser'))->name('users.post.login');

Route::group(['prefix' => 'admin','middleware' => 'api'], function () {

    Route::post('/dashboard', array('uses' => 'LoginController@showDash'))->name('dashboard');

    Route::post('/logout', array('uses' => 'LoginController@doLogout'))->name('logout');
    
    Route::post('/security', 'LoginController@verifyTwoFactor'); 

    Route::resource('/post', 'PostController');
 
    Route::resource('/user', 'UsersController');
});



Route::get('/{vue?}', function () {
    return view('welcome');
})->where('vue', '[\/\w\.-]*');