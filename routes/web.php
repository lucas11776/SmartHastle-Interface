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

use App\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@Index');
Route::get('products', 'HomeController@Products');
Auth::routes();
Route::prefix('category')->middleware(['auth', 'auth.administrator'])->group(function () {
    Route::post('', 'CategoryController@Store');
    Route::delete('{category}', 'CategoryController@Destroy');
    Route::patch('{category}', 'CategoryController@Update');
});
Route::prefix('product')->middleware(['auth', 'auth.administrator'])->group(function () {
    Route::post('', 'ProductController@Store');
    Route::patch('{product}', 'ProductController@Update');
    Route::delete('{product}', 'ProductController@Destroy');
});
Route::prefix('dashboard')->namespace('dashboard')->middleware(['auth', 'auth.staff'])->group(function () {
    Route::get('', 'HomeController@Index');
    Route::prefix('products')->group(function() {
        Route::get('', 'ProductController@Index');
        Route::get('upload', 'ProductController@Create')->middleware(['auth.administrator']);
        Route::get('{product}', 'ProductController@Edit')->middleware(['auth.administrator']);
    });
    Route::prefix('categories')->group(function () {
        Route::get('', 'CategoryController@Index');
        Route::get('create', 'CategoryController@Create')->middleware(['auth.administrator']);
    });
    Route::prefix('users')->group(function () {
        Route::get('', 'UserController@Index');
        Route::prefix('{user}')->group(function () {
            Route::get('', 'UserController@View');
            Route::get('orders', 'UserController@order');
        });
    });
    Route::prefix('orders')->group(function () {
        Route::get('', 'OrderController@Index');
        Route::get('status/{status}', 'OrderController@Status')
            ->where('status', '(' . implode('|', Order::STATUS) . ')');
        Route::get('{order}', 'OrderController@View');
    });
});
Route::prefix('my')->middleware(['auth'])->group(function () {
    Route::get('orders', 'OrderController@Index');
    Route::get('favorites', 'UserController@Favorites');
    Route::prefix('account')->group(function () {
        Route::get('', 'UserController@Index');
        Route::get('change/password', 'UserController@ChangePassword');
    });
});
Route::prefix('user')->middleware(['auth'])->group(function() {
    Route::patch('', 'UserController@Update');
    Route::post('picture', 'UserController@UploadProfilePicture');
    Route::prefix('{user}/role')->group(function () {
        Route::post('', 'UserController@AddRole');
        Route::delete('', 'UserController@RemoveRole');
    });
});
Route::prefix('cart')->middleware(['auth'])->group(function () {
    Route::get('', 'CartController@Index');
    Route::post('', 'CartController@Store');
    Route::patch('', 'CartController@Update');
    Route::delete('', 'CartController@Destroy');
    Route::post('clear', 'CartController@Clear');
});
Route::prefix('order')->middleware(['auth'])->group(function () {
    Route::post('', 'OrderController@Store');
    Route::patch('{order}', 'OrderController@Update');
    Route::delete('{order}', 'OrderController@Destroy')->middleware(['auth.staff']);
});
Route::prefix('checkout')->middleware(['auth'])->group(function () {
    Route::get('', 'CheckoutController@Index');
});
Route::get('{slug}', 'HomeController@Product');
