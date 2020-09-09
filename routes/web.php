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
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('/users', 'UsersController@index')->name('users.index');


Route::get('/profile/{user}', 'ProfileController@index')->name('profile.index')->middleware('verified');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');


Route::get('/providers', 'ProviderController@index')->name('providers.index');
Route::get('/provider/create', 'ProviderController@create')->name('provider.create');
Route::post('/provider/store', 'ProviderController@store')->name('provider.store');
Route::get('/provider/{provider}', 'ProviderController@show')->name('provider.show');
Route::get('/provider/{provider}/edit', 'ProviderController@edit')->name('provider.edit');
Route::patch('/provider/{provider}', 'ProviderController@update')->name('provider.update');
Route::get('/provider/{provider}/delete', 'ProviderController@delete')->name('provider.destroy');


Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/store', 'ProductController@store')->name('product.store');
Route::get('/product/{product}', 'ProductController@show')->name('product.show');


Route::get('/product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('/product/{product}', 'ProductController@update')->name('product.update');




Route::get('/product/{product}/delete', 'ProductController@delete')->name('product.destroy');

