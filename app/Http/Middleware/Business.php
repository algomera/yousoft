<?php

namespace App\Http\Middleware;

use Closure;

class Business
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->roles->first()->name == 'business') {
            return $next($request);
        }
        return redirect('login');
    }
}
