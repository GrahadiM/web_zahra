<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // return $next($request);

        if (Auth::user() &&  Auth::user()->role == 'admin') {
            return $next($request);
        }

        return redirect()->route('landingpage')->with('error','You have not admin access');
    }
}
