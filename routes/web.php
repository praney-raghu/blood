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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('donor/home', 'UserController@donor_index')->name('donor_home');

Route::get('bank/home', 'UserController@bank_index')->name('bank_home');

Route::post('search', 'UserController@search')->name('search');
