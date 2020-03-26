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

Route::post('/form/pdf', 'TrainingFormController@index');

Route::post('/send-notification', 'PostController@pushNotification');

Route::get('/aaaa', 'StudentFilterController@filterStudents');
Route::get('/bbbb', 'DashboardController@adminDashboard');

// About Controller
Route::get('/about/view/{pageURL?}', 'AboutController@showPage');
Route::get('/about/links', 'AboutController@linksPage');
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

//CompanyRegistrationForm
Route::post('/company_registration','CompanyRegistrationController@store');
//AddCompanyController
Route::get('/add_company','AddCompanyController@index');
//CompanyRegistrationController
Route::get('/company_name','CompanyRegistrationController@index');

//SearchController
Route::get('/display_student','SearchController@index');

//Alumni Controller
Route::post('/alumni','AlumniController@store');
Route::get('/alumni_posts','AlumniController@index');
Route::post('/show_alumni_post','AlumniController@show');

//AboutWidget Controller
Route::get('/home/page/view/about/widgets', 'AboutWidgetController@aboutWidgets');
//Protected routes
Route::group(['middleware' => 'jwt.auth'], function() {
    // Login Controller
    // Route::post('/security', 'LoginController@verifyTwoFactor'); 
    Route::get('/auth/user','LoginController@getAuthUser');
    // Register Controller
    Route::post('/register/password', 'RegisterController@setPassword');
    Route::post('/email_verify', 'RegisterController@email_verify');
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
        Route::post('/post/getpostid', 'PostController@getFirstID');
        Route::post('/post/notifyme', 'PostController@pushNotification');
        
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
        //MetricsEducation
        Route::resource('/student/me', 'MetricsEducationController');
        //Displayprofile
        Route::resource('/student/profile','ProfileViewController');
        //QueriesController
        Route::post('/queries','QueryController@store');
        //PreviousEducation
        Route::resource('/student/pe', 'PreviousEducationsController');
        //SemesterMarks
        Route::resource('/student/sem', 'SemesterMarksController');
        //Aggregate
        Route::resource('/student/aggregate', 'AggregateController');
        //Home Controller
        Route::resource('/homepage', 'HomePageController');
        //About Controller
        Route::resource('/about', 'AboutController');
        //About Widget Controller
        Route::resource('/widget/about', 'AboutWidgetController');
        //DevTeams Controller
        Route::resource('/dev/teams', 'DevTeamsController');

        //TODO Admin Controller 
        Route::post('todo','TodoController@store');
        Route::get('/todo','TodoController@index');
        Route::delete('/todo/{id}','TodoController@destroy');
        Route::post('/todo/status','TodoController@toggleStatus');
        // SearchController
        Route::get('/filter','FilterController@getUsers');
        Route::delete('/filter/{user}/delete', 'FilterController@deleteUser');
        //ExcelDataController
        Route::post('/data_excel','ExcelDataController@store');
        
        //Companies Controller
        Route::post('/add_company','AddCompanyController@store');
        Route::post('/company_count','AddCompanyController@count');
        Route::post('/company_list','AddCompanyController@download');
        Route::delete('/delete/{id}', 'AddCompanyController@destroy');

        Route::get('/show','CompanyRegistrationController@show');
        //FilterController
        Route::post('/filter_students','SearchController@downloadExcelFile');
    });
});

