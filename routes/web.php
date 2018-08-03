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

Route::get('/', 'ShopController@nearby')->name('home');
Route::get('/shops', 'ShopController@nearby');
Route::get('/preferred', 'ShopController@preferred');
Route::post('/like/{shopId}', 'ShopController@likeShop');
Route::post('/dislike/{shopId}', 'ShopController@dislikeShop');

Auth::routes();

