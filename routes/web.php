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


Route::get('/','pageController@index')->name('home');
Route::get('create','pageController@create')->name('create');
Route::post('/','pageController@store')->name('store');
Route::get('{id}','pageController@show');
Route::get('edit/{id}','pageController@edit')->name('edit');
Route::get('delete/{ind}','pageController@destroy')->name('hapus');
