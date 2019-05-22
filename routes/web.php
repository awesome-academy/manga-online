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

Route::get('/admin/login', [RegisterController::class, 'index'])->name('admin.login');

Route::get('/user', 'UserController@index');
Route::get('/user/getlist', 'UserController@getList');
Route::get('/user/status/{id}', 'UserController@updateStatus');
Route::get('/user/delete/{id}', 'UserController@deleteStatus');
Route::post('/user/store', 'UserController@store');
Route::post('/user/update', 'UserController@update');
Route::get('/user/{id}/edit', 'UserController@edit');
