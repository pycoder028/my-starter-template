<?php

use App\Http\Controllers\HomeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/' ,[HomeController::class, 'home'])->name('home');


Route::get('/create',[PostController::class, 'create']);
Route::post('/store',[PostController::class, 'store'])->name('store');

Route::get('/edit/{id}',[PostController::class, 'edit'])->name('edit');
Route::post('/update/{id}',[PostController::class, 'update'])->name('update');
Route::get('/delete/{id}',[PostController::class, 'delete'])->name('delete');

