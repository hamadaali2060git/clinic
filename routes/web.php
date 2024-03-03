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

Route::get('home', 'Admin\DashBoardController@index');
Route::get('/activation/users/{token}', 'Auth\LoginController@userActivation');
Route::get('/activated', 'Auth\LoginController@Activated')->name('activated');


  ## start reset password api
  Route::get('reset-password-api/{token}', 'Auth\LoginController@resetPasswordGetApi')->name('reset-password-api');
  Route::post('reset-password-api', 'Auth\LoginController@resetPasswordPostApi')->name('reset-password-post-api');
  ## end





  // Route::get('/', function () {
//         return view('index');
//     })->name('page');

Route::get('/front-home', function () {
  return view('front.index');
})->name('page');



Route::get('/doctor-dashboard', function () {
return view('front.doctor-dashboard');
});
Route::get('/front-appointments', function () {
    return view('front.appointments');
});
Route::get('/schedule-timings', function () {
return view('schedule-timings');
});
Route::get('/my-patients', function () {
return view('front.my-patients');
});
// Route::get('/patient-profile', function () {
// return view('front.patient-profile');
// });
Route::get('/chat-doctor', function () {
return view('chat-doctor');
})->name('chat-doctor');
Route::get('/invoices', function () {
return view('invoices');
});
Route::get('/doctor-profile-settings', function () {
return view('front.doctor-profile-settings');
});
// Route::get('/reviews', function () {
//     return view('reviews');
// });
Route::get('/doctor-register', function () {
return view('doctor-register');
})->name('doctor-register');
Route::get('/map-grid', function () {
return view('map-grid');
})->name('map-grid');
Route::get('/map-list', function () {
return view('map-list');
})->name('map-list');
Route::get('/search', function () {
return view('search');
})->name('search');
Route::get('/doctor-profile', function () {
return view('front.doctor-profile');
})->name('doctor-profile');
Route::get('/booking', function () {
return view('front.booking');
})->name('booking');
Route::get('/checkout', function () {
return view('front.checkout');
})->name('checkout');
Route::get('/booking-success', function () {
return view('booking-success');
})->name('booking-success');
Route::get('/patient-dashboard', function () {
return view('patient-dashboard');
})->name('patient-dashboard');
Route::get('/favourites', function () {
return view('favourites');
})->name('favourites');
Route::get('/change-password', function () {
return view('change-password');
})->name('change-password');
Route::get('/profile-settings', function () {
return view('profile-settings');
})->name('profile-settings');
Route::get('/chat', function () {
return view('chat');
})->name('chat');
Route::get('/voice-call', function () {
return view('voice-call');
})->name('voice-call');
Route::get('/video-call', function () {
return view('video-call');
})->name('video-call');
Route::get('/calendar', function () {
return view('calendar');
})->name('calendar');
// Route::get('/components', function () {
//     return view('components');
// })->name('components');
Route::get('/invoice-view', function () {
return view('invoice-view');
})->name('invoice-view');
Route::get('/blank-page', function () {
return view('blank-page');
})->name('blank-page');
Route::get('/loginn', function () {
return view('front.login');
})->name('loginn');
Route::get('/registerr', function () {
return view('front.register');
})->name('register');
Route::get('/forgot-password', function () {
return view('forgot-password');
})->name('forgot-password');
Route::get('/blog-list', function () {
return view('blog-list');
})->name('blog-list');
Route::get('/blog-grid', function () {
return view('blog-grid');
})->name('blog-grid');
Route::get('/blog-details', function () {
return view('blog-details');
})->name('blog-details');
Route::get('/add-billing', function () {
return view('add-billing');
});
Route::get('/add-prescription', function () {
return view('add-prescription');
});
Route::get('/edit-billing', function () {
return view('edit-billing');
});
Route::get('/edit-prescription', function () {
return view('edit-prescription');
});
Route::get('/privacy-policy', function () {
return view('privacy-policy');
})->name('privacy-policy');
Route::get('/social-media', function () {
return view('social-media');
})->name('social-media');
Route::get('/term-condition', function () {
return view('term-condition');
})->name('term-condition');
Route::get('/doctor-change-password', function () {
return view('doctor-change-password');
});
