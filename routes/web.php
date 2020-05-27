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

Route::prefix('category')->group(function(){
    Route::post('', 'CategoryController@Store');
    Route::delete('{category}', 'CategoryController@Destroy');
    Route::patch('{category}', 'CategoryController@Update');
});


