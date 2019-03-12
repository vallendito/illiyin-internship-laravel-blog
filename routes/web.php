<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
    // Route Post
    Route::get('/post', 'PostController@index')->name('post.index')->middleware('auth');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/create', 'PostController@store')->name('post.store');

    // Edit Post
    Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit'); //karena menggunakan model binding {id} di ganti {post}
    Route::patch('/post/{post}/edit', 'PostController@update')->name('post.update');

    // Delete Post
    Route::delete('/post/{post}/delete', 'PostController@destroy')->name('post.destroy');

    // detail Blog
    Route::get('/post/{post}', 'PostController@show')->name('post.show');

    // Comment
    Route::post('/post/{post}/comment', 'PostCommentController@store')->name('post.comment.store');
});