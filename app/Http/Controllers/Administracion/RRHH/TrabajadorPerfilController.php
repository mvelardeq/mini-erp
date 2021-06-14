<?php

namespace App\Http\Controllers\Administracion\RRHH;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ascenso_trabajador;
use App\Models\Admin\Cargo_trabajador;
use App\Models\Operaciones\Ot;
use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $trabajador = Trabajador::with('ascensos')->findOrFail($id);
        $cargo_trabajador = Cargo_trabajador::get();

        return view('dinamica.administracion.rrhh.trabajador.perfilTrabajador.index', compact('data', 'ascensos', 'trabajador','cargo_trabajador'));
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
                        $evento->push(['start'=>$ot->fecha .' 01:00','color'=>'#DCA606', 'title'=>'adelanto '.$ot->adelanto_trabajador->pago.' soles', 'url'=>'<div class="card-footer">Se adelantó '.$ot->adelanto_trabajador->pago.' Soles</div>']);
                    }
                    if ($ot->descuento) {
                        $evento->push(['start'=>$ot->fecha .' 01:00','color'=>'#F56954', 'title'=>'descuento de '.$ot->descuento.' soles', 'url'=>'<div class="card-footer">Motivo: '.$ot->motivo_descuento.'</div>']);
                    }
                    if (($ot->gasto_trabajador->estado_gasto->nombre ?? '') == 'Mensual') {
                        $evento->push(['start'=>$ot->fecha .' 01:00','color'=>'#6C757D', 'title'=>'Gasto de '.$ot->gasto_trabajador->tipo_gasto->nombre, 'url'=>'<div class="card-footer">Gasto: '.$ot->gasto_trabajador->pago.' soles</div>']);
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
