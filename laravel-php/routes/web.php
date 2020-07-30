<?php

use App\Http\Controllers\DictionaryController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('homepage');
});


Route::group(['prefix' => 'Product'],function(){
    Route::get('/index', 'ProductController@index')->name('product.index');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::post('/store', 'ProductController@store')->name('product.store');
    Route::get('/show/{id}', 'ProductController@show')->name('product.show');
});

Route::group(['prefix' => 'carts'], function () {
    Route::get('/index', 'CartController@index')->name('carts.index');
    Route::get('/cart/{id}', 'CartController@cart')->name('carts.cart');
    Route::get('/deleteCart/{id}', 'CartController@deleteCart')->name('carts.deleteCart');
    Route::get('/edit/{id}/{qty}', 'CartController@edit')->name('carts.edit');
});
