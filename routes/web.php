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

Route::post('/act','ActsController@act');

Route::get('/home1', function () {
    return view('home1');
});

Route::get('/data', function () {
    return view('data');
});

Route::get('/out_of_stock', function () {
    return view('out_of_stock');
});

Route::get('/exp', function () {
    return view('exp');
});





