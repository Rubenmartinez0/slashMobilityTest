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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/profile/{user}', 'ProfileController@index')->name('profile.show')->middleware('verified');

Route::get('/product/index', 'ProductController@index')->name('productsList.show');
Route::get('/product/{product}', 'ProductController@product_view')->name('product.show');

Route::get('/provider/index', 'ProviderController@index')->name('providersList.show');
Route::get('/provider/{provider}', 'ProviderController@provider_view')->name('provider.show');
