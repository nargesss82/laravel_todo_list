<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('users',UserController::class);
Route::resource('tasks',TaskController::class);
Route::resource('categories',CategoryController::class);


Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

Route::get('/login',[LoginController::class,'show'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::post('/logout',[LoginController::class,'logout'])->name('logout');
