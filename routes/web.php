<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/test', 'MyPlaceController@index');


Route::group(['namespace' => 'Post'], function() {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');
    Route::get('/posts/delete', 'DestroyController');
});



Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/post', 'IndexController')->name('admin.post.index');
    });
});

Route::group(['namespace' => 'Product', 'prefix' => 'admin', 'middleware' => 'auth:api'], function() {
    Route::get('/products', 'ProductController@index')->name('products.index');
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    Route::post('/products', 'ProductController@store')->name('products.store');
    Route::get('/products/{post}', 'ProductController@show')->name('products.show');
    Route::get('/products/{post}/edit', 'ProductController@edit')->name('products.edit');
    Route::patch('/products/{product}', 'ProductController@update')->name('products.update');
    Route::delete('/products/{post}', 'ProductController@destroy')->name('products.destroy');
    Route::get('/products/delete', 'ProductController@delete');
});



//Route::get('/posts', 'PostController@index')->name('post.index');
//Route::get('/posts/create', 'PostController@create')->name('post.create');
//Route::post('/posts', 'PostController@store')->name('post.store');
//Route::get('/posts/{post}', 'PostController@show')->name('post.show');
//Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
//Route::patch('/posts/{post}', 'PostController@update')->name('post.update');
//Route::delete('/posts/{post}', 'PostController@destroy')->name('post.destroy');
//Route::get('/posts/delete', 'PostController@delete');
//Route::get('/posts/restore', 'PostController@restore');
//Route::get('/posts/first_or_create', 'PostController@firstOrCreate');
//Route::get('/posts/update_or_create', 'PostController@updateOrCreate');

Route::get('/about', 'AboutController@index')->name('about.index');
Route::get('/articles', 'ArticleController@index')->name('article.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
