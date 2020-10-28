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

Auth::routes();

Route::group(['namespace' => 'Website', 'middleware' => 'localize'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('language/{lang}', 'LocalizationController')->name('language.switch');

    Route::resource('product', 'ProductController');

    Route::get('cart', 'CartController@index')->name('cart.index');

    Route::post('cart/add/{product}', 'CartController@add')->name('cart.add');

    Route::patch('cart/destroy/{row}', 'CartController@destroy')->name('cart.destroy');

    Route::put('cart/update/{row}', 'CartController@update')->name('cart.update');

    Route::resource('checkout', 'CheckoutController')->middleware('auth');

});


