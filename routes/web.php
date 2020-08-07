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
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users', 'UsersController@store')->name('users.store');


// 用户登录
Route::get('adminlogin/{user}','SessionsController@admin')->name('admin');
Route::get('login','SessionsController@login')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');


// 后台文章列表页面
Route::get('/articles','AdminArticlesController@index')->name('articles.index');

// 后台发布文章页面及方法
Route::get('/articles/create', 'AdminArticlesController@create')->name('articles.create');
Route::post('/articles', 'AdminArticlesController@store')->name('articles.store');

// 后台修改编辑文章页面及方法
Route::get('/articles/{article}/edit', 'AdminArticlesController@edit')->name('articles.edit');
Route::patch('/articles/{article}', 'AdminArticlesController@update')->name('articles.update');
// 后台删除文章方法
Route::delete('/articles/{article}', 'AdminArticlesController@destroy')->name('articles.destroy');

// 后台个人页面
Route::get('/admin/{admin}', 'AdminUserController@show')->name('admin.show');
Route::patch('/admin/{admin}', 'AdminUserController@update')->name('admin.update');

// 文章编辑上传图片
Route::post('upload_image', 'AdminArticlesController@uploadImage')->name('articles.upload_image');