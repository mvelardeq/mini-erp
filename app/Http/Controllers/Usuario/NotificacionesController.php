<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Finanzas\Contabilidad\Asiento_contable;
use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use App\Models\Finanzas\Contabilidad\Cuenta_contable;
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
                $ot = Ot::with('trabajador','adelanto_trabajador','gasto_trabajador')->findOrFail($id);

                if($ot->adelanto_trabajador->count()>0)
                {
                    $adelanto = Adelanto_trabajador::orderBy('created_at','desc')->first();
                    Asiento_contable::create([
                        'fecha'=>$ot->fecha,
                        'glosa'=>'Se le hizo adelanto al trabajdor '.$ot->trabajador->primer_nombre.' '.$ot->trabajador->primer_apellido,
                        'asientoable_id'=>$adelanto->id,
                        'asientoable_type'=>'App\Operaciones\Adelanto_trabajador'
                    ]);
                    $asiento_contable_id = Asiento_contable::orderBy('created_at','desc')->first()->id;
                    $cuenta_principal = Cuenta_contable::where('codigo','10411')->value('id');
                    $cuenta_sueldos = Cuenta_contable::where('codigo','6211')->value('id');
                    Asiento_cuenta::create([
                        'cuenta_contable_id'=>$cuenta_principal,
                        'asiento_contable_id'=>$asiento_contable_id,
                        'haber'=>$ot->adelanto_trabajador->pago
                    ]);
                    Asiento_cuenta::create([
                        'cuenta_contable_id'=>$cuenta_sueldos,
                        'asiento_contable_id'=>$asiento_contable_id,
                        'debe'=>$ot->adelanto_trabajador->pago
                    ]);
                    $saldo1 = Cuenta_contable::findOrFail($cuenta_principal)->saldo;
                    Cuenta_contable::findOrFail($cuenta_principal)->update(['saldo'=>$saldo1-$ot->adelanto_trabajador->pago]);
                    $saldo2 = Cuenta_contable::findOrFail($cuenta_sueldos)->saldo;
                    Cuenta_contable::findOrFail($cuenta_sueldos)->update(['saldo'=>$saldo2+$ot->adelanto_trabajador->pago]);
                }

                if ($ot->gasto_trabajador->estado_gasto->nombre == 'Inmediato')
                {
                    $gasto = Gasto_trabajador::orderBy('created_at','desc')->first();
                    Asiento_contable::create([
                        'fecha'=>$ot->fecha,
                        'glosa'=>'Se le pagó gasto del trabajdor '.$ot->trabajador->primer_nombre.' '.$ot->trabajador->primer_apellido.', motivo: '.$ot->gasto_trabajador->tipo_gasto->nombre,
                        'asientoable_id'=>$gasto->id,
                        'asientoable_type'=>'App\Operaciones\Gasto_trabajador'
                    ]);
                    $asiento_contable_id = Asiento_contable::orderBy('created_at','desc')->first()->id;
                    $cuenta_principal = Cuenta_contable::where('codigo','10411')->value('id');
                    $cuenta_gastos = Cuenta_contable::where('codigo','622')->value('id');
                    Asiento_cuenta::create([
                        'cuenta_contable_id'=>$cuenta_principal,
                        'asiento_contable_id'=>$asiento_contable_id,
                        'haber'=>$ot->gasto_trabajador->pago
                    ]);
                    Asiento_cuenta::create([
                        'cuenta_contable_id'=>$cuenta_gastos,
                        'asiento_contable_id'=>$asiento_contable_id,
                        'debe'=>$ot->gasto_trabajador->pago
                    ]);
                    $saldo1 = Cuenta_contable::findOrFail($cuenta_principal)->saldo;
                    Cuenta_contable::findOrFail($cuenta_principal)->update(['saldo'=>$saldo1-$ot->gasto_trabajador->pago]);
                    $saldo2 = Cuenta_contable::findOrFail($cuenta_gastos)->saldo;
                    Cuenta_contable::findOrFail($cuenta_gastos)->update(['saldo'=>$saldo2+$ot->gasto_trabajador->pago]);

                }

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
        // $ot = Ot::with('trabajador')->findOrFail($id);

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
