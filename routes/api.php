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

Route::get('/admin/contacts/{id}', 'ContactController@show')->middleware('auth');





Route::get('/email/archive/{id}','ContactController@archive');
Route::get('/email/read/{id}','ContactController@read');



Route::post('/meta/add','MetavalueController@add_metadata');
// Route::post('/meta/add','MetavalueController@add_metadata');

// Route::post('/meta/get','MetavalueController@get_metadata');
Route::post('/meta/get','MetavalueController@api_get_metadata');

Route::post('/meta/update','MetavalueController@api_update');




Route::post('/meta/delete','MetavalueController@destroy');




// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
