<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'ProductsController@barcodes');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/products/{product}/flash-sales', 'ProductsController@flashSales');
Route::get('/products/{product}/barcode', 'ProductsController@barcode');
Route::get('/barcodes', 'ProductsController@barcodes');
Route::resource('/products', 'ProductsController');
Route::resource('/competitor-prices', 'CompetitorPricesController');
