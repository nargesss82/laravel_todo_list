<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('tasks.create');
//});

Route::resource('users',UserController::class);
Route::resource('tasks',TaskController::class);
Route::resource('categories',CategoryController::class);

// routes/web.php
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

