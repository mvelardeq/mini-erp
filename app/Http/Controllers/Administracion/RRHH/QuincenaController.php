<?php

namespace App\Http\Controllers\Administracion\RRHH;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ascenso_trabajador;
use App\Models\Operaciones\Ot;
use App\Models\Seguridad\Trabajador;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuincenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($id,$periodo)
    {
        $trabajador = Trabajador::findOrFail($id);
        $month = Carbon::create($periodo)->isoFormat('MM');
        $year = Carbon::create($periodo)->isoFormat('YYYY');
        $inicio = Carbon::create($periodo)->startOfMonth();
        $fin =Carbon::create($periodo);

        // Cálculo sueldo
        $ascensos = Ascenso_trabajador::where('trabajador_id',$id)->orderBy('fecha','asc')->get();
        $array_ascensos = array();
        foreach ($ascensos as $ascenso) {
            array_push($array_ascensos,$ascenso->fecha);
        }
        $periodos_ascensos = collect();
        $indice=0;
        foreach ($ascensos as $ascenso) {
            if (isset($array_ascensos[$indice+1])) {
                $periodos_ascensos->push(['sueldo'=>$ascenso->sueldo,'inicio'=>$ascenso->fecha,'fin'=>$array_ascensos[$indice+1]]);
            }else{
                $periodos_ascensos->push(['sueldo'=>$ascenso->sueldo,'inicio'=>$ascenso->fecha,'fin'=>'final']);
            }
            $indice++;
        }

        foreach ($periodos_ascensos as $periodo_ascenso) {
            if ($periodo_ascenso['fin']=='final' && $inicio>=$periodo_ascenso['inicio']) {
                $sueldo = $periodo_ascenso['sueldo'];
            }
            if($inicio>=$periodo_ascenso['inicio'] && $fin<=$periodo_ascenso['fin']){
                $sueldo = $periodo_ascenso['sueldo'];
            }
        }

        // Costo Hora
        $costo_hora = $sueldo/(30*8);

        // return $sueldo;

        // primeras 2 horas extras = 25%
        // a partir de la 3era hora extra =35%
        $horas_nor = collect();
        $horas_25p= collect();
        $horas_35p = collect();

        $ots_horas = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('ot_actividad', 'ot.id','=','ot_actividad.ot_id')->select(DB::raw('SUM(horas) as horas_totales'),'fecha')->groupBy('fecha')->get();
        $gastos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('gasto_trabajador','ot.id','=','gasto_trabajador.ot_id')->join('estado_gasto','gasto_trabajador.estado_gasto_id','=','estado_gasto.id')->where('nombre','Mensual')->get();
        $adelantos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('adelanto_trabajador','ot.id','=','adelanto_trabajador.ot_id')->get();

        for ($i=1; $i <=15 ; $i++) {
            if($ots_horas->where('fecha',Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'))->count()>0){
                $otsDia = $ots_horas->where('fecha',Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'))->first();

                if($otsDia->horas_totales<=8){
                    $horas_nor->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>$otsDia->horas_totales]);
                }
                if ($otsDia->horas_totales>8 && $otsDia->horas_totales<11) {
                    $horas_nor->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>8]);
                    $horas_25p->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>($otsDia->horas_totales-8)]);
                }
                if ($otsDia->horas_totales>=11) {
                    $horas_nor->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>8]);
                    $horas_25p->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>2]);
                    $horas_35p->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>($otsDia->horas_totales-10)]);
                }
            }
        }

        // return dd($horas_nor->sum('horas'));
        return view('dinamica.administracion.rrhh.boleta-pago.crearquincena',compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request,$id,$periodo)
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