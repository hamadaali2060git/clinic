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

## start auth
    Route::post('login', 'AuthController@login');
  	Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logOut');


    Route::get('user-data', 'AuthController@getUserData');

    Route::post('forget-password', 'AuthController@forgetPassword');
    Route::post('profile-update', 'AuthController@profileUpdate');

    Route::post('change_password', 'AuthController@changePassword');
    Route::post('forgetpassword', 'AuthController@forgetPassword');

    Route::get('settings', 'HomeController@settings');
## end

## start patient
    Route::get('home', 'HomeController@home');
    Route::get('categotries', 'HomeController@categotries');
    Route::get('articles', 'HomeController@articles');
    Route::get('patient-work-days', 'HomeController@patientWorkDays');
    Route::post('book-appointment', 'HomeController@bookAppointment');
    Route::get('patient-upcoming-ppointments', 'HomeController@patientUpcomingAppointments');
    Route::get('patient-previous-ppointments', 'HomeController@patientPreviousAppointments');

    Route::post('appointment-status', 'HomeController@updateStatus');
    Route::post('notification-status', 'HomeController@NotificationStatus');
    Route::post('add-review', 'HomeController@addReview');
    Route::post('edit-review', 'HomeController@editReview');
    Route::post('remove-review', 'HomeController@removeReview');

    Route::post('add-record', 'HomeController@addRecord');
    Route::get('patient-records', 'HomeController@patientRecords');


## end

## start doctor
    Route::post('add-work-days', 'HomeController@addWorkDays');

    Route::post('edit-work-days', 'HomeController@editWorkDays');
    Route::get('doctor-work-days', 'HomeController@doctorWorkDays');
    Route::get('doctor-upcoming-appointments', 'HomeController@doctorUpcomingAppointments');
    Route::get('doctor-previous-appointments', 'HomeController@doctorPreviousAppointments');
    Route::get('doctor-records', 'HomeController@doctorRecords');
    Route::get('patients', 'HomeController@patients');
    Route::post('add-diagnos', 'HomeController@addDiagnos');
    Route::post('edit-diagnos', 'HomeController@editDiagnos');


    Route::get('patient-profile', 'HomeController@patientProfile');
    Route::get('diagnosis', 'HomeController@diagnosis');

Route::get('reminders', 'HomeController@reminders');
Route::post('add-reminder', 'HomeController@addReminder');
Route::post('edit-reminder', 'HomeController@editReminder');
Route::post('remove-reminder', 'HomeController@removeReminder');



    // patient_actions


    // Route::get('doctor-details', 'HomeController@doctorDetails');

    // Route::get('instructors', 'HomeController@getInstructor');







});
