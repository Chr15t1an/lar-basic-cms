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
//Create contact message.
Route::post('/contact','ContactController@store');
// Read contact message.
Route::get('/admin/contacts/{id}', 'ContactController@show')->middleware('auth:api');
//Update contact message.
Route::get('/email/read/{id}','ContactController@read')->middleware('auth:api');
Route::get('/email/archive/{id}','ContactController@archive')->middleware('auth:api');
// Delete contact message.
Route::post('/email/archive/{id}/delete','ContactController@destroy')->middleware('auth:api');

// Create lead signup.
Route::post('/signup','SignupController@store');
//Read single in WEB...
//Read All Leads.
Route::get('/admin/leads','AdminController@showleads')->middleware('auth:api');

//No Route available to Update Leads.

//Delete a lead.
Route::post('/admin/leads/{id}/delete','SignupController@destroy')->middleware('auth:api');

//Create meta Values.
Route::post('/meta/add','MetavalueController@add_metadata')->middleware('auth:api');
//Get meta Values.
Route::post('/meta/get','MetavalueController@api_get_metadata');
//Update a meta value.
Route::post('/meta/update','MetavalueController@api_update')->middleware('auth:api');
//Delete a meta value.
Route::post('/meta/delete','MetavalueController@destroy')->middleware('auth:api');

//Generate a sitemap
Route::get('/admin/settings/seo/gen-sitemap', 'AdminController@makeSitemap')->middleware('auth:api');



//Create A Post
Route::post('/admin/posts/create', 'PostController@create');//->middleware('auth:api');

Route::get('/admin/posts/edit/{id}', 'PostController@edit');//->middleware('auth:api');
Route::post('/admin/posts/edit/{id}', 'PostController@update');//->middleware('auth:api');

Route::post('/admin/posts/delete/{id}', 'PostController@destroy');//->middleware('auth:api');
