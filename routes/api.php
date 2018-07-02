<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

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

// Route::get('/post', 'API\PostsCOntroller@index');
