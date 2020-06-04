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

Route::get('/', 'HomeController@Index');
Route::get('products', 'HomeController@Products');
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
Route::prefix('dashboard')->namespace('dashboard')->middleware(['auth'])->group(function () {
    Route::get('', 'HomeController@Index');
    Route::prefix('products')->group(function() {
        Route::get('', 'ProductController@Index');
        Route::get('upload', 'ProductController@Create');
        Route::get('{product}', 'ProductController@Edit');
    });
    Route::prefix('categories')->group(function () {
        Route::get('', 'CategoryController@Index');
        Route::get('create', 'CategoryController@Create');
    });
    Route::prefix('users')->group(function () {
        Route::get('', 'UserController@Index');
    });
});
Route::prefix('my')->middleware(['auth'])->group(function () {
    Route::get('orders', 'UserController@Orders');
    Route::get('favorites', 'UserController@Favorites');
    Route::prefix('account')->group(function () {
        Route::get('', 'UserController@Index');
        Route::get('change/password', 'UserController@ChangePassword');
    });
});
Route::prefix('user')->middleware(['auth'])->group(function() {
    Route::patch('', 'UserController@Update');
    Route::post('picture', 'UserController@UploadProfilePicture');
});
Route::prefix('cart')->middleware(['auth'])->group(function () {
    Route::get('', 'CartController@Index');
    Route::post('', 'CartController@Store');
    Route::post('clear', 'CartController@Clear');
    Route::patch('', 'CartController@Update');
    Route::delete('', 'CartController@Destroy');
});
Route::prefix('checkout')->middleware(['auth'])->group(function () {
    Route::get('', 'CheckoutController@Index');
});
Route::get('{slug}', 'HomeController@Product');
