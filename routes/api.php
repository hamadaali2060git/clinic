<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => ['api','changeLanguage'], 'namespace' => 'Api'], function () {
    Route::get('/admin', function () {
        return 'bbbbffff';
    });
   
    Route::post('login', 'AuthController@login');
  	Route::post('register', 'AuthController@register');
    Route::get('user-data', 'AuthController@getUserData');
    
    Route::post('forget-password', 'AuthController@forgetPassword');
    Route::post('profile-update', 'AuthController@profileUpdate');
   
    Route::get('allcourses-lives', 'AuthController@allcoursesLive');
    Route::post('change_password', 'AuthController@changePassword');
    Route::post('forgetpassword', 'AuthController@forgetPassword');


    Route::get('categotries', 'HomeController@categotries');
    // Route::get('doctor-details', 'HomeController@doctorDetails');
    Route::get('articles', 'HomeController@articles');
    
    Route::post('add-work-days', 'HomeController@addWorkDays');
    Route::post('edit-work-days', 'HomeController@editWorkDays');
    Route::get('doctor-work-days', 'HomeController@doctorWorkDays');
    Route::get('doctor-appointments', 'HomeController@doctorAppointments');
    Route::get('doctor-records', 'HomeController@doctorRecords');

    Route::get('patient-profile', 'HomeController@patientProfile');
    Route::get('patient-records', 'HomeController@patientRecords');

    // patient_actions

    Route::post('book-appointment', 'HomeController@bookAppointment');
    Route::get('patient-ppointments', 'HomeController@patientAppointments');
    
    Route::get('patient-work-days', 'HomeController@patientWorkDays');

    
    
    Route::get('course-detais', 'HomeController@coursesDetais');
    Route::get('courses-user', 'HomeController@coursesUser');
    Route::get('notices', 'HomeController@notices');
    Route::post('inquiries', 'HomeController@inquiries');

    Route::get('home', 'HomeController@home');
    Route::get('instructors', 'HomeController@getInstructor');
    Route::get('settings', 'HomeController@settings');
    

    Route::get('favorites', 'HomeController@favorites');
    Route::get('vendor-products', 'HomeController@vendorProducts');
    
    Route::get('settings', 'HomeController@settings');
    Route::post('add-product', 'HomeController@addProduct');
    Route::post('add-favorite', 'HomeController@addFavorite');
    Route::post('delete-favorite', 'HomeController@deleteFavorite');

});
