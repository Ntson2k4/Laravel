<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Kiểm tra xem người dùng đã đăng nhập và có vai trò đúng
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập vào trang này!');
        }

        return $next($request);
    }
}
