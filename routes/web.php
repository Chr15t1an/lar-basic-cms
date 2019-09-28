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
Route::get('terms-&-conditions', function () {
    return view('terms-&-conditions');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});



//Dont want public routes.
// Route::resources([
//     'contact' => 'ContactController'
// ]);


Route::get('/admin', 'AdminController@index');

Route::get('/admin/leads', 'AdminController@showleads');
Route::get('/admin/leads/export', 'SignupController@exportleads');


Route::get('/admin/contacts', 'AdminController@showcontacts');
Route::get('/admin/contacts/{id}', 'AdminController@showemail');


// Route::get('/admin/settings', 'AdminController@settings');
Route::get('/admin/settings', function () {
    return view('admin.settings');
});

Route::get('/admin/settings/seo', function () {
    return view('admin.seo');
});


Route::get('/admin/settings/seo/gen-sitemap', 'AdminController@makeSitemap');

// Route::post('/meta/get','MetavalueController@get_metadata');


// Auth::routes();
Auth::routes([
  // 'register' => false, // Registration Routes...
  // 'reset' => false, // Password Reset Routes...
  // 'verify' => false, // Email Verification Routes...
]);
