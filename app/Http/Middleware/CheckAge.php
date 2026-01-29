<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // 1. Nếu người dùng đang ở trang xác nhận tuổi rồi thì cho họ xem tiếp (tránh vòng lặp)
    if ($request->routeIs('checkAge') || $request->routeIs('checkAge.confirm')) {
        return $next($request);
    }
        if(!$request->session()->has('is_adult')){
            return redirect()->route('checkAge');
        }

        return $next($request);
    }
}
