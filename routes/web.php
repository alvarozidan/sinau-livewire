<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/post/create', 'pages::post.create');
Route::livewire('/counter', 'counter');
Route::livewire('/form', 'form');
Route::livewire('/posts', 'pages::post.index');
