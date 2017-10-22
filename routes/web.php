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
Route::resource('products','Products\\ProductsController');
Route::resource('addusers','Addusers\\AddusersController');
Route::resource('datas','Datas\\DatasController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/product','Products\\ProductsController@index');
Route::get('/adduser','Addusers\\AddusersController@index');
Route::get('/data','Datas\\DatasController@index');

Route::get('/data', function () {
    return view('data');
});
Route::post('/act','ActsController@act');
Route::get('/home1', function () {
    return view('home1');
});

Route::get('/bestseller','Products\\ProductsController@bestseller');
Route::get('/out_of_stock','Products\\ProductsController@outofstock');
Route::get('/exp','Products\\ProductsController@exp');
Route::get('/balance','Products\\ProductsController@balance');

Route::get('pdf','PDFController@pdf');

Route::get('/search2','SearchController@search2');

Route::get('/alogin','Products\\ProductsController@alogin');
Route::get('/aregister','Products\\ProductsController@aregister');





