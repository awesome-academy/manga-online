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

use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\HomeController;

Route::get('/admin/login', [RegisterController::class, 'index'])->name('admin.login');

Route::get('/user', 'UserController@index');
Route::get('/user/getlist', 'UserController@getList');
Route::get('/user/status/{id}', 'UserController@updateStatus');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::post('/user/store', 'UserController@store');
Route::post('/user/update', 'UserController@update');
Route::get('/user/{id}/edit', 'UserController@edit');

Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('/category/getlist', 'CategoryController@getlist')->name('category.getlist');
Route::get('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::post('/category/update', 'CategoryController@update')->name('category.update');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/js/lang.js', [HomeController::class, 'exportJs'])->name('admin.lang');
