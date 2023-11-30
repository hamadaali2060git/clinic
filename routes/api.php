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
Route::group(['middleware' => ['api'], 'namespace' => 'Api'], function () {
    Route::get('/admin', function () {
        return 'bbbb';
    });
    // Route::post('verify-code', [AuthLoginController::class, 'verifyCode'])->name('verify-code');
    Route::post('login', 'AuthLoginController@LoginUser')->name('login-user');

    Route::post('register', 'AuthLoginController@registerNewUser')->name('user-signup');
    Route::post('verify-register-code', 'AuthLoginController@verifyRegisterCode')->name('verify-register-code');
    
    Route::get('user-data', 'AuthLoginController@getUserData');
    Route::post('profile-update', 'AuthLoginController@ProfileUpdate');

    Route::post('forget-password', 'AuthLoginController@forgetPassword');
    Route::post('verify-password-code', 'AuthLoginController@verifyPassword');
    Route::post('reset-user-password-post', 'AuthLoginController@resetUserPasswordPost');

    Route::get('cities', 'HomeController@cities');
    Route::get('states', 'HomeController@states');
    Route::get('categotries', 'HomeController@categotries');
    Route::get('products', 'HomeController@products');
    Route::get('product-detais', 'HomeController@productDetais');
    Route::get('products-search', 'HomeController@productsSearch');
    Route::get('products-features', 'HomeController@features');
    Route::get('favorites', 'HomeController@favorites');
    Route::get('vendor-products', 'HomeController@vendorProducts');
    
    Route::get('settings', 'HomeController@settings');
    Route::post('add-product', 'HomeController@addProduct');
    Route::post('add-favorite', 'HomeController@addFavorite');
    Route::post('delete-favorite', 'HomeController@deleteFavorite');

});
