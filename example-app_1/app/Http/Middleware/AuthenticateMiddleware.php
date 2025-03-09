<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if(Auth::id() == null){
    //         return redirect()->route('auth.admin')->with('error', 'Ban phai dang nhap de su dung chuc nang nay');
    //     }
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next): Response
{
    if(Auth::id() == null){
        // Kiểm tra nếu là request AJAX
        if ($request->ajax()) {
            return response()->json(['error' => 'Bạn phải đăng nhập để sử dụng chức năng này'], 401);
        }
        return redirect()->route('auth.admin')->with('error', 'Bạn phải đăng nhập để sử dụng chức năng này');
    }
    return $next($request);
}

}
