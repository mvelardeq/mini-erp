<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionServicioTercero;
use App\Models\Administracion\Servicio_tercero;
use Illuminate\Http\Request;

class ServicioTerceroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-serviciost');
        $servicios_tercero = Servicio_tercero::orderBy('cuenta')->get();
        return view('dinamica.administracion.servicio-tercero.index', compact('servicios_tercero'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-serviciost');
        return view('dinamica.administracion.servicio-tercero.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionServicioTercero $request)
    {
        can('crear-serviciost');
        if ($request->tipo_gasto=='Administrativo' || $request->tipo_gasto=='Ventas' || $request->tipo_gasto=='Producción') {
            Servicio_tercero::create($request->all());
            return redirect('administracion/servicio-tercero')->with('mensaje','Servicio creado con éxito');
        }else {
            abort(404);
        }
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
        can('editar-serviciost');
        $servicio_tercero = Servicio_tercero::findOrFail($id);
        return view('dinamica.administracion.servicio-tercero.editar',compact('servicio_tercero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionServicioTercero $request, $id)
    {
        can('editar-serviciost');
        Servicio_tercero::findOrFail($id)->update($request->all());
        return redirect('administracion/servicio-tercero')->with('mensaje','Servicio actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request,$id)
    {
        can('eliminar-serviciost');
        if ($request->ajax()) {
            if (Servicio_tercero::destroy($id)) {
                return response()->json(['mensaje'=>'ok']);
            }else {
                return response()->json(['mensaje'=>'ok']);
            }
        }else {
            abort(404);
        }
    }
}
