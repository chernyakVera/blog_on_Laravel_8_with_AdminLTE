<?php

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

Route::get('/', 'HomeController@index')->name('login');

Route::group(['namespace' => 'Post'], function() {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit')
        ->middleware('can:update,post');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/post', 'IndexController')->name('admin.post.index');
        Route::get('/posts/create', 'CreateController')->name('admin.post.create');
        Route::post('/posts', 'StoreController')->name('admin.post.store');
        Route::get('/posts/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/posts/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/posts/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/posts/{post}', 'DestroyController')->name('admin.post.destroy');
    });
});
Route::get('/about', 'AboutController@index')->name('about.index');
Route::get('/contacts', 'ContactsController@index')->name('contact.index');
Route::get('/main', 'MainController@index')->name('main.index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



