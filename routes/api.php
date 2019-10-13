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
//Create
Route::post('/contact','ContactController@store');
// Read
Route::get('/admin/contacts/{id}', 'ContactController@show')->middleware('auth:api');
//Update
Route::get('/email/read/{id}','ContactController@read')->middleware('auth:api');
Route::get('/email/archive/{id}','ContactController@archive')->middleware('auth:api');
// Delete
Route::post('/email/archive/{id}/delete','ContactController@destroy')->middleware('auth:api');

// Create
Route::post('/signup','SignupController@store');
//Read in WEB
Route::get('/admin/leads','AdminController@showleads')->middleware('auth:api');

//No Update
//Delete
Route::post('/admin/leads/{id}/delete','SignupController@destroy')->middleware('auth:api');

Route::post('/meta/add','MetavalueController@add_metadata')->middleware('auth:api');
Route::post('/meta/get','MetavalueController@api_get_metadata');
Route::post('/meta/update','MetavalueController@api_update')->middleware('auth:api');
Route::post('/meta/delete','MetavalueController@destroy')->middleware('auth:api');


Route::get('/admin/settings/seo/gen-sitemap', 'AdminController@makeSitemap');//->middleware('auth:api');
