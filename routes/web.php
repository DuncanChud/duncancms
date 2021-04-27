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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



// check for logged in user
Route::middleware(['auth'])->group(function () {




    //  GET so just show the form
    Route::get('create-post', 'App\Http\Controllers\BlogPostController@create');
    
    //  POST so STORE the data to the DB
    Route::post('create-post', 'App\Http\Controllers\BlogPostController@store');
    // edit post form

    // edit an existing page
    Route::get('edit/{slug}', 'App\Http\Controllers\BlogPostController@edit');

    // update post
    Route::post('update', 'App\Http\Controllers\BlogPostController@update');
    // delete post
    Route::get('delete/{id}', 'App\Http\Controllers\BlogPostController@destroy');
    
  });


Route::get('/home', 'App\Http\Controllers\BlogPostController@lastfive');
// Route::get('/make', 'App\Http\Controllers\BlogPostsController@makeABlogPost');
// Route::post('/new-blogpost', 'App\Http\Controllers\BlogPostsController@store');
Route::get('/{slug}', 'App\Http\Controllers\BlogPostController@show');

// Route::get('/{slug}', ['as' => 'post', 'uses' => 'App\Http\Controllers\BlogPostController\PostController@show'])->where('slug', '[A-Za-z0-9-_]+');

