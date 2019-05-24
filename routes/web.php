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

Route::get('/manga', 'MangaController@index')->name('manga.index');
Route::get('/manga/getlist', 'MangaController@getlist')->name('manga.getlist');
Route::post('/manga/store', 'MangaController@store')->name('manga.store');
Route::get('/manga/delete/{id}', 'MangaController@delete')->name('manga.delete');
Route::get('/manga/status/{id}', 'MangaController@updateStatus')->name('manga.status');
Route::get('/manga/{id}/edit', 'MangaController@edit')->name('manga.edit');
Route::post('/manga/update', 'MangaController@update')->name('manga.update');

Route::get('/manga/{id}', 'ChapterController@index')->name('manga.index');
Route::get('/chapter/getlist/{id}', 'ChapterController@getlist')->name('chapter.getlist');
Route::post('/chapter/store', 'ChapterController@store')->name('chapter.store');
Route::get('/chapter/delete/{id}', 'ChapterController@delete')->name('chapter.delete');
Route::get('/chapter/status/{id}', 'ChapterController@updateStatus')->name('chapter.status');
Route::get('/role', 'RoleController@index')->name('role.index');
Route::get('/role/getlist', 'RoleController@getlist')->name('role.getlist');
Route::post('/role/permission', 'RoleController@addpermisson')->name('role.addpermisson');
