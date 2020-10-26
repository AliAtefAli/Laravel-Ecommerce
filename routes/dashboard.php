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


