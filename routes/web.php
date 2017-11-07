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
Route::get('/test', function () {
    return view('testnav');
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

//pdf
Route::get('/pdf','PDFController@pdf');
Route::get('/outstockpdf','PDFController@outstockpdf');
Route::get('/exppdf','PDFController@exppdf');
Route::get('/balancepdf','PDFController@balancepdf');

//excel
Route::get('/ExportProducts','ExcelController@ExportProducts');
Route::get('/ExportOutstock','ExcelController@ExportOutstock');
Route::get('/ExportExp','ExcelController@ExportExp');
Route::get('/ExportBalance','ExcelController@ExportBalance');

Route::get('/ImportProducts','ExcelController@ImportProducts');
Route::post('/postImport','ExcelController@postImport');
Route::get('/deleteAll','ExcelController@deleteAll');


Route::get('/search2','SearchController@search2');

Route::get('/vegetable','Products\\ProductsController@vegetable');
Route::get('/fruit','Products\\ProductsController@fruit');
Route::get('/plant','Products\\ProductsController@plant');
Route::get('/dried_food','Products\\ProductsController@dried_food');
Route::get('/product_general','Products\\ProductsController@product_general');

Route::post('/buystore/{id}','Products\\ProductsController@buystore');
Route::get('/buystore','Products\\ProductsController@buygetstore');
Route::post('/cart/{id}','Products\\ProductsController@cart');
Route::get('/cart','Products\\ProductsController@cartget');

//test
Route::post('/upload','Products\\ProductsController@upload');

Route::get('/logout', 'Auth\LoginController@logout');

//change-password
Route::get('change-password', 'Auth\UpdatePasswordController@index')->name('password.form');
Route::post('change-password', 'Auth\UpdatePasswordController@update')->name('password.update');


});
