<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Admin\DashBoardController@index');

Route::get('home', 'Admin/DashBoardController@index');
Route::get('/activation/users/{token}', 'Auth\InstructorLoginController@userActivation');


  ## start reset password api
  Route::get('reset-password-api/{token}', 'Auth\InstructorLoginController@resetPasswordGetApi')->name('reset-password-api');
  Route::post('reset-password-api', 'Auth\InstructorLoginController@resetPasswordPostApi')->name('reset-password-post-api');
  ## end 