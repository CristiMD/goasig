<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next, ...$roles)
    {
        if(auth()->user()) {
            return collect($roles)->contains(auth()->user()->role) ? $next($request) : redirect('/');
        } else {
            return redirect('/');
        }
    }
}
