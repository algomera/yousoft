<?php

namespace App\Http\Middleware;

use Closure;

class Asseverator
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
        if (auth()->user()->role->name == 'fiscal_asseverator' || auth()->user()->role->name == 'technical_asseverator') {
            return $next($request);
        }
        return redirect('login');
    }
}
