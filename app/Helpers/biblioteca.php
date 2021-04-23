<?php

use Illuminate\Support\Str;
use App\Models\Admin\Permiso;
use Illuminate\Database\Eloquent\Builder;


if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}

if (!function_exists('getMenuOpen')) {
    function getMenuOpen($nombre)
    {
        $n1 = request()->path();
        $nombre2 = Str::lower($nombre);
        $nombre3 = Str::ascii($nombre2);
        if (Str::is('*'.$nombre3.'/*', $n1)) {
            return 'menu-open';
        } else {
            return '';
        }
    }
}

if (!function_exists('getMenuActive')) {
    function getMenuActive($nombre)
    {
        $n1 = request()->path();
        $nombre2 = Str::lower($nombre);
        $nombre3 = Str::ascii($nombre2);
        if (Str::is($nombre3.'/*', $n1)) {
            return 'active';
        } else {
            return '';
        }
    }
}

if (!function_exists('canUser')) {
    function can($permiso, $redirect = true)
    {
        if (session()->get('rol_nombre') == 'administrador') {
            return true;
        } else {
            $rolId = session()->get('rol_id');
            $permisos = cache()->tags('permiso')->rememberForever("permiso.rolid.$rolId", function () {
                return Permiso::whereHas('roles', function ($query) {
                    $query->where('rol_id', session()->get('rol_id'));
                })->get()->pluck('slug')->toArray();
            });
            if (!in_array($permiso, $permisos)) {
                if ($redirect) {
                    if (!request()->ajax())
                        return redirect()->route('dinamica.inicio')->with('mensaje', 'No tienes permisos para entrar en este modulo')->send();
                    abort(403, 'No tiene permiso');
                } else {
                    return false;
                }
            }
            return true;
        }
    }
}
