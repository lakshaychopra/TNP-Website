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

// Login Controller
Route::post('/login', 'LoginController@login');
Route::post('/check', 'LoginController@check');
Route::post('/logout', 'LoginController@logout');

Route::group(['prefix' => 'dashboard'], function () {
    Route::group(['middleware' => 'jwt.auth'], function() {
        // Login Controller
        Route::post('/security', 'LoginController@verifyTwoFactor'); 
        Route::get('/auth/user','LoginController@getAuthUser');
        // Post Controller
        Route::resource('/post', 'PostController');
        Route::post('/notify', 'PostController@PushNotification');
        Route::post('/markasread', 'PostController@MarkAsRead');
        Route::post('/markasunread', 'PostController@MarkAsUnRead');
        // Users Controller
        Route::resource('/user', 'UsersController');
        Route::get('/userexcelfile', 'UsersController@userExcelFile');
        Route::get('/usercreatemail', 'UsersController@userCreateMail');
        //Student Controller
        Route::resource('/student', 'StudentsController');
    });
});