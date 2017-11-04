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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('layouts.app');
});


Auth::routes();
Route::get('/home1', function () {
    return view('home1');
});

Route::get('/testfilter', function () {
    return view('testfilter');
});


Route::group(['middleware' => ['auth']], function () {

Route::resource('products','Products\\ProductsController');
Route::resource('addusers','Addusers\\AddusersController');
Route::resource('datas','Datas\\DatasController');
Route::get('/home', 'HomeController@index');
Route::get('/product','Products\\ProductsController@index');
Route::get('/adduser','Addusers\\AddusersController@index');
Route::get('/data','Datas\\DatasController@index');

Route::get('/data', function () {
    return view('data');
});
Route::post('/act','ActsController@act');
Route::get('/bestseller','Products\\ProductsController@bestseller');
Route::get('/out_of_stock','Products\\ProductsController@outofstock');
Route::get('/exp','Products\\ProductsController@exp');
Route::get('/balance','Products\\ProductsController@balance');

Route::get('pdf','PDFController@pdf');

Route::get('/search2','SearchController@search2');

Route::get('/vegetable','Products\\ProductsController@vegetable');
Route::get('/fruit','Products\\ProductsController@fruit');
Route::get('/plant','Products\\ProductsController@plant');
Route::get('/dried_food','Products\\ProductsController@dried_food');
Route::get('/pickle','Products\\ProductsController@pickle');
Route::get('/grocery','Products\\ProductsController@grocery');
Route::get('/product_process','Products\\ProductsController@product_process');
Route::get('/product_general','Products\\ProductsController@product_general');

Route::post('/buystore','Products\\ProductsController@buystore');
Route::get('/buystore','Products\\ProductsController@buygetstore');

//test
Route::post('/upload','Products\\ProductsController@upload');

Route::get('/logout', 'Auth\LoginController@logout');

});
