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

/* Static pages */
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

/* Resources (CRUD) */
Route::resource('/rooms', 'RoomController');
Auth::routes();

/* User Dashboard */
Route::get('/home', 'HomeController@index')->name('home');
Route::put('/home', 'HomeController@update');
Route::get('/home/edit', 'HomeController@edit')->name('edit');
Route::get('/home/password', 'HomeController@password');
Route::delete('/home', 'HomeController@destroy');

