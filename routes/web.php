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

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('terms-&-conditions', function () {
    return view('terms-&-conditions');
});

Route::get('/signup', function () {
    return view('signup');
});
//Dont want public routes.
// Route::resources([
//     'contact' => 'ContactController'
// ]);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
