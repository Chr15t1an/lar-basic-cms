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
/*
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
|
| Public Web Routes are all of the pages the public should have access to.
| These routes are not protected by middleware.
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

//Basic Terms and Conditions & Privacy Policy
Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});




/*
|--------------------------------------------------------------------------
| ~~~~~~ Blog Routes. ~~~~~~~
|--------------------------------------------------------------------------
*/


Route::get('/posts/{slug}', 'PostController@show');
Route::get('/posts', 'PostController@index');


/*
|--------------------------------------------------------------------------
| ~~~~~~ File Uploads. ~~~~~~~
|--------------------------------------------------------------------------
*/





/*
|--------------------------------------------------------------------------
| End Public Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| Admin Routes are all of the pages a signed in user should have access to.
| These routes should be protected by middleware.
|
*/

Route::get('/admin', function () {
    return view('admin.admin');
})->middleware('auth');

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

//Checks if registration is disabled
$registration = App\Http\Controllers\MetavalueController::get_metadata('registration');
if ($registration) {
//If registration is enabled allow all registration routes.
  Auth::routes();
  }else {
  Auth::routes(['register' => false]);
}


/*
|--------------------------------------------------------------------------
| ~~~~~~ Blog Post Routes. ~~~~~~~
|--------------------------------------------------------------------------
*/

Route::get('/admin/posts', function () {
    //Use onpage Vue Component to get data
    return view('admin.posts.view');
})->middleware('auth');

Route::get('/admin/posts/edit/{id}', function () {
    //Use onpage Vue Component to get data
    return view('admin.posts.edit');
})->middleware('auth');



Route::get('/admin/posts/create', function () {
    //Use onpage Vue Component to get data
    //If No ID the component will adjust
    return view('admin.posts.create');
})->middleware('auth');
