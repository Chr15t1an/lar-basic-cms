<?php

use Illuminate\Http\Request;

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

Route::post('/contact','ContactController@store');

Route::post('/signup','SignupController@store');

Route::get('/admin/contacts/{id}', 'ContactController@show');

Route::post('/email/archive/{id}','ContactController@archive');
Route::post('/email/read/{id}','ContactController@read');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
