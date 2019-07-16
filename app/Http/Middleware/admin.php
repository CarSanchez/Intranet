<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
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
        if (Auth::user()->role->role != 'admin' && Auth::user()->role->role != 'sa'){
            return redirect()->back()->with('flash', 'No tienes privilegios para está acción.');
        }

        return $next($request);
    }
}
