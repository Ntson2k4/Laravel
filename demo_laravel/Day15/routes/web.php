<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\PostController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//posts
Route::get('/posts',[PostController::class,'index']);
    
//tasks
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::delete('/tasks/delete/{id}',[TaskController::class,'destroy']);
Route::get('/tasks/edit/{id}',[TaskController::class,'edit']);
Route::patch('/tasks/update/{id}',[TaskController::class,'update']);

Route::get('/welcome', function () {
    return view('welcome');
});