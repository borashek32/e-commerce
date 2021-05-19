<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Vendor
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
        if (auth()->user()->role === 'vendor')
        {
            return $next($request);
        }
        else
        {
            return redirect()->route(auth()->user()->role)
                ->with('error', 'You do not have permissions');
        }
    }
}
