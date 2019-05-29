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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/js/lang.js', [HomeController::class, 'exportJs'])->name('admin.lang');

Auth::routes();
Route::get('/', 'Client\HomeController@index')->name('client.home');
Route::get('/category/{cate}', 'Client\HomeController@getCategory')->name('client.getcategory');
Route::get('/manga/{slug}', 'Client\HomeController@getManga')->name('client.getmanga');
Route::get('/manga/{manga}/{chapter}', 'Client\HomeController@getChapter')->name('client.getChapter');
