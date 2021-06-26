<?php

namespace App\Http\Middleware;

use App\Models\Seguridad\Trabajador;
use App\Providers\RouteServiceProvider;
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
        // if (isset(Trabajador::findOrFail(auth()->user()->id)->periodos->last()->fecha_inicio) && !isset(Trabajador::findOrFail(auth()->user()->id)->periodos->last()->fecha_fin)) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect('/inicio');
        //     }

        //     return $next($request);
        // }else {
        //     return route('login');
        // }

        if (Auth::guard($guard)->check()) {
                    return redirect('/inicio');
                }

        return $next($request);
    }
}
