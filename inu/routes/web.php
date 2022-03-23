<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TimelineController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MypageController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/timeline', [TimelineController::class,'showTimelinePage']); 
Route::get('/timeline/upload',[ImageController::class,'index']);
Route::post('/timeline',[ImageController::class,'store'])->name('image.store');
Route::get('/mypage',[MypageController::class,'index']);
#Route::post('/mypage',[MypageController::class,'update']);


