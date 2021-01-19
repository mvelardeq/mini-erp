<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Models\Ventas\Concepto_pago;
use App\Models\Ventas\Contrato;
use App\Models\Operaciones\Empresa;
use App\Models\Operaciones\Equipo;
use App\Models\Operaciones\Servicio;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos= Contrato::with('conceptos_pago','equipo', 'servicio')->orderBy('id')->get();
        $servicios = Servicio::orderBy('id')->get();
        $empresas = Empresa::orderBy('id')->get();
        $equipos = Equipo::with('obra')->orderBy('id')->get();
        return view('dinamica.ventas.contrato.index',compact('contratos', 'servicios', 'empresas', 'equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $contratos= Contrato::with('conceptos_pago','equipo')->orderBy('id')->get();
        $conceptos_pago= Concepto_pago::orderBy('id')->get();
        $servicios = Servicio::orderBy('id')->get();
        $empresas = Empresa::orderBy('id')->get();
        $equipos= Equipo::orderBy('id')->get();
        return  view('dinamica.ventas.contrato.crear',compact('contratos', 'conceptos_pago', 'servicios', 'empresas', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        Contrato::create([
            'servicio_id' => $request->servicio_id,
            'empresa_id' => $request->empresa_id,
            'equipo_id' => $request->equipo_id,
            'horas' => $request->horas,
            'costo_sin_igv' => $request->costo_sin_igv,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            // 'estado' => $request->estado,
            'observacion' => $request->observacion,
            ]);

        $idcontrato= Contrato::orderBy('created_at', 'desc')->first()->id;

        Concepto_pago::create([
            'contrato_id' => $idcontrato,
            'concepto' => $request->concepto1,
            'porcentaje' => $request->porcentaje1,
        ]);

        if (isset($request->concepto2)){

            Concepto_pago::create([
                'contrato_id' => $idcontrato,
                'concepto' => $request->concepto2,
                'porcentaje' => $request->porcentaje2,
            ]);
        }
        if (isset($request->concepto3)){

            Concepto_pago::create([
                'contrato_id' => $idcontrato,
                'concepto' => $request->concepto3,
                'porcentaje' => $request->porcentaje3,
            ]);
        }
        if (isset($request->concepto4)){

            Concepto_pago::create([
                'contrato_id' => $idcontrato,
                'concepto' => $request->concepto4,
                'porcentaje' => $request->porcentaje4,
            ]);
        }
        if (isset($request->concepto5)){

            Concepto_pago::create([
                'contrato_id' => $idcontrato,
                'concepto' => $request->concepto5,
                'porcentaje' => $request->porcentaje5,
            ]);
        }
        if (isset($request->concepto6)){

            Concepto_pago::create([
                'contrato_id' => $idcontrato,
                'concepto' => $request->concepto6,
                'porcentaje' => $request->porcentaje6,
            ]);
        }


    return redirect('ventas/contrato')->with('mensaje', 'Contrato creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
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
        $contrato = Contrato::findOrFail($id);
        $conceptos = Concepto_pago::orderBy('id')->where('contrato_id', $id)->pluck('concepto')->toArray();
        $porcentajes = Concepto_pago::orderBy('id')->where('contrato_id', $id)->pluck('porcentaje')->toArray();
        $servicios = Servicio::orderBy('id')->get();
        $empresas = Empresa::orderBy('id')->get();
        $equipos= Equipo::orderBy('id')->get();
        return view('dinamica.ventas.contrato.editar', compact('contrato','conceptos', 'porcentajes', 'servicios', 'empresas', 'equipos'));
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
        Contrato::findOrFail($id)->update([
            'servicio_id' => $request->servicio_id,
            'empresa_id' => $request->empresa_id,
            'equipo_id' => $request->equipo_id,
            'horas' => $request->horas,
            'costo_sin_igv' => $request->costo_sin_igv,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            // 'estado' => $request->estado,
            'observacion' => $request->observacion,
        ]);
        $conceptos = Concepto_pago::orderBy('id')->where('contrato_id', $id)->pluck('concepto')->toArray();
        $porcentajes = Concepto_pago::orderBy('id')->where('contrato_id', $id)->pluck('porcentaje')->toArray();
        $conceptos_pago = Concepto_pago::orderBy('id')->where('contrato_id', $id)->pluck('id')->toArray();

        if (isset($conceptos[0])) {
            if (isset($request->concepto1)) {
                Concepto_pago::findOrFail($conceptos_pago[0])->update([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto1,
                    'porcentaje' => $request->porcentaje1,
                ]);
            } else {
                Concepto_pago::destroy($conceptos_pago[0]);
            }

        } else {
            if (isset($request->concepto1)) {
                Concepto_pago::create([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto1,
                    'porcentaje' => $request->porcentaje1,
                ]);
            } else {
                # code...
            }

        }

        if (isset($conceptos[1])) {
            if (isset($request->concepto2)) {
                Concepto_pago::findOrFail($conceptos_pago[1])->update([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto2,
                    'porcentaje' => $request->porcentaje2,
                ]);
            } else {
                Concepto_pago::destroy($conceptos_pago[1]);
            }

        } else {
            if (isset($request->concepto2)) {
                Concepto_pago::create([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto2,
                    'porcentaje' => $request->porcentaje2,
                ]);
            } else {
                # code...
            }

        }

        if (isset($conceptos[2])) {
            if (isset($request->concepto3)) {
                Concepto_pago::findOrFail($conceptos_pago[2])->update([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto3,
                    'porcentaje' => $request->porcentaje3,
                ]);
            } else {
                Concepto_pago::destroy($conceptos_pago[2]);
            }

        } else {
            if (isset($request->concepto3)) {
                Concepto_pago::create([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto3,
                    'porcentaje' => $request->porcentaje3,
                ]);
            } else {
                # code...
            }

        }

        if (isset($conceptos[3])) {
            if (isset($request->concepto4)) {
                Concepto_pago::findOrFail($conceptos_pago[3])->update([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto4,
                    'porcentaje' => $request->porcentaje4,
                ]);
            } else {
                Concepto_pago::destroy($conceptos_pago[3]);
            }

        } else {
            if (isset($request->concepto4)) {
                Concepto_pago::create([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto4,
                    'porcentaje' => $request->porcentaje4,
                ]);
            } else {
                # code...
            }

        }

        if (isset($conceptos[4])) {
            if (isset($request->concepto5)) {
                Concepto_pago::findOrFail($conceptos_pago[4])->update([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto5,
                    'porcentaje' => $request->porcentaje5,
                ]);
            } else {
                Concepto_pago::destroy($conceptos_pago[4]);
            }

        } else {
            if (isset($request->concepto5)) {
                Concepto_pago::create([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto5,
                    'porcentaje' => $request->porcentaje5,
                ]);
            } else {
                # code...
            }

        }

        if (isset($conceptos[5])) {
            if (isset($request->concepto6)) {
                Concepto_pago::findOrFail($conceptos_pago[5])->update([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto6,
                    'porcentaje' => $request->porcentaje6,
                ]);
            } else {
                Concepto_pago::destroy($conceptos_pago[5]);
            }

        } else {
            if (isset($request->concepto6)) {
                Concepto_pago::create([
                    'contrato_id' => $id,
                    'concepto' => $request->concepto6,
                    'porcentaje' => $request->porcentaje6,
                ]);
            } else {
                # code...
            }

        }


    return redirect('ventas/contrato')->with('mensaje', 'Contrato actualizado con éxito');

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
            if (Concepto_pago::where('contrato_id',$id)->delete()) {
                if (Contrato::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                }

            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function finalizar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Contrato::findOrFail($id)->update(['estado' => "cerrado" ])) {
                return response()->json(['mensaje' => 'ok','id'=>$id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function retomar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Contrato::findOrFail($id)->update(['estado' => "abierto" ])) {
                return response()->json(['mensaje' => 'ok', 'id'=>$id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
