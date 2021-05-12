<?php

namespace App\Http\Controllers\Administracion\RRHH;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ascenso_trabajador;
use App\Models\Admin\Cargo_trabajador;
use App\Models\Seguridad\Trabajador;
use Illuminate\Http\Request;

class TrabajadorPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Trabajador::with('roles:id,nombre', 'observaciones', 'periodos', 'ascensos')->findOrFail($id);
        $ascensos = Ascenso_trabajador::with('cargo')->where('trabajador_id', $id)->get();

        $trabajador = Trabajador::with('ascensos')->findOrFail($id);
        $cargo_trabajador = Cargo_trabajador::get();

        return view('dinamica.administracion.rrhh.trabajador.perfilTrabajador.index', compact('data', 'ascensos', 'trabajador','cargo_trabajador'));
    }

}
