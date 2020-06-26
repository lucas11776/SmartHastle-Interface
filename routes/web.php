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
        Route::prefix('role')->group(function() {
            Route::get('{role}', 'UserController@ByRole')
                ->where('status', '(' . implode('|', Order::STATUS) . ')');
        });
        Route::prefix('{user}')->group(function () {
            Route::get('', 'UserController@View');
            Route::get('cart', 'UserController@Cart');
            Route::prefix('orders')->group(function () {
                Route::get('', 'UserController@Orders');
                Route::get('{order}', 'UserController@SingleOrder');
            });
            Route::get('favorites', 'UserController@Favorites');
        });
    });
    Route::prefix('orders')->group(function () {
        Route::get('', 'OrderController@Index');
        Route::get('status/{status}', 'OrderController@Status')
            ->where('status', '(' . implode('|', Order::STATUS) . ')');
        Route::get('{order}', 'OrderController@View');
    });
    Route::prefix('search')->group(function () {
        Route::get('', 'SearchController@Index');
    });
});
Route::prefix('my')->middleware(['auth'])->group(function () {
    Route::prefix('orders')->group(function () {
        Route::get('', 'OrderController@Index');
        Route::get('{order}', 'OrderController@Single');
    });
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
Route::prefix('favorite')->middleware(['auth'])->group(function () {
    Route::post('', 'FavoriteController@Create');
    Route::prefix('{favorite}')->group(function() {
        Route::delete('', 'FavoriteController@Destroy');
        Route::prefix('to')->group(function() {
            Route::delete('cart', 'FavoriteController@ToCart');
        });
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
    Route::post('', 'OrderController@Store')->middleware('auth.cartNotEmpty');
    Route::prefix('{order}')->group(function () {
        Route::patch('', 'OrderController@Update');
        Route::delete('', 'OrderController@Destroy')->middleware(['auth.staff']);
        Route::prefix('item')->group(function () {
            Route::prefix('{orderItem}')->group(function () {
                Route::patch('', 'OrderItemController@Update');
            });
        });
    });
});
Route::prefix('checkout')->middleware(['auth'])->group(function () {
    Route::get('', 'CheckoutController@Index')->middleware('auth.cartNotEmpty');
});
Route::prefix('search')->group(function () {
    Route::get('', 'SearchController@Index');
});
Route::get('{slug}', 'HomeController@Product');
