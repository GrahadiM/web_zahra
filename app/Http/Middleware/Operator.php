<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Operator
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

        if (Auth::user() &&  Auth::user()->role == 'operator') {
            return $next($request);
        }

        return redirect()->route('landingpage')->with('error','You have not operator access');
    }
}
