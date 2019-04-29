<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /**
         * Redirecciona a la vista de logueado si ya estas logueado y
         * tratas de entrar a un formulario que no es necesario mostrar por estar logueado
         */
        if (Auth::guard($guard)->check()) {
            return redirect()->back();
        }

        return $next($request);
    }
}
