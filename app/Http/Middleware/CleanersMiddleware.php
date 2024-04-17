<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CleanersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role == 'Cleaner') {
            return $next($request);
        }

        // If user is not authorized, redirect or abort with a response
        return redirect()->route('home')->with('error', 'You are not authorized to access cleaning functionalities.');

    }
}
