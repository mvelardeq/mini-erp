<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Models\Ventas\Cotizacion;
use App\Models\Operaciones\Equipo;
use App\Models\Ventas\Linea_cotizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones= Cotizacion::with('lineas_cotizacion','equipo')->orderBy('fecha','desc')->get();

        return view('dinamica.ventas.cotizacion.index',compact('cotizaciones'));

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadView('dinamica.ventas.cotizacion.pdf5',compact('cotizaciones'));
        // return $pdf->stream();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $cotizaciones= Cotizacion::with('lineas_cotizacion')->orderBy('id')->get();
        $lineas_cotizacion= Linea_cotizacion::orderBy('id')->get();
        $equipos= Equipo::orderBy('id')->get();
        return  view('dinamica.ventas.cotizacion.crear',compact('cotizaciones', 'lineas_cotizacion', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $equipo = Equipo::with('obra')->findOrFail($request->equipo_id);
        Cotizacion::create([
            'equipo_id' => $request->equipo_id,
            'numero' => $request->numero,
            'resumen' => $request->resumen,
            'fecha' => $request->fecha,
            'dirigido_a' => $request->dirigido_a,
            'pdf' =>'Cotización_'.$request->numero.'_obra_'.$equipo->obra->nombre.'_'.$request->resumen.'.pdf',
            ]);

            $idcotizacion= Cotizacion::orderBy('created_at', 'desc')->first()->id;

            Linea_cotizacion::create([
                'cotizacion_id' => $idcotizacion,
                'descripcion' => $request->descripcion1,
                'cantidad' => $request->cantidad1,
                'subtotal' => $request->subtotal1,
            ]);

            if (isset($request->descripcion2)){

                Linea_cotizacion::create([
                    'cotizacion_id' => $idcotizacion,
                    'descripcion' => $request->descripcion2,
                    'cantidad' => $request->cantidad2,
                    'subtotal' => $request->subtotal2,
                ]);
            }
            if (isset($request->descripcion3)){

                Linea_cotizacion::create([
                    'cotizacion_id' => $idcotizacion,
                    'descripcion' => $request->descripcion3,
                    'cantidad' => $request->cantidad3,
                    'subtotal' => $request->subtotal3,
                ]);
            }
            if (isset($request->descripcion4)){

                Linea_cotizacion::create([
                    'cotizacion_id' => $idcotizacion,
                    'descripcion' => $request->descripcion4,
                    'cantidad' => $request->cantidad4,
                    'subtotal' => $request->subtotal4,
                ]);
            }
            if (isset($request->descripcion5)){

                Linea_cotizacion::create([
                    'cotizacion_id' => $idcotizacion,
                    'descripcion' => $request->descripcion5,
                    'cantidad' => $request->cantidad5,
                    'subtotal' => $request->subtotal5,
                ]);
            }
            if (isset($request->descripcion6)){

                Linea_cotizacion::create([
                    'cotizacion_id' => $idcotizacion,
                    'descripcion' => $request->descripcion6,
                    'cantidad' => $request->cantidad6,
                    'subtotal' => $request->subtotal6,
                ]);
            }


            $lineas_cotizacion = Linea_cotizacion::where('cotizacion_id',$idcotizacion)->orderBy('id')->get();
            $cotizacion_total = Cotizacion::join('linea_cotizacion','cotizacion_id','=','cotizacion.id')->where('cotizacion_id',$idcotizacion)->select(DB::raw('SUM(cantidad*subtotal) as total'))->first();
            $cotizacion = Cotizacion::with('equipo')->findOrFail($idcotizacion);

            $pdf = App::make('dompdf.wrapper');
            $content = $pdf->loadView('dinamica.ventas.cotizacion.pdf3', compact('cotizacion','lineas_cotizacion','cotizacion_total'))->output();

            // $name = 'Cotización '.$cotizacion->numero.' obra '.$cotizacion->equipo->obra->nombre.' '.$cotizacion->resumen.'.pdf';
            Cotizacion::setQuotation($content,$cotizacion->pdf);

        return redirect('ventas/cotizacion')->with('mensaje', 'Cotización creada con éxito');
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
        $cotizacion = Cotizacion::findOrFail($id);
        $descripciones = Linea_cotizacion::orderBy('id')->where('cotizacion_id', $id)->pluck('descripcion')->toArray();
        $cantidades = Linea_cotizacion::orderBy('id')->where('cotizacion_id', $id)->pluck('cantidad')->toArray();
        $subtotales = Linea_cotizacion::orderBy('id')->where('cotizacion_id', $id)->pluck('subtotal')->toArray();
        $equipos= Equipo::orderBy('id')->get();
        return view('dinamica.ventas.cotizacion.editar', compact('cotizacion','descripciones', 'cantidades', 'subtotales', 'equipos'));
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
        $equipo = Equipo::with('obra')->findOrFail($request->equipo_id);
        $name = Cotizacion::findOrFail($id)->pdf;
        Cotizacion::findOrFail($id)->update([
            'equipo_id' => $request->equipo_id,
            'numero' => $request->numero,
            'resumen' => $request->resumen,
            'fecha' => $request->fecha,
            'dirigido_a' => $request->dirigido_a,
            'pdf' =>'Cotización_'.$request->numero.'_obra_'.$equipo->obra->nombre.'_'.$request->resumen.'.pdf',

        ]);
        $descripciones = Linea_cotizacion::orderBy('id')->where('cotizacion_id', $id)->pluck('descripcion')->toArray();
        $subtotales = Linea_cotizacion::orderBy('id')->where('cotizacion_id', $id)->pluck('subtotal')->toArray();
        $lineas_cotizacion = Linea_cotizacion::orderBy('id')->where('cotizacion_id', $id)->pluck('id')->toArray();

        if (isset($descripciones[0])) {
            if (isset($request->descripcion1)) {
                Linea_cotizacion::findOrFail($lineas_cotizacion[0])->update([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion1,
                    'cantidad'=> $request->cantidad1,
                    'subtotal' => $request->subtotal1,
                ]);
            } else {
                Linea_cotizacion::destroy($lineas_cotizacion[0]);
            }

        } else {
            if (isset($request->descripcion1)) {
                Linea_cotizacion::create([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion1,
                    'cantidad'=> $request->cantidad1,
                    'subtotal' => $request->subtotal1,
                ]);
            } else {
                # code...
            }

        }


        if (isset($descripciones[2])) {
            if (isset($request->descripcion2)) {
                Linea_cotizacion::findOrFail($lineas_cotizacion[1])->update([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion2,
                    'cantidad'=> $request->cantidad2,
                    'subtotal' => $request->subtotal2,
                ]);
            } else {
                Linea_cotizacion::destroy($lineas_cotizacion[1]);
            }

        } else {
            if (isset($request->descripcion2)) {
                Linea_cotizacion::create([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion2,
                    'cantidad'=> $request->cantidad2,
                    'subtotal' => $request->subtotal2,
                ]);
            } else {
                # code...
            }

        }


        if (isset($descripciones[2])) {
            if (isset($request->descripcion3)) {
                Linea_cotizacion::findOrFail($lineas_cotizacion[2])->update([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion3,
                    'cantidad'=> $request->cantidad3,
                    'subtotal' => $request->subtotal3,
                ]);
            } else {
                Linea_cotizacion::destroy($lineas_cotizacion[2]);
            }

        } else {
            if (isset($request->descripcion3)) {
                Linea_cotizacion::create([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion3,
                    'cantidad'=> $request->cantidad3,
                    'subtotal' => $request->subtotal3,
                ]);
            } else {
                # code...
            }

        }


        if (isset($descripciones[3])) {
            if (isset($request->descripcion4)) {
                Linea_cotizacion::findOrFail($lineas_cotizacion[3])->update([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion4,
                    'cantidad'=> $request->cantidad4,
                    'subtotal' => $request->subtotal4,
                ]);
            } else {
                Linea_cotizacion::destroy($lineas_cotizacion[3]);
            }

        } else {
            if (isset($request->descripcion4)) {
                Linea_cotizacion::create([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion4,
                    'cantidad'=> $request->cantidad4,
                    'subtotal' => $request->subtotal4,
                ]);
            } else {
                # code...
            }

        }


        if (isset($descripciones[4])) {
            if (isset($request->descripcion5)) {
                Linea_cotizacion::findOrFail($lineas_cotizacion[4])->update([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion5,
                    'cantidad'=> $request->cantidad5,
                    'subtotal' => $request->subtotal5,
                ]);
            } else {
                Linea_cotizacion::destroy($lineas_cotizacion[4]);
            }

        } else {
            if (isset($request->descripcion5)) {
                Linea_cotizacion::create([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion5,
                    'cantidad'=> $request->cantidad5,
                    'subtotal' => $request->subtotal5,
                ]);
            } else {
                # code...
            }

        }


        if (isset($descripciones[5])) {
            if (isset($request->descripcion6)) {
                Linea_cotizacion::findOrFail($lineas_cotizacion[5])->update([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion6,
                    'cantidad'=> $request->cantidad6,
                    'subtotal' => $request->subtotal6,
                ]);
            } else {
                Linea_cotizacion::destroy($lineas_cotizacion[5]);
            }

        } else {
            if (isset($request->descripcion6)) {
                Linea_cotizacion::create([
                    'cotizacion_id' => $id,
                    'descripcion' => $request->descripcion6,
                    'cantidad'=> $request->cantidad6,
                    'subtotal' => $request->subtotal6,
                ]);
            } else {
                # code...
            }

        }

        $lineas_cotizacion = Linea_cotizacion::where('cotizacion_id',$id)->orderBy('id')->get();
        $cotizacion_total = Cotizacion::join('linea_cotizacion','cotizacion_id','=','cotizacion.id')->where('cotizacion_id',$id)->select(DB::raw('SUM(cantidad*subtotal) as total'))->first();
        $cotizacion = Cotizacion::with('equipo')->findOrFail($id);

        $pdf = App::make('dompdf.wrapper');
        $content = $pdf->loadView('dinamica.ventas.cotizacion.pdf3', compact('cotizacion','lineas_cotizacion','cotizacion_total'))->output();

        Cotizacion::setQuotation($content,$cotizacion->pdf, $name);

        return redirect('ventas/cotizacion')->with('mensaje', 'Cotización actualizada con éxito');

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
            $name = Cotizacion::findOrFail($id)->pdf;
            if (Linea_cotizacion::where('cotizacion_id',$id)->delete()) {
                if (Cotizacion::destroy($id)) {
                    Storage::disk('s3')->delete("files/quotation/$name");
                    return response()->json(['mensaje' => 'ok']);
                }

            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
