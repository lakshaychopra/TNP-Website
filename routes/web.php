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

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/{vue?}', function() {
    //         return view('welcome');
    //     })->where('vue', '[\/\w\.-]*');
    
    Route::group(['prefix' => 'auth'], function () {
        
        Route::post('/login', [
            'uses' => 'UsersController@store',
            'as'  => 'users.post.login',
            ]);
            
            Route::post('/dashboard', [
                'uses' => 'UsersController@showDash',
                'as'  => 'dashboard',
                ]);
                
                Route::get('logout', array('uses' => 'UsersController@doLogout'))->name('logout');
            });