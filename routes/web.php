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

// Route::post('/login', array('uses' => 'LoginController@login'))->name('postLogin');
// Route::post('/logout', array('uses' => 'LoginController@logout'))->name('logout');
// Route::post('/check', 'LoginController@check');

// Route::group(['prefix' => 'dashboard'], function () {
//     Route::group(['middleware' => 'jwt.auth'], function() {
        
//         Route::post('/security', 'LoginController@verifyTwoFactor'); 
//         Route::resource('/post', 'PostController');
//         Route::resource('/user', 'UsersController');
//         Route::post('/notify', array('uses' => 'PostController@PushNotification'))->name('pushNotify');
//         Route::post('/markasread', array('uses' => 'PostController@MarkAsRead'))->name('markAsRead');
//         Route::post('/markasunread', array('uses' => 'PostController@MarkAsUnRead'))->name('markAsUnRead');
        
//         Route::get('/userexcelfile', array('uses'=>'UsersController@userExcelFile'))->name('userExcelFile');
//         Route::get('/usercreatemail', array('uses'=>'UsersController@userCreateMail'))->name('userCreateMail');

//     });
// });

// Route::resource('/student', 'StudentsController');

Route::get('/{vue?}', function () {
    return view('home');
})->where('vue', '[\/\w\.-]*')->name('home');
