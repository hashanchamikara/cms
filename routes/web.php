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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'customer', 'as' => 'customer'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'CustomerController@customerList']);
    Route::get('/create', ['as' => 'create', 'uses' => 'CustomerController@index']);
    Route::post('/save', ['as' => 'save', 'uses' => 'CustomerController@saveCustomer']);
    Route::any('/search', ['as' => 'search', 'uses' => 'CustomerController@search']);
    Route::post('/update', ['as' => 'update', 'uses' => 'CustomerController@updateCustomer']);
    Route::get('/downloadPDF/{id}', ['as' => 'downloadPDF', 'uses' => 'CustomerController@downloadPDF']);
    Route::get('/downloadCustomerList', ['as' => 'downloadCustomerList', 'uses' => 'CustomerController@downloadCustomerList']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
