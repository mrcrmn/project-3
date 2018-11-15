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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/checkout', 'HomeController@checkout')->middleware('auth')->name('checkout');
Route::post('/add-to-cart/{product}', 'ProductController@addToCart')->middleware('auth')->name('add-to-cart');
