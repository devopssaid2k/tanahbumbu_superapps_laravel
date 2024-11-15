<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class isUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() && Auth::user()->role == 3){
            return $next($request);
        }elseif( Auth::check() && Auth::user()->role == 4){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
