<?php

use Illuminate\Support\Facades\Route;

####  admin #######################
// Auth::routes();
 Route::get('admin-login', 'Auth\LoginController@LoginAdmin')->name('admin-login');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function () {

    Route::get('server-side','ArticleController@serverSide');


   Route::resource('roles','RoleController');
   Route::resource('users','UserController');
   Route::resource('categories','CategoryController');
   Route::resource('dashboard','DashBoardController');
   Route::resource('countries','CountryController');
   Route::resource('cities','CityController');
   Route::resource('doctors','DoctorController');
   Route::resource('appointments','AppointmentController');
Route::post('appointments/update/status', 'AppointmentController@updateStatus')->name('appointments.update.status');
   Route::resource('articles','ArticleController');
   Route::resource('sliders','SliderController');
   Route::resource('schedules','WorkDayController');
   Route::get('previous-appointments','AppointmentController@previous')->name('previous-appointments');
   Route::resource('patients','PatientController');
   Route::get('patient-profile/{id}','PatientController@profile');

   Route::get('patients/update/status', 'PatientController@updateStatus')->name('patients.update.status');



   Route::get('settings','SettingController@settings');
   Route::post('profile/update','SettingController@updateProfile')->name('profile/update');
   Route::post('settings/update','SettingController@updateSettings');
Route::post('settings/price/update','SettingController@updateSettingPrice');

    // Route::get('about', 'ProfileController@about');
    // Route::get('contact', 'ProfileController@contact');
    // Route::get('contact', 'ProfileController@contact');
    // Route::post('settings/contactdata','ProfileController@updateContactData');
    // Route::get('profile', 'SettingController@index');
    Route::post('user/changepassword', 'ProfileController@changePassword')->name('user.changepassword');
    //      Route::post('user/changepassword', 'ProfileController@instructorChangePassword')->name('instructor.changepassword');

});
