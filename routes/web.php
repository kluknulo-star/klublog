<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::group([], function () {
    Route::get('/', \App\Http\Controllers\Main\IndexController::class);


});

Route::prefix('/admin')->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\Main\IndexController::class);

    Route::prefix('/categories')->group(function (){
        Route::get('', \App\Http\Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::post('', \App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/create', \App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.category.create');

    });


});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
