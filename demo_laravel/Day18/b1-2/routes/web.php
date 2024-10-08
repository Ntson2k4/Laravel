<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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
//b1
Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('check.auth')->name('dashboard');

//b2
Route::get('/tasks',[TaskController::class,'index'])->name('tasks.index');
Route::post('/tasks',[TaskController::class,'store'])->name('tasks.store');



