<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Pago_servicio;
use App\Models\Administracion\Servicio_tercero;
use Illuminate\Http\Request;

class PagoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos_servicio = Pago_servicio::with('servicio_tercero')->orderBy('id')->get();
        return view('dinamica.administracion.pago-servicio.index', compact('pagos_servicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $servicios_tercero = Servicio_tercero::orderBy('id')->get();
        return view('dinamica.administracion.pago-servicio.crear', compact('servicios_tercero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        Pago_servicio::create($request->all());
        return redirect('administracion/pago-servicio')->with('mensaje','Pago creado con éxito');
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
        $servicios_tercero = Servicio_tercero::orderBy('id')->get();
        $pago_servicio = Pago_servicio::findOrFail($id);
        return view('dinamica.administracion.pago-servicio.editar',compact('pago_servicio','servicios_tercero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        Pago_servicio::findOrFail($id)->update($request->all());
        return redirect('administracion/pago-servicio')->with('mensaje','Pago actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Pago_servicio::destroy($id)) {
                return response()->json(['mensaje'=>'ok']);
            }else {
                return response()->json(['mensaje'=>'ng']);
            }
        }else {
            abort(404);
        }
    }
}
