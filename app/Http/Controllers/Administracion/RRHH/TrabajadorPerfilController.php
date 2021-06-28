<?php

namespace App\Http\Controllers\Administracion\RRHH;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ascenso_trabajador;
use App\Models\Admin\Cargo_trabajador;
use App\Models\Admin\Obs_trabajador;
use App\Models\Admin\Periodo_trabajador;
use App\Models\Operaciones\Ot;
use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TrabajadorPerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Trabajador::with('roles:id,nombre', 'observaciones', 'periodos', 'ascensos')->findOrFail($id);
        $ascensos = Ascenso_trabajador::with('cargo')->where('trabajador_id', $id)->get();
        $periodos = Periodo_trabajador::where('trabajador_id',$id)->get();
        $observaciones = Obs_trabajador::where('trabajador_id',$id)->get();
        $eventos = collect();

        foreach ($periodos as $periodo) {
            if (isset($periodo->fecha_fin)) {
                $eventos->push(['tipo'=>'fin_periodo','fecha'=>$periodo->fecha_fin,'titulo'=>'Desvinculación laboral','observacion'=>null,'foto'=>null, 'pago'=>null,'cargo'=>null]);
            }
        }
        foreach ($observaciones as $observacion) {
            $eventos->push(['tipo'=>'observacion_trabajador','fecha'=>$observacion->fecha,'titulo'=>'Se hizo una observación al trabajador','observacion'=>$observacion->observacion,'foto'=>$observacion->foto, 'pago'=>null,'cargo'=>null]);
        }
        foreach ($ascensos as $ascenso) {
            if ($periodos =Periodo_trabajador::where('trabajador_id',$id)->where('fecha_inicio',$ascenso->fecha)->first()) {
                $eventos->push(['tipo'=>'contrato_trabajador','fecha'=>$ascenso->fecha,'titulo'=>'Se contrató al trabajador','observacion'=>$ascenso->observacion,'foto'=>null, 'pago'=>$ascenso->sueldo,'cargo'=>$ascenso->cargo->nombre]);
            }else {
                $eventos->push(['tipo'=>'ascenso_trabajador','fecha'=>$ascenso->fecha,'titulo'=>'Se ascendió al trabajador','observacion'=>$ascenso->observacion,'foto'=>null, 'pago'=>$ascenso->sueldo,'cargo'=>$ascenso->cargo->nombre]);
            }
        }

        $events = $eventos->sortByDesc('fecha');
        // return dd($events);

        return view('dinamica.administracion.rrhh.trabajador.perfilTrabajador.index', compact('data', 'ascensos','events'));
    }

    public function mostrarc($id){
        $ots = Ot::with('trabajador','actividades','contrato', 'adelanto_trabajador','estado_ot', 'gasto_trabajador')->whereHas('trabajador',function(Builder $query) use($id){
            global $var;
            return $query->where('id',$id);
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

}
