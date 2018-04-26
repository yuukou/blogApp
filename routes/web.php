<?php

Auth::routes();

Route::get('/', 'PostsController@first');
Route::get('/home', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::patch('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@destroy');
Route::get('/categories', 'CategoriesController@select')->name('select');
Route::post('/categories', 'CategoriesController@store');
Route::delete('/categories/{category}', 'CategoriesController@destroy');




























