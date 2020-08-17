<?php

// use Illuminate\Support\Facades\Route;

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

// 主页
Route::get('/','ArticlesController@index')->name('index');
Route::get('/article/{article}','ArticlesController@show')->name('show');


// 注册用户页面及方法
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');


// 用户登录
Route::get('login','SessionsController@login')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

// 发布文章页面及方法
Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
Route::post('/articles', 'ArticlesController@store')->name('articles.store');
// 后台修改编辑文章页面及方法
Route::get('/articles/{article}/edit', 'ArticlesController@edit')->name('articles.edit');
Route::patch('/articles/{article}', 'ArticlesController@update')->name('articles.update');
// 后台删除文章方法
Route::delete('/articles/{article}', 'ArticlesController@destroy')->name('articles.destroy');

Route::post('upload_image', 'ArticlesController@uploadImage')->name('articles.upload_image');
