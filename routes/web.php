<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/post/create', 'pages::post.create')->name('post.create');
Route::livewire('/posts', 'pages::post.index')->name('posts.index');
Route::livewire('/counter', 'counter');
Route::livewire('/form', 'form');
