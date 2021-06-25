<?php

namespace App\Http\Controllers\Administracion\RRHH;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCargoTrabajador;
use App\Models\Admin\Cargo_trabajador;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos_trabajador = Cargo_trabajador::orderBy('id')->get();

        return view('dinamica.administracion.rrhh.cargo.index', compact('cargos_trabajador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('dinamica.administracion.rrhh.cargo.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionCargoTrabajador $request)
    {
        Cargo_trabajador::create($request->all());

        return redirect('administracion/rrhh/cargo')->with('mensaje','Cargo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $cargo_trabajador = Cargo_trabajador::findOrFail($id);
        return view('dinamica.administracion.rrhh.cargo.editar', compact('cargo_trabajador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionCargoTrabajador $request, $id)
    {
        Cargo_trabajador::findOrFail($id)->update($request->all());
        return redirect('administracion/rrhh/cargo')->with('mensaje','Cargo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if ( Cargo_trabajador::destroy($id)) {
                return response()->json(['mensaje'=>'ok']);
            }else {
                return response()->json(['mensaje'=>'ng']);
            }
        }else {
            abort(404);
        }
    }
}
