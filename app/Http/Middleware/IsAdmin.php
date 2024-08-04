<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('auth.LoadLoginform')->with('error','Bạn cần phải đăng nhập để làm việc này');
        }
        $user = Auth::user();
        if($user->role_id !== User::ROLE_ADMIN){
            return redirect()->route('home')->with('error','Bạn không có quyền truy cập vào trang quản trị');
        }
        return $next($request);
    }
}
