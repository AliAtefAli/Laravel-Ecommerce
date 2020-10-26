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


Route::group(['namespace' => 'Website', 'middleware' => 'localize'], function () {
    Route::get('language/{lang}', 'LocalizationController')->name('language.switch');
});

Auth::routes();

// Dashboard
Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Dashboard', 'prefix' => 'dashboard', 'middleware' => ['auth', 'localize', 'admin']], function () {

    Route::get('/', 'HomeController@index')->name('dashboard.home');

    Route::resource('category', 'CategoryController');

    Route::resource('products', 'ProductController');

    Route::resource('coupon', 'CouponController');

    Route::resource('order', 'OrderController');

    Route::get('setting', 'SettingController@show')->name('setting.show');

    Route::put('setting', 'SettingController@update')->name('setting.update');

    Route::get('trash', 'TrashController@index')->name('trash.index');
    Route::get('trash/{id}/restore/{type}', 'TrashController@restore')->name('trash.restore');
    Route::get('trash/{id}/destroy/{type}', 'TrashController@destroy')->name('trash.destroy');
});

// Website
Route::group(['namespace' => 'Website', 'middleware' => ['auth', 'localize']], function () {
    Route::resource('checkout', 'CheckoutController');
});
Route::group(['namespace' => 'Website', 'middleware' => 'localize'], function () {


    Route::resource('product', 'ProductController');

    Route::get('cart', 'CartController@index')->name('cart.index');

    Route::get('cart/add/{product}', 'CartController@add')->name('cart.add');

    Route::get('cart/destroy/{row}', 'CartController@destroy')->name('cart.destroy');

});

