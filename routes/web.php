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

// Route::resource('posts', 'PostController');
Route::get('posts', 'PostController@index')->name('post');
Route::post('posts/store', 'PostController@store')->name('store');
Route::put('posts/update/{slug}', 'PostController@update')->name('update');
Route::get('posts/create', 'PostController@create')->name('create');
Route::get('posts/edit/{slug}', 'PostController@edit')->name('edit');
Route::get('posts/{slug}', 'PostController@show')->name('detail');
Route::delete('posts/delete/{id}', 'PostController@delete')->name('delete');
Route::post('posts/{id}/comment', 'CommentController@newComment')->name('newComment');

