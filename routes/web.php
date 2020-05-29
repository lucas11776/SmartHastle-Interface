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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::prefix('category')->group(function () {
    Route::post('', 'CategoryController@Store');
    Route::delete('{category}', 'CategoryController@Destroy');
    Route::patch('{category}', 'CategoryController@Update');
});

Route::prefix('product')->group(function () {
    Route::post('', 'ProductController@Store');
    Route::patch('{product}', 'ProductController@Update');
    Route::delete('{product}', 'ProductController@Destroy');
});

Route::prefix('dashboard')->namespace('dashboard')->group(function () {
    Route::get('', 'HomeController@Index');
    Route::prefix('products')->group(function() {
        Route::get('', 'ProductController@Index');
        Route::get('upload', 'ProductController@Create');
    });
    Route::prefix('categories')->group(function () {
        Route::get('', 'CategoryController@Index');
        Route::get('create', 'CategoryController@Create');
    });
    Route::prefix('users')->group(function () {
        Route::get('', 'UserController@Index');
    });
});


