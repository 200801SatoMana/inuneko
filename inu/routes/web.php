<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TimelineController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/timeline', [TimelineController::class,'showTimelinePage']);   // <--- 追加
Route::post('/timeline', [TimelineController::class,'postTweet']);    // <--- 追加