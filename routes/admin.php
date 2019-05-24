<?php
/**
 * Created by PhpStorm.
 * User: phanngocthien
 * Date: 5/20/19
 * Time: 09:59
 */

use App\Http\Controllers\Admin\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('admin.home');
