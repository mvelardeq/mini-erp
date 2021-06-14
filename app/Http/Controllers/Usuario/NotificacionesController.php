<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Operaciones\Adelanto_trabajador;
use App\Models\Operaciones\Gasto_trabajador;
use App\Models\Operaciones\Ot;
use App\Models\Operaciones\Tipo_gasto;
use App\Models\Seguridad\Trabajador;
use App\Models\Ventas\Contrato;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $tipos_gasto = Tipo_gasto::orderBy('id')->get();
        $ots = Ot::with('trabajador','actividades', 'adelanto_trabajador')->get();
        $ots_supervisor = collect();

        foreach ($ots as $ot) {
            if ($ot->trabajador->supervisor_id == $id) {
                $ots_supervisor->push($ot);
            }
        }
        // return dd($ots_supervisor);
        return view('dinamica.usuario.notificaciones.index', compact('ots_supervisor', 'tipos_gasto'));
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

        $pago = $_POST['pago'];
        Adelanto_trabajador::create(['ot_id'=>$id, 'pago'=>$pago]);
        return response()->json(['mensaje'=>'ok','id'=>$id, 'pago'=>$pago]);
    }

    public function descuento(Request $request, $id)
    {
        $descuento = $_POST['descuento'];
        $motivo_descuento = $_POST['motivo_descuento'];
        Ot::findOrFail($id)->update(['descuento' => $descuento, 'motivo_descuento'=>$motivo_descuento]);
        return response()->json(['mensaje'=>'ok','id'=>$id, 'descuento'=>$descuento,'motivo_descuento'=>$motivo_descuento]);

    }

    public function gastoi(Request $request, $id)
    {
        $pago = $_POST['gastoi'];
        $tipo_gasto_id = $_POST['tipogasto_id'];
        Gasto_trabajador::create(['ot_id'=>$id, 'pago'=>$pago, 'tipo_gasto_id'=>$tipo_gasto_id, 'estado_gasto_id'=>1]);
        return response()->json(['mensaje'=>'ok','id'=>$id]);

    }

    public function gastom(Request $request, $id)
    {
        $pago = $_POST['gastom'];
        $tipo_gasto_id = $_POST['tipogasto_id'];
        Gasto_trabajador::create(['ot_id'=>$id, 'pago'=>$pago, 'tipo_gasto_id'=>$tipo_gasto_id, 'estado_gasto_id'=>2]);
        return response()->json(['mensaje'=>'ok','id'=>$id]);
    }

    public function crear_falta()
    {
        $id = Auth::user()->id;
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
        return redirect('usuario/notificaciones')->with('mensaje', 'Falta creada con éxito');
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
