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
    Route::post('/login', array('uses' => 'LoginController@loginUser'))->name('users.post.login');
    
    // Route::group(['middleware' => 'web'], function() {
        
        Route::post('/dashboard', array('uses' => 'LoginController@showDash'))->name('dashboard');
    
        Route::post('/logout', array('uses' => 'LoginController@doLogout'))->name('logout');
        
        Route::post('/security', 'LoginController@verifyTwoFactor'); 
    
        Route::resource('/post', 'PostController');
     
        Route::resource('/user', 'UsersController');

        Route::post('/notify', array('uses' => 'PostController@PushNotification'))->name('pushNotify');
        Route::post('/markasread', array('uses' => 'PostController@MarkAsRead'))->name('markAsRead');
        Route::post('/markasunread', array('uses' => 'PostController@MarkAsUnRead'))->name('markAsUnRead');

    // });
});

Route::resource('/student', 'StudentsController');

// Route::get('/{vue?}', function () {
//     return view('welcome');
// })->where('vue', '[\/\w\.-]*');

Route::get('/{vue?}', function () {
    return view('home');
})->where('vue', '[\/\w\.-]*')->name('home');
