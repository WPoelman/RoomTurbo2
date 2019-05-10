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

Route::get('/home', 'HomeController@index')->name('home');
Route::delete('/home', 'UserInfoController@destroy');

