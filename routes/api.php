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

Route::get('/aaaa', 'StudentFilterController@filterStudents');
Route::get('/bbbb', 'DashboardController@adminDashboard');

// Login Controller
Route::post('/login', 'LoginController@login');
Route::post('/check', 'LoginController@check');
Route::post('/logout', 'LoginController@logout');
Route::post('/verify', 'LoginController@verify');
Route::post('/reset/password', 'LoginController@resetPassword');
// Register Controller
Route::post('/register', 'RegisterController@register');
//Home Controller
Route::resource('/home', 'HomeController');
Route::get('/home/view/{postID?}', 'HomeController@showPost');
Route::get('/home/post/search/{term?}', 'HomeController@HomePostSearch');
Route::get('/home/post/view/{category?}', 'HomeController@HomeCategoryView');
Route::get('/home/page/view/pinned', 'HomeController@viewPinned');
Route::get('/home/page/view/widgets', 'HomeController@viewWidgets');
//Protected routes
Route::group(['middleware' => 'jwt.auth'], function() {
    // Login Controller
    Route::post('/security', 'LoginController@verifyTwoFactor'); 
    Route::get('/auth/user','LoginController@getAuthUser');
    // Register Controller
    Route::post('/register/password', 'RegisterController@setPassword');
    //Dashboard
    Route::group(['prefix' => 'dashboard'], function () {
        // Post Controller
        Route::resource('/post', 'PostController');
        Route::post('/post/notify', 'PostController@PushNotification');
        Route::post('/post/markasread', 'PostController@MarkAsRead');
        Route::post('/post/markasunread', 'PostController@MarkAsUnRead');
        Route::get('/post/search/{term?}', 'PostController@PostSearch');
        Route::put('/post/pinned/{post?}', 'PostController@pinned');
        Route::put('/post/unpinned/{post?}', 'PostController@unpinned');
        Route::get('/post/view/pinned', 'PostController@viewPinned');
        
        // Users Controller
        Route::resource('/user', 'UsersController');
        Route::get('/user/excelfile', 'UsersController@userExcelFile');
        Route::post('/user/createmail', 'UsersController@userCreateMail');
        Route::post('/user/form/create', 'UsersController@UserCreateForm');
        Route::post('/user/status/update', 'UsersController@UpdateFormStatus');
        Route::post('/user/step/update', 'UsersController@UpdateFormSteps');
        Route::post('/user/first/login', 'UsersController@FirstLogin');
        //Student Controller
        Route::resource('/student', 'StudentsController');
        //PreviousEducation
        Route::resource('/student/pe', 'PreviousEducationsController');
        //Home Controller
        Route::resource('/homepage', 'HomePageController');
    });
});