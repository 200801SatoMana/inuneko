<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TimelineController;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/timeline', [TimelineController::class,'showTimelinePage']);  
Route::post('/timeline/post', [PostController::class,'postTweet']);  
Route::get('/timeline/post',function(){
    return view('Post');
});

