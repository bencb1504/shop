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

Route::get('/','HomeController@index')->name('web.index');
Route::get('/load_more_list_cast','HomeController@loadMoreListCast');
Route::post('/products','ProductController@index')->name('list_products');
Route::get('product/{id}', 'ProductController@detail')->where('id', '[0-9]+')->name('product_detail');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', 'LoginController@logOut')->name('logout');
    Route::get('/carts', 'CartController@index')->name('cart');
    Route::get('/buy', 'CartController@buy')->name('buy');
});



Route::group(['prefix' => 'login'], function() {
    Route::get('/','LoginController@index')->name('login.index');
    Route::post('/','LoginController@login')->name('login');
});

Route::group(['namespace' => 'Web'], function () {
});