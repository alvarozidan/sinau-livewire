<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/post/create', 'pages::post.create')->name('posts.create');
Route::livewire('/posts', 'pages::post.index')->name('posts.index');
Route::livewire('/counter', 'counter');
Route::livewire('/form', 'form');
Route::livewire('/posts/{post}/edit', 'pages::post.edit')->name('posts.edit');
Route::livewire('/posts/{post}', 'pages::post.show')->name('posts.show');
