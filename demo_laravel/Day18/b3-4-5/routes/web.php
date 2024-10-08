<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Route cho đăng nhập
Route::get('login', function () {
    return view('admin.login');
})->name('login');

Route::post('login', [AdminController::class, 'login'])->name('login.post');

// Route cho trang quản trị
Route::get('/admin/home', [AdminController::class, 'home'])
    ->name('admin.home')
    ->middleware('auth');

// Route cho đăng xuất
Route::post('logout', [AdminController::class, 'logout'])
    ->name('admin.logout')
    ->middleware('auth');

// Route cho người dùng
Route::get('/user/edit', [UserController::class, 'edit'])
    ->name('user.edit')
    ->middleware('auth');

Route::put('/user/update', [UserController::class, 'update'])
    ->name('user.update')
    ->middleware(['auth', 'role:admin']); // Chỉ cho phép admin cập nhật thông tin người dùng

// Route cho trang đăng ký
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
