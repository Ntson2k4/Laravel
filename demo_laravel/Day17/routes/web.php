<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
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
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks',[TaskController::class,'store']);
Route::put('/task/{id}',[TaskController::class,'update']);
Route::delete('/task/{id}',[TaskController::class,'delete']);
//b5
Route::resource('projects', ProjectController::class);

Route::get('/', function () {
    return view('welcome');
});
