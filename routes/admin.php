<?php

use Illuminate\Support\Facades\Route;

####  admin #######################
// Auth::routes();
 Route::get('admin-login', 'Auth\LoginController@LoginAdmin')->name('admin-login');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin','prefix' => 'admin'], function () {        
   Route::resource('roles','RoleController');
   Route::resource('users','UserController');
   Route::resource('categories','CategoryController');     
   Route::resource('products','ProductController');
   Route::resource('dashboard','DashBoardController');
   Route::resource('countries','CountryController');
   Route::resource('cities','CityController');
   Route::resource('states','StateController');
   
   Route::get('settings','SettingController@settings');
   Route::post('settings/update','SettingController@updateSettings');

    // Route::get('about', 'ProfileController@about'); 
    // Route::get('contact', 'ProfileController@contact');
    Route::get('contact', 'ProfileController@contact');
    Route::post('settings/contactdata','ProfileController@updateContactData');
    Route::get('profile', 'SettingController@index');
    Route::post('profile/update','SettingController@updateProfile');
    Route::post('user/changepassword', 'ProfileController@changePassword')->name('user.changepassword');
    //      Route::post('user/changepassword', 'ProfileController@instructorChangePassword')->name('instructor.changepassword');    
   
}); 