<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Operaciones\Ot;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dinamica.usuario.calendario.inicio');
    }

    public function mostrar(){

        $ots = Ot::with('trabajador','actividades', 'adelanto_trabajador','estado_ot')->whereHas('trabajador',function(Builder $query){
            return $query->where('id',Auth::user()->id);
        })->get();

        $evento = collect();

        foreach ($ots as $ot) {
            switch ($ot->estado_ot->nombre) {
                case 'Pendiente':
                    # code...
                    break;
                case 'Aprobado':

                    $lista = '';
                    foreach ($ot->actividades as $ot_actividad) {
                        $lista .=   '<div class="card-comment">
                                        <div class="comment-text pl-0">
                                            <span class="username">
                                                <span class="text-muted float-right">
                                                '.$ot_actividad->pivot->horas.' horas
                                                </span>
                                            </span>

                                            '.$ot_actividad->nombre.'
                                        </div>
                                    </div>';
                    }
                    $actividades = '<div class="card-footer">'.$lista.'</div>';
                    $evento->push(['start'=>$ot->fecha,'color'=>'#228E3B', 'title'=>$ot->contrato->equipo->obra->nombre, 'url'=>$actividades]);
                    break;
                case 'Falta':
                    $evento->push(['start'=>$ot->fecha,'color'=>'red', 'title'=>$ot->contrato->equipo->obra->nombre, 'url'=>'se registró la falta']);
                    break;

                default:
                    # code...
                    break;
            }
            if ($ot->adelanto_trabajador) {
                $evento->push(['start'=>$ot->fecha .' 01:00','color'=>'#DCA606', 'title'=>'adelanto '.$ot->adelanto_trabajador->pago.' soles', 'url'=>'<div class="card-footer">Se adelantó '.$ot->adelanto_trabajador->pago.' Soles</div>']);

            }
    }

        return response()->json($evento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
