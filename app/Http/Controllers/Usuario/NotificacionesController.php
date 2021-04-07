<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Operaciones\Ot;
use App\Models\Seguridad\Trabajador;
use App\Models\Ventas\Contrato;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $ots = Ot::with('trabajador','actividades')->get();
        $ots_supervisor = collect();

        foreach ($ots as $ot) {
            if ($ot->trabajador->supervisor_id == $id) {
                $ots_supervisor->push($ot);
            }
        }
        // return dd($ots_supervisor);
        return view('dinamica.usuario.notificaciones.index', compact('ots_supervisor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aprobar_ot(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Ot::findOrFail($id)->update(['estado_ot_id' => 2 ])) {
                return response()->json(['mensaje' => 'ok','id'=>$id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function adelanto(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Ot::findOrFail($id)->update(['adelanto' => $request->adelanto ])) {
                echo "Adelanto: S/.$request->adelanto";
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
        // Ot::findOrFail($id)->update(['descuento' => $request->descuento]);
        // echo "Adelanto: S/.$request->descuento";
    }

    public function descuento(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Ot::findOrFail($id)->update(['descuento' => $request->descuento, 'motivo_descuento' =>$request->motivo_descuento ])) {
                echo "Adelanto: S/.$request->descuento";
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
        // Ot::findOrFail($id)->update(['descuento' => $request->descuento]);
        // echo "Adelanto: S/.$request->descuento";
    }

    public function crear_falta($id)
    {
        $trabajadores = Trabajador::where('supervisor_id', $id)->orderBy('id')->get();
        $contratos = Contrato::where('estado', 'Abierto')->orderBy('id')->get();

        return view('dinamica.usuario.notificaciones.crear', compact('trabajadores','contratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar_falta(Request $request, $id)
    {
        Ot::create([
            'trabajador_id' => $request->trabajador_id,
            'contrato_id' => $request->contrato_id,
            'estado_ot_id' => 3,
            'fecha' => Carbon::now()->isoFormat('YYYY-MM-DD')

        ]);
        return redirect('usuario/notificaciones/'.$id)->with('mensaje', 'Falta creada con éxito');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            if (Ot::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
