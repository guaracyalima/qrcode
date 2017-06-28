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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tickets', 'TicketsController@index')->name('tickets');
Route::get('/tickets/create', 'TicketsController@create')->name('create');
Route::post('/tickets/store', 'TicketsController@store')->name('store');
Route::get('/tickets/show/{id}', 'TicketsController@show')->name('show');
Route::get('/tickets/edit/{id}', 'TicketsController@edit')->name('edit');
Route::post('/tickets/update', 'TicketsController@update')->name('update');
Route::get('/tickets/destroy/{id}', 'TicketsController@destroy')->name('destroy');
