<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, chuyển hướng đến dashboard
            return redirect()->route('dashboard');
        }
    
        // Nếu đăng nhập thất bại
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        return redirect()->route('login'); // Chuyển hướng về trang đăng nhập
    }
}
