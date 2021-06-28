<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermisoLineaMando
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
        if ($this->permiso())
            return $next($request);
        return redirect('/inicio')->with('mensaje', 'No tiene permiso para entrar aquí');
    }
    private function permiso()
    {
        return session()->get('rol_nombre')!=='técnico';
    }
}
