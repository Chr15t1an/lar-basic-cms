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
    return view('documentation.pubhome');
});


Route::get('/installation', function () {
    return view('documentation.installation');
});

Route::get('/demo', function () {
    return view('documentation.demo');
});


Route::get('/components', function () {
    return view('documentation.components');
});



Route::get('/example-funnel', function () {
    return view('documentation.example-funnel');
});

Route::get('/pricing', function () {
    return view('demo-funnel.pricing');
});

Route::get('/signup', function () {
    return view('demo-funnel.signup');
});


Route::get('/example-value-prop', function () {
    return view('demo-funnel.example-value-prop');
});


//Basic Terms and Conditions & Privacy Policy
Route::get('/terms-and-conditions', function () {
    return view('demo-funnel.terms-and-conditions');
});

Route::get('/privacy-policy', function () {
    return view('demo-funnel.privacy-policy');
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
| End Public Web Routes
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| ~~~~~~ File Uploads. ~~~~~~~
|--------------------------------------------------------------------------
*/


Route::get('/admin/files/{slug}', 'FileController@show')->middleware('auth');
Route::get('/admin/files', 'FileController@index')->middleware('auth');


Route::post('/admin/files', 'FileController@store')->middleware('auth');




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

// Route::get('/admin/apiKeys', function () {
//     return view('admin.apiKeys');
// })->middleware('auth');

Route::get('/admin/settings', function () {
    return view('admin.settings');
})->middleware('auth');

// Route::get('/admin/settings/seo', function () {
//     return view('admin.seo');
// })->middleware('auth');

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
| ~~~~~~ Categories Routes. ~~~~~~~
|--------------------------------------------------------------------------
*/

Route::get('/admin/categories', function () {
    //Use onpage Vue Component to get data
    return view('admin.settings.categories');
})->middleware('auth');

Route::get('/admin/tags', function () {
    //Use onpage Vue Component to get data
    return view('admin.settings.tags');
})->middleware('auth');



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


Route::get('/admin/posts/export', 'PostController@exportposts')->middleware('auth');

Route::get('/admin/posts/create', function () {
    //Use onpage Vue Component to get data
    //If No ID the component will adjust
    return view('admin.posts.create');
})->middleware('auth');
