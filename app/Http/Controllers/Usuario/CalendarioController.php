<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Operaciones\Ot;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $ots = Ot::with('trabajador','actividades','contrato', 'adelanto_trabajador','estado_ot', 'gasto_trabajador')->whereHas('trabajador',function(Builder $query){
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

                    if ($ot->adelanto_trabajador) {
                        $evento->push(['start'=>$ot->fecha .' 01:00','color'=>'#DCA606', 'title'=>'Adelanto '.$ot->adelanto_trabajador->pago.' soles', 'url'=>'<div class="card-footer">Se adelantó '.$ot->adelanto_trabajador->pago.' Soles</div>']);
                    }
                    if ($ot->descuento) {
                        $evento->push(['start'=>$ot->fecha .' 01:00','color'=>'#F56954', 'title'=>'Descuento de '.$ot->descuento.' soles', 'url'=>'<div class="card-footer">Motivo: '.$ot->motivo_descuento.'</div>']);
                    }
                    if (($ot->gasto_trabajador->estado_gasto->nombre ?? '') == 'Mensual') {
                        $evento->push(['start'=>$ot->fecha .' 01:00','color'=>'#6C757D', 'title'=>'Gasto de '.$ot->gasto_trabajador->tipo_gasto->nombre, 'url'=>'<div class="card-footer">Gasto: '.$ot->gasto_trabajador->pago.' soles</div>']);
                    }

                    if ($ot->fotos) {

                        $lista_fotos ='';
                        foreach ($ot->fotos as $ot_foto) {
                            $lista_fotos .= '<img src="'.Storage::disk('s3')->url("photos/otPhoto/".$ot_foto->foto).'" alt="..." class="img-fluid pad mx-auto d-block pb-2" >';
                        }
                    $lista_final = '<div class="timeline-item row">

                            <h6>'.$ot->contrato->equipo->obra->nombre.'</h6>
                          <div class="timeline-body col-12">'.$lista_fotos.'</div>
                        </div>';

                        $evento->push(['start'=>$ot->fecha .' 0'.$ot->fotos->count().':00','color'=>'#6F42C1', 'title'=>'Fotos', 'url'=>'<div class="card-footer">'.$lista_final.'</div>']);
                    }

                    break;

                case 'Falta':
                    $evento->push(['start'=>$ot->fecha,'color'=>'#BB2D3A', 'title'=>$ot->contrato->equipo->obra->nombre, 'url'=>'<div class="card-footer">Se registró la falta</div>']);
                    break;

                default:
                    # code...
                    break;
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
