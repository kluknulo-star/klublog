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
    Route::get('', \App\Http\Controllers\Admin\Main\IndexController::class);

    Route::prefix('/categories')->group(function (){
        Route::get('', \App\Http\Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::post('', \App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/create', \App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.category.create');
        Route::get('/{category}', \App\Http\Controllers\Admin\Category\ShowController::class)->name('admin.category.show')->where('category', '[0-9]+');
        Route::get('/{category}/edit', \App\Http\Controllers\Admin\Category\EditController::class)->name('admin.category.edit')->where('category', '[0-9]+');
        Route::patch('/{category}', \App\Http\Controllers\Admin\Category\UpdateController::class)->name('admin.category.update')->where('category', '[0-9]+');
        Route::delete('/{category}', \App\Http\Controllers\Admin\Category\DestroyController::class)->name('admin.category.destroy')->where('category', '[0-9]+');
    });

    Route::prefix('/tags')->group(function () {
        Route::get('', \App\Http\Controllers\Admin\Tag\IndexController::class)->name('admin.tag.index');
        Route::post('', \App\Http\Controllers\Admin\Tag\StoreController::class)->name('admin.tag.store');
        Route::get('/create', \App\Http\Controllers\Admin\Tag\CreateController::class)->name('admin.tag.create');
        Route::get('/{tag}', \App\Http\Controllers\Admin\Tag\ShowController::class)->name('admin.tag.show')->where('tag', '[0-9]+');
        Route::get('/{tag}/edit', \App\Http\Controllers\Admin\Tag\EditController::class)->name('admin.tag.edit')->where('tag', '[0-9]+');
        Route::patch('/{tag}', \App\Http\Controllers\Admin\Tag\UpdateController::class)->name('admin.tag.update')->where('tag', '[0-9]+');
        Route::delete('/{tag}', \App\Http\Controllers\Admin\Tag\DestroyController::class)->name('admin.tag.destroy')->where('tag', '[0-9]+');
    });

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
