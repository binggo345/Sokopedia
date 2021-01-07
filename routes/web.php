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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'ProductController@showList')->name('home');
    Route::get('/search', 'HomeController@itemSearch')->name('search');  
    Route::get('/detail/{id}', 'ProductController@show')->name('detail');
    Route::get('/addCart/{id}', 'CartController@show')->name('addCart');
    Route::post('/addCart/{id}', 'CartController@store');
    Route::get('/cart/{id}', 'CartController@showList')->name('cart');
    Route::delete('/cart/{id}', 'CartController@destroy');
    Route::post('/checkout', 'CartController@checkout')->name('checkout');
    Route::get('/transaction/{id}', 'TransactionController@showList')->name('transaction');
    Route::get('/transactiondetail/{id}', 'TransactionController@showDetail')->name('transactiondetail');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/addProduct', 'AdminController@addProduct');
        Route::post('/addProduct', 'AdminController@store');

        Route::get('/listProduct', 'AdminController@listProduct');
        Route::delete('/listProduct/{id}', 'AdminController@destroy');

        Route::get('/addCategory', 'AdminController@addCategory');
        Route::post('/addCategory', 'AdminController@storeCat');
        
        Route::get('/listCategory', 'AdminController@listCategory');
        Route::get('/listCategoryDet/{id}', 'AdminController@listCategoryDet');
    });
});
