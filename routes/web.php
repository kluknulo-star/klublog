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
    Route::get('', \App\Http\Controllers\Main\IndexController::class)->name('main.index');
});

Route::prefix('/posts')->group(function () {
    Route::get('', \App\Http\Controllers\Post\IndexController::class)->name('post.index');
    Route::get('/{post}', \App\Http\Controllers\Post\ShowController::class)->where('post','[0-9]+')->name('post.show');

});

Route::prefix('/personal')->middleware(['auth', 'verified'])->group(function () {
    Route::get('', \App\Http\Controllers\Personal\Main\IndexController::class)->name('personal.main.index');
    Route::delete('/post/{post}', \App\Http\Controllers\Personal\Like\DestroyController::class)->name('personal.like.destroy')->where('post', '[0-9]+');
    Route::get('/like', \App\Http\Controllers\Personal\Like\IndexController::class)->name('personal.like.index');

    Route::prefix('/comment')->group(function () {
        Route::get('/', \App\Http\Controllers\Personal\Comment\IndexController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', \App\Http\Controllers\Personal\Comment\EditController::class)->name('personal.comment.edit')->where('comment', '[0-9]+');
        Route::patch('/{comment}', \App\Http\Controllers\Personal\Comment\UpdateController::class)->name('personal.comment.update')->where('comment', '[0-9]+');
        Route::delete('/{comment}', \App\Http\Controllers\Personal\Comment\DestroyController::class)->name('personal.comment.destroy')->where('comment', '[0-9]+');

    });
});

Route::prefix('/admin')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('', \App\Http\Controllers\Admin\Main\IndexController::class)->name('admin.main.index');

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

    Route::prefix('/posts')->group(function () {
        Route::get('', \App\Http\Controllers\Admin\Post\IndexController::class)->name('admin.post.index');
        Route::post('', \App\Http\Controllers\Admin\Post\StoreController::class)->name('admin.post.store');
        Route::get('/create', \App\Http\Controllers\Admin\Post\CreateController::class)->name('admin.post.create');
        Route::get('/{post}', \App\Http\Controllers\Admin\Post\ShowController::class)->name('admin.post.show')->where('post', '[0-9]+');
        Route::get('/{post}/edit', \App\Http\Controllers\Admin\Post\EditController::class)->name('admin.post.edit')->where('post', '[0-9]+');
        Route::patch('/{post}', \App\Http\Controllers\Admin\Post\UpdateController::class)->name('admin.post.update')->where('post', '[0-9]+');
        Route::delete('/{post}', \App\Http\Controllers\Admin\Post\DestroyController::class)->name('admin.post.destroy')->where('post', '[0-9]+');
    });

    Route::prefix('/users')->group(function () {
        Route::get('', \App\Http\Controllers\Admin\User\IndexController::class)->name('admin.user.index');
        Route::post('', \App\Http\Controllers\Admin\User\StoreController::class)->name('admin.user.store');
        Route::get('/create', \App\Http\Controllers\Admin\User\CreateController::class)->name('admin.user.create');
        Route::get('/{user}', \App\Http\Controllers\Admin\User\ShowController::class)->name('admin.user.show')->where('user', '[0-9]+');
        Route::get('/{user}/edit', \App\Http\Controllers\Admin\User\EditController::class)->name('admin.user.edit')->where('user', '[0-9]+');
        Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.user.update')->where('user', '[0-9]+');
        Route::delete('/{user}', \App\Http\Controllers\Admin\User\DestroyController::class)->name('admin.user.destroy')->where('user', '[0-9]+');
    });

});




Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
