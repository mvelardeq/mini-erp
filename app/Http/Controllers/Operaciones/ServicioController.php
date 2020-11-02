<?php

namespace App\Http\Controllers\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Operaciones\Actividad;
use App\Models\Operaciones\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios= Servicio::with('actividades')->orderBy('id')->get();
        return view('dinamica.operaciones.servicio.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $servicios= Servicio::with('actividades')->orderBy('id')->get();
        $actividades= Actividad::orderBy('id')->get();
        return  view('dinamica.operaciones.servicio.crear',compact('servicios', 'actividades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
            Servicio::create([
            'nombre' => $request->nombre,
            'observacion' => $request->observacion,
            ]);

            $idservicio = Servicio::orderBy('created_at', 'desc')->first()->id;

            Actividad::create([
                'servicio_id' => $idservicio,
                'nombre' => $request->actividad1,
            ]);

            if ($request->actividad2){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad2,
                ]);
            }
            if ($request->actividad3){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad3,
                ]);
            }
            if ($request->actividad4){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad4,
                ]);
            }
            if ($request->actividad5){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad5,
                ]);
            }
            if ($request->actividad6){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad6,
                ]);
            }
            if ($request->actividad7){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad7,
                ]);
            }
            if ($request->actividad8){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad8,
                ]);
            }
            if ($request->actividad9){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad9,
                ]);
            }
            if ($request->actividad10){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad10,
                ]);
            }
            if ($request->actividad11){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad11,
                ]);
            }
            if ($request->actividad12){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad12,
                ]);
            }
            if ($request->actividad13){

                Actividad::create([
                    'servicio_id' => $idservicio,
                    'nombre' => $request->actividad13,
                ]);
            }

        return redirect('operaciones/servicio')->with('mensaje', 'Servicio creadao con éxito');
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
        $servicio = Servicio::findOrFail($id);
        $actividades = Actividad::orderBy('id')->where('servicio_id', $id)->pluck('nombre')->toArray();
        return view('dinamica.operaciones.servicio.editar', compact('servicio','actividades'));
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
        Servicio::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'observacion' => $request->observacion,
        ]);
        $actividades = Actividad::orderBy('id')->where('servicio_id', $id)->pluck('id')->toArray();

        if (isset($actividades[0])) {
            if (isset($request->actividad1)) {
                Actividad::findOrFail($actividades[0])->update([
                    'nombre' => $request->actividad1,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[0]);
            }

        } else {
            if (isset($request->actividad1)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad1,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[1])) {
            if (isset($request->actividad2)) {
                Actividad::findOrFail($actividades[1])->update([
                    'nombre' => $request->actividad2,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[1]);
            }

        } else {
            if (isset($request->actividad2)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad2,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[2])) {
            if (isset($request->actividad3)) {
                Actividad::findOrFail($actividades[2])->update([
                    'nombre' => $request->actividad3,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[2]);
            }

        } else {
            if (isset($request->actividad3)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad3,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[3])) {
            if (isset($request->actividad4)) {
                Actividad::findOrFail($actividades[3])->update([
                    'nombre' => $request->actividad4,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[3]);
            }

        } else {
            if (isset($request->actividad4)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad4,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[4])) {
            if (isset($request->actividad5)) {
                Actividad::findOrFail($actividades[4])->update([
                    'nombre' => $request->actividad5,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[4]);
            }

        } else {
            if (isset($request->actividad5)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad5,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[5])) {
            if (isset($request->actividad6)) {
                Actividad::findOrFail($actividades[5])->update([
                    'nombre' => $request->actividad6,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[5]);
            }

        } else {
            if (isset($request->actividad6)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad6,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[6])) {
            if (isset($request->actividad7)) {
                Actividad::findOrFail($actividades[6])->update([
                    'nombre' => $request->actividad1,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[6]);
            }

        } else {
            if (isset($request->actividad7)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad7,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[7])) {
            if (isset($request->actividad8)) {
                Actividad::findOrFail($actividades[7])->update([
                    'nombre' => $request->actividad8,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[7]);
            }

        } else {
            if (isset($request->actividad8)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad8,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[8])) {
            if (isset($request->actividad9)) {
                Actividad::findOrFail($actividades[8])->update([
                    'nombre' => $request->actividad9,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[8]);
            }

        } else {
            if (isset($request->actividad9)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad9,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[9])) {
            if (isset($request->actividad10)) {
                Actividad::findOrFail($actividades[9])->update([
                    'nombre' => $request->actividad10,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[9]);
            }

        } else {
            if (isset($request->actividad10)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad10,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[10])) {
            if (isset($request->actividad11)) {
                Actividad::findOrFail($actividades[10])->update([
                    'nombre' => $request->actividad11,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[10]);
            }

        } else {
            if (isset($request->actividad11)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad11,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[11])) {
            if (isset($request->actividad12)) {
                Actividad::findOrFail($actividades[11])->update([
                    'nombre' => $request->actividad12,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[11]);
            }

        } else {
            if (isset($request->actividad12)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad12,
                ]);
            } else {
                # code...
            }

        }



        if (isset($actividades[12])) {
            if (isset($request->actividad13)) {
                Actividad::findOrFail($actividades[12])->update([
                    'nombre' => $request->actividad13,
                ]);
            } else {
                // Actividad::where('servicio_id',$id)->delete()
                Actividad::destroy($actividades[12]);
            }

        } else {
            if (isset($request->actividad13)) {
                Actividad::create([
                    'servicio_id' => $id,
                    'nombre' => $request->actividad13,
                ]);
            } else {
                # code...
            }

        }



        return redirect('operaciones/servicio')->with('mensaje', 'Servicio actualizado con éxito');
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
            if (Actividad::where('servicio_id',$id)->delete()) {
                if (Servicio::destroy($id)) {
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
