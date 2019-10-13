<?php

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

Route::get('/', function () {
    return view('pubhome');
});

Route::get('/pricing', function () {
    return view('pricing');
});


Route::get('/signup', function () {
    return view('signup');
});

/// Do not edit below
/// Or do if you want

//Basic Terms and Conditions & Privacy Policy
Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/admin', 'AdminController@index')->middleware('auth');

Route::get('/admin/leads', function () {
    return view('admin.leads');
})->middleware('auth');

Route::get('/admin/leads/export', 'SignupController@exportleads')->middleware('auth');
Route::get('/admin/contacts', 'AdminController@showcontacts')->middleware('auth');
Route::get('/admin/contacts/{id}', 'AdminController@showemail')->middleware('auth');

Route::get('/admin/apiKeys', function () {
    return view('admin.apiKeys');
})->middleware('auth');

Route::get('/admin/settings', function () {
    return view('admin.settings');
})->middleware('auth');

Route::get('/admin/settings/seo', function () {
    return view('admin.seo');
})->middleware('auth');


$registration = App\Http\Controllers\MetavalueController::get_metadata('registration');
if ($registration) {
  Auth::routes();
  }else {
  Auth::routes(['register' => false]);
}
