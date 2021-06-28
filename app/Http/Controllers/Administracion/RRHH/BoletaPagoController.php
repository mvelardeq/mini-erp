<?php

namespace App\Http\Controllers\Administracion\RRHH;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionBoletaPago;
use App\Http\Requests\ValidacionQuincena;
use App\Models\Admin\Ascenso_trabajador;
use App\Models\Admin\Periodo_trabajador;
use App\Models\Administracion\RRHH\BoletaPago;
use App\Models\Administracion\RRHH\Quincena;
use App\Models\Finanzas\Contabilidad\Asiento_contable;
use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use App\Models\Finanzas\Contabilidad\Cuenta_contable;
use App\Models\Operaciones\Ot;
use App\Models\Seguridad\Trabajador;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class BoletaPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-boletas');
        $year =Carbon::now()->year;
        $trabajadores = Trabajador::with('quincena','boleta_pago')->join('periodo_trabajador','trabajador.id','=','periodo_trabajador.trabajador_id')->where('fecha_fin',null)->get();

        return view('dinamica.administracion.rrhh.boleta-pago.index',compact('year','trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function isTecnico($trabajador){
        $roles = $trabajador->roles;
        // return dd($roles);
        $tecnico = false;
        foreach ($roles as $rol) {
            if($rol->nombre == 'técnico')
            {
                $tecnico = true;
                break;
            }
        }
        return $tecnico;
     }

     public function hasAscensos($idTrabajador){
        $ascensos = Ascenso_trabajador::where('trabajador_id',$idTrabajador)->orderBy('fecha','asc')->get();
        $hasascenso = true;
        if ($ascensos->isEmpty()) {
            $hasascenso=false;
        }
        return $hasascenso;
     }

     public function hasOts($idTrabajador,$periodo){
        $inicio = Carbon::create($periodo)->startOfMonth();
        $fin =Carbon::create($periodo);
        $ots_horas = Ot::with('actividades')->where('trabajador_id',$idTrabajador)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('ot_actividad', 'ot.id','=','ot_actividad.ot_id')->select(DB::raw('SUM(horas) as horas_totales'),'fecha')->groupBy('fecha')->get();
        $hasots = true;
        if ($ots_horas->isEmpty()) {
            $hasots = false;
        }
        return $hasots;
     }

     public function sueldo($idTrabajador,$periodo){
        $inicio = Carbon::create($periodo)->startOfMonth();
        $fin =Carbon::create($periodo);
        // Cálculo sueldo
        $ascensos = Ascenso_trabajador::where('trabajador_id',$idTrabajador)->orderBy('fecha','asc')->get();
        $periodos = Periodo_trabajador::where('trabajador_id',$idTrabajador)->orderBy('fecha_inicio')->get();

        $array_ascensos = array();
        foreach ($ascensos as $ascenso) {
            array_push($array_ascensos,$ascenso->fecha);
        }
        $periodos_ascensos = collect();
        $indice=0;
        foreach ($ascensos as $ascenso) {
            $inicio_periodo = false;
            foreach ($periodos as $periodo) {
                if ($periodo->fecha_inicio == $ascenso->fecha) {
                    $inicio_periodo=true;
                    break;
                }
            }
            if (isset($array_ascensos[$indice+1])) {
                $periodos_ascensos->push(['sueldo'=>$ascenso->sueldo,'inicio'=>$ascenso->fecha,'fin'=>$array_ascensos[$indice+1],'inicio_periodo'=>$inicio_periodo]);
            }else{
                $periodos_ascensos->push(['sueldo'=>$ascenso->sueldo,'inicio'=>$ascenso->fecha,'fin'=>'final','inicio_periodo'=>$inicio_periodo]);
            }
            $indice++;
        }

        foreach ($periodos_ascensos as $periodo_ascenso) {

                if ($periodo_ascenso['inicio_periodo'] && $inicio<=$periodo_ascenso['inicio'] && $fin>=$periodo_ascenso['inicio']) {
                    $sueldo = $periodo_ascenso['sueldo'];
                    break;
                }
                if ($periodo_ascenso['fin']=='final' && $inicio>=$periodo_ascenso['inicio']) {
                    $sueldo = $periodo_ascenso['sueldo'];
                    break;
                }
                if($inicio>=$periodo_ascenso['inicio'] && $fin<=$periodo_ascenso['fin']){
                    $sueldo = $periodo_ascenso['sueldo'];
                    break;
                }
        }
        return $sueldo;
     }

     public function numero_domingos($periodo,$idTrabajador){

        $year = Carbon::create($periodo)->isoFormat('YYYY');
        $month = Carbon::create($periodo)->isoFormat('MM');
        $inicio = Carbon::create($periodo)->startOfMonth();
        $fin =Carbon::create($periodo);

        $ots_horas = Ot::with('actividades')->where('trabajador_id',$idTrabajador)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('ot_actividad', 'ot.id','=','ot_actividad.ot_id')->select(DB::raw('SUM(horas) as horas_totales'),'fecha')->groupBy('fecha')->get();
         // Calculos de domingos considerados
        for ($i=1; $i <=15 ; $i++) {
            if($ots_horas->where('fecha',Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'))->count()>0){
                $inicio_ots =$i;
                break;
            }
        }
        for ($i=15; $i >=1 ; $i--) {
            if($ots_horas->where('fecha',Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'))->count()>0){
                $fin_ots =$i;
                break;
            }
        }
        $numero_domingos = 0;
        for ($i=$inicio_ots; $i <=$fin_ots ; $i++) {
            if(Carbon::create($year,$month,$i)->isoFormat('dddd')=='domingo'){
                $numero_domingos = $numero_domingos+1;
            }
        }
        return $numero_domingos;
     }

     public function boleta($dias,$idTrabajador,$periodo){
        $inicio = Carbon::create($periodo)->startOfMonth();
        $fin =Carbon::create($periodo);
        $month = Carbon::create($periodo)->isoFormat('MM');
        $year = Carbon::create($periodo)->isoFormat('YYYY');
        $dias_tra = 0;
        $dias_noc=collect();
        $horas_dob=collect();
        $horas_nor = collect();
        $horas_25p= collect();
        $horas_35p = collect();
        $ots_horas = Ot::with('actividades')->where('trabajador_id',$idTrabajador)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('ot_actividad', 'ot.id','=','ot_actividad.ot_id')->select(DB::raw('SUM(horas) as horas_totales'),'fecha')->groupBy('fecha')->get();

        for ($i=1; $i <=$dias ; $i++) {
            if($ots_horas->where('fecha',Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'))->count()>0){
                $otsDia = $ots_horas->where('fecha',Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'))->first();

                if (Carbon::create($year,$month,$i)->isoFormat('dddd')=='domingo') {
                    $horas_dob->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>$otsDia->horas_totales]);
                }else{
                    if($otsDia->horas_totales<=8){
                        $dias_tra=$dias_tra+1;
                        $horas_nor->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>$otsDia->horas_totales]);
                    }
                    if ($otsDia->horas_totales>8 && $otsDia->horas_totales<11) {
                        $dias_tra=$dias_tra+1;
                        $horas_nor->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>8]);
                        $horas_25p->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>($otsDia->horas_totales-8)]);
                    }
                    if ($otsDia->horas_totales>=11) {
                        $dias_tra=$dias_tra+1;
                        $horas_nor->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>8]);
                        $horas_25p->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>2]);
                        $horas_35p->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD'),'horas'=>($otsDia->horas_totales-10)]);
                    }
                }

            }else{
                if (Carbon::create($year,$month,$i)->isoFormat('dddd')!='domingo') {
                    $dias_noc->push(['fecha'=>Carbon::create($year,$month,$i)->isoFormat('YYYY-MM-DD')]);
                }
            }
        }
        return array($dias_tra,$dias_noc,$horas_dob,$horas_nor,$horas_25p,$horas_35p);

     }


    public function crearFinDeMes($id,$periodo)
    {
        can('crear-boletas');
        $trabajador = Trabajador::findOrFail($id);
        $inicio = Carbon::create($periodo)->startOfMonth();
        $fin =Carbon::create($periodo);
        $month = Carbon::create($periodo)->isoFormat('MM');
        $year = Carbon::create($periodo)->isoFormat('YYYY');

        $hasAscenso = $this->hasAscensos($id);
        $tecnico = $this->isTecnico($trabajador);
        $sueldo = $this->sueldo($id,$periodo);
        $costo_hora = $sueldo/(30*8);
        $hasOts = $this->hasOts($id,$periodo);

        if($pago_quincena = Quincena::where('trabajador_id',$id)->where('periodo',Carbon::create($year,$month,15)->toDateString())->first()){
            if (!$tecnico) {
                return view('dinamica.administracion.rrhh.boleta-pago.crearboleta',compact('tecnico','trabajador','costo_hora','periodo','pago_quincena'));
            }elseif (!$hasOts) {
                return redirect('administracion/rrhh/boleta-pago')->with('mensaje','El trabajador no tiene actividad en el periodo seleccionado');
            }else{
                $datos = $this->boleta(30,$id,$periodo);
                $dias_tra = $datos[0];
                $dias_noc=$datos[1];
                $horas_dob=$datos[2];
                $horas_nor = $datos[3];
                $horas_25p= $datos[4];
                $horas_35p = $datos[5];
                $gastos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('gasto_trabajador','ot.id','=','gasto_trabajador.ot_id')->join('estado_gasto','gasto_trabajador.estado_gasto_id','=','estado_gasto.id')->where('nombre','Mensual')->get();
                $adelantos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('adelanto_trabajador','ot.id','=','adelanto_trabajador.ot_id')->get();
                $faltas = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('estado_ot','ot.estado_ot_id','=','estado_ot.id')->where('nombre','Falta')->get();
                $descuentos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->get()->sum('descuento');
                $numeros_domingo =$this->numero_domingos($periodo,$id);

                return view('dinamica.administracion.rrhh.boleta-pago.crearboleta',compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora','dias_tra', 'numeros_domingo','horas_dob','dias_noc','faltas','descuentos','tecnico','pago_quincena'));
            }
        }else{
            $pago_quincena = collect(['trabajador_id'=>$id,'pago'=>0]);
            if (!$tecnico) {
                return view('dinamica.administracion.rrhh.boleta-pago.crearboleta',compact('tecnico','trabajador','costo_hora','periodo','pago_quincena'));
            }elseif (!$hasOts) {
                return redirect('administracion/rrhh/boleta-pago')->with('mensaje','El trabajador no tiene actividad en el periodo seleccionado');
            }else{
                $datos = $this->boleta(30,$id,$periodo);
                $dias_tra = $datos[0];
                $dias_noc=$datos[1];
                $horas_dob=$datos[2];
                $horas_nor = $datos[3];
                $horas_25p= $datos[4];
                $horas_35p = $datos[5];
                $gastos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('gasto_trabajador','ot.id','=','gasto_trabajador.ot_id')->join('estado_gasto','gasto_trabajador.estado_gasto_id','=','estado_gasto.id')->where('nombre','Mensual')->get();
                $adelantos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('adelanto_trabajador','ot.id','=','adelanto_trabajador.ot_id')->get();
                $faltas = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('estado_ot','ot.estado_ot_id','=','estado_ot.id')->where('nombre','Falta')->get();
                $descuentos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->get()->sum('descuento');
                $numeros_domingo =$this->numero_domingos($periodo,$id);

                return view('dinamica.administracion.rrhh.boleta-pago.crearboleta',compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora','dias_tra', 'numeros_domingo','horas_dob','dias_noc','faltas','descuentos','tecnico','pago_quincena'));
            }
        }

    }


    public function crearQuincena($id,$periodo)
    {
        can('crear-boletas');
        $trabajador = Trabajador::findOrFail($id);
        $inicio = Carbon::create($periodo)->startOfMonth();
        $fin =Carbon::create($periodo);

        $hasAscenso = $this->hasAscensos($id);
        $tecnico = $this->isTecnico($trabajador);
        $sueldo = $this->sueldo($id,$periodo);
        $costo_hora = $sueldo/(30*8);
        $hasOts = $this->hasOts($id,$periodo);

        if (!$tecnico) {
            return view('dinamica.administracion.rrhh.boleta-pago.crearquincena',compact('tecnico','trabajador','costo_hora','periodo'));
        }elseif (!$hasOts) {
            return redirect('administracion/rrhh/boleta-pago')->with('mensaje','El trabajador no tiene actividad en el periodo seleccionado');
        }else {
            $datos = $this->boleta(15,$id,$periodo);
            $dias_tra = $datos[0];
            $dias_noc=$datos[1];
            $horas_dob=$datos[2];
            $horas_nor = $datos[3];
            $horas_25p= $datos[4];
            $horas_35p = $datos[5];
            $gastos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('gasto_trabajador','ot.id','=','gasto_trabajador.ot_id')->join('estado_gasto','gasto_trabajador.estado_gasto_id','=','estado_gasto.id')->where('nombre','Mensual')->get();
            $adelantos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('adelanto_trabajador','ot.id','=','adelanto_trabajador.ot_id')->get();
            $faltas = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('estado_ot','ot.estado_ot_id','=','estado_ot.id')->where('nombre','Falta')->get();
            $descuentos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->get()->sum('descuento');
            $numeros_domingo =$this->numero_domingos($periodo,$id);
            return view('dinamica.administracion.rrhh.boleta-pago.crearquincena',compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora','dias_tra', 'numeros_domingo','horas_dob','dias_noc','faltas','descuentos','tecnico'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarFinDeMes(ValidacionBoletaPago $request,$id,$periodo)
    {
        can('crear-boletas');
        BoletaPago::create($request->all());

        $trabajador = Trabajador::findOrFail($id);
        $inicio = Carbon::create($periodo)->startOfMonth();
        $fin =Carbon::create($periodo);
        $month = Carbon::create($periodo)->isoFormat('MM');
        $year = Carbon::create($periodo)->isoFormat('YYYY');

        $hasAscenso = $this->hasAscensos($id);
        $tecnico = $this->isTecnico($trabajador);
        $sueldo = $this->sueldo($id,$periodo);
        $costo_hora = $sueldo/(30*8);
        $hasOts = $this->hasOts($id,$periodo);

        if($pago_quincena = Quincena::where('trabajador_id',$id)->where('periodo',Carbon::create($year,$month,15)->toDateString())->first()){
            if (!$tecnico) {
                $pdf = App::make('dompdf.wrapper');
                $content = $pdf->loadView('dinamica.administracion.rrhh.boleta-pago.boletaNoTecnicoPdf', compact('tecnico','trabajador','costo_hora','periodo','pago_quincena','request'))->output();
                BoletaPago::setBoleta($content,'Boleta_'.Carbon::create($periodo)->isoFormat('MMMM_YYYY').'_'.$trabajador->primer_nombre.'_'.$trabajador->primer_apellido.'.pdf');
                // return view('dinamica.administracion.rrhh.boleta-pago.crearboleta',compact('tecnico','trabajador','costo_hora','periodo','pago_quincena'));
            }elseif (!$hasOts) {
                return redirect('administracion/rrhh/boleta-pago')->with('mensaje','El trabajador no tiene actividad en el periodo seleccionado');
            }else{
                $datos = $this->boleta(30,$id,$periodo);
                $dias_tra = $datos[0];
                $dias_noc=$datos[1];
                $horas_dob=$datos[2];
                $horas_nor = $datos[3];
                $horas_25p= $datos[4];
                $horas_35p = $datos[5];
                $gastos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('gasto_trabajador','ot.id','=','gasto_trabajador.ot_id')->join('estado_gasto','gasto_trabajador.estado_gasto_id','=','estado_gasto.id')->where('nombre','Mensual')->get();
                $adelantos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('adelanto_trabajador','ot.id','=','adelanto_trabajador.ot_id')->get();
                $faltas = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('estado_ot','ot.estado_ot_id','=','estado_ot.id')->where('nombre','Falta')->get();
                $descuentos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->get()->sum('descuento');
                $numeros_domingo =$this->numero_domingos($periodo,$id);

                $pdf = App::make('dompdf.wrapper');
                $content = $pdf->loadView('dinamica.administracion.rrhh.boleta-pago.boletaTecnicoPdf', compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora','dias_tra', 'numeros_domingo','horas_dob','dias_noc','faltas','descuentos','tecnico','pago_quincena','request'))->output();
                BoletaPago::setBoleta($content,'Boleta_'.Carbon::create($periodo)->isoFormat('MMMM_YYYY').'_'.$trabajador->primer_nombre.'_'.$trabajador->primer_apellido.'.pdf');
                // return view('dinamica.administracion.rrhh.boleta-pago.crearboleta',compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora','dias_tra', 'numeros_domingo','horas_dob','dias_noc','faltas','descuentos','tecnico','pago_quincena'));
            }
        }else{
            $pago_quincena = collect(['trabajador_id'=>$id,'pago'=>0]);
            if (!$tecnico) {
                $pdf = App::make('dompdf.wrapper');
                $content = $pdf->loadView('dinamica.administracion.rrhh.boleta-pago.boletaNoTecnicoPdf', compact('tecnico','trabajador','costo_hora','periodo','pago_quincena','request'))->output();
                BoletaPago::setBoleta($content,'Boleta_'.Carbon::create($periodo)->isoFormat('MMMM_YYYY').'_'.$trabajador->primer_nombre.'_'.$trabajador->primer_apellido.'.pdf');
                // return view('dinamica.administracion.rrhh.boleta-pago.crearboleta',compact('tecnico','trabajador','costo_hora','periodo','pago_quincena'));
            }elseif (!$hasOts) {
                return redirect('administracion/rrhh/boleta-pago')->with('mensaje','El trabajador no tiene actividad en el periodo seleccionado');
            }else{
                $datos = $this->boleta(30,$id,$periodo);
                $dias_tra = $datos[0];
                $dias_noc=$datos[1];
                $horas_dob=$datos[2];
                $horas_nor = $datos[3];
                $horas_25p= $datos[4];
                $horas_35p = $datos[5];
                $gastos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('gasto_trabajador','ot.id','=','gasto_trabajador.ot_id')->join('estado_gasto','gasto_trabajador.estado_gasto_id','=','estado_gasto.id')->where('nombre','Mensual')->get();
                $adelantos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('adelanto_trabajador','ot.id','=','adelanto_trabajador.ot_id')->get();
                $faltas = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('estado_ot','ot.estado_ot_id','=','estado_ot.id')->where('nombre','Falta')->get();
                $descuentos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->get()->sum('descuento');
                $numeros_domingo =$this->numero_domingos($periodo,$id);

                $pdf = App::make('dompdf.wrapper');
                $content = $pdf->loadView('dinamica.administracion.rrhh.boleta-pago.boletaTecnicoPdf', compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora','dias_tra', 'numeros_domingo','horas_dob','dias_noc','faltas','descuentos','tecnico','pago_quincena','request'))->output();
                BoletaPago::setBoleta($content,'Boleta_'.Carbon::create($periodo)->isoFormat('MMMM_YYYY').'_'.$trabajador->primer_nombre.'_'.$trabajador->primer_apellido.'.pdf');
                // return view('dinamica.administracion.rrhh.boleta-pago.crearboleta',compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora','dias_tra', 'numeros_domingo','horas_dob','dias_noc','faltas','descuentos','tecnico','pago_quincena'));
            }
        }
        if(BoletaPago::where('trabajador_id',$id)->where('periodo',$periodo)){
            $boleta = BoletaPago::orderBy('created_at','desc')->first();
            Asiento_contable::create([
                'fecha'=>$periodo,
                'glosa'=>'Pago fin de mes de trabajador '.$trabajador->primer_nombre.' '.$trabajador->primer_apellido.', periodo '.Carbon::parse($periodo)->isoFormat('DD-MM-YYYY'),
                'asientoable_id'=>$boleta->id,
                'asientoable_type'=>'App\Models\Administracion\RRHH\BoletaPago'
            ]);
            $asiento_contable_id = Asiento_contable::orderBy('created_at','desc')->first()->id;
            $cuenta_corriente_principal = Cuenta_contable::where('codigo','10411')->value('id');
            $cuenta_sueldos = Cuenta_contable::where('codigo','6211')->value('id');
            Asiento_cuenta::create([
                'cuenta_contable_id'=>$cuenta_corriente_principal,
                'asiento_contable_id'=>$asiento_contable_id,
                'haber'=>$boleta->pago_mes
            ]);
            Asiento_cuenta::create([
                'cuenta_contable_id'=>$cuenta_sueldos,
                'asiento_contable_id'=>$asiento_contable_id,
                'debe'=>$boleta->pago_mes
            ]);
            $saldo1 = Cuenta_contable::findOrFail($cuenta_corriente_principal)->saldo;
            Cuenta_contable::findOrFail($cuenta_corriente_principal)->update(['saldo'=>$saldo1-$boleta->pago_mes]);
            $saldo2 = Cuenta_contable::findOrFail($cuenta_sueldos)->saldo;
            Cuenta_contable::findOrFail($cuenta_sueldos)->update(['saldo'=>$saldo2+$boleta->pago_mes]);
        }
        return redirect('administracion/rrhh/boleta-pago')->with('mensaje','Boleta de pago creada con éxito');
    }


    public function guardarQuincena(ValidacionQuincena $request,$id,$periodo)
    {
        can('crear-boletas');
        Quincena::create($request->all());

        $trabajador = Trabajador::findOrFail($id);
        $inicio = Carbon::create($periodo)->startOfMonth();
        $fin =Carbon::create($periodo);

        $hasAscenso = $this->hasAscensos($id);
        $tecnico = $this->isTecnico($trabajador);
        $sueldo = $this->sueldo($id,$periodo);
        $costo_hora = $sueldo/(30*8);
        $hasOts = $this->hasOts($id,$periodo);

        if (!$tecnico) {
            $pdf = App::make('dompdf.wrapper');
            $content = $pdf->loadView('dinamica.administracion.rrhh.boleta-pago.quincenaNoTecnicoPdf', compact('tecnico','trabajador','costo_hora','periodo','request'))->output();
            BoletaPago::setBoleta($content,'Quincena_'.Carbon::create($periodo)->isoFormat('MMMM_YYYY').'_'.$trabajador->primer_nombre.'_'.$trabajador->primer_apellido.'.pdf');

        }elseif (!$hasOts) {
            return redirect('administracion/rrhh/boleta-pago')->with('mensaje','El trabajador no tiene actividad en el periodo seleccionado');
        }else {
            $datos = $this->boleta(15,$id,$periodo);
            $dias_tra = $datos[0];
            $dias_noc=$datos[1];
            $horas_dob=$datos[2];
            $horas_nor = $datos[3];
            $horas_25p= $datos[4];
            $horas_35p = $datos[5];
            $gastos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('gasto_trabajador','ot.id','=','gasto_trabajador.ot_id')->join('estado_gasto','gasto_trabajador.estado_gasto_id','=','estado_gasto.id')->where('nombre','Mensual')->get();
            $adelantos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('adelanto_trabajador','ot.id','=','adelanto_trabajador.ot_id')->get();
            $faltas = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->join('estado_ot','ot.estado_ot_id','=','estado_ot.id')->where('nombre','Falta')->get();
            $descuentos = Ot::with('actividades')->where('trabajador_id',$id)->where('fecha','<=',$fin)->where('fecha','>=',$inicio)->get()->sum('descuento');
            $numeros_domingo =$this->numero_domingos($periodo,$id);

            $pdf = App::make('dompdf.wrapper');
            $content = $pdf->loadView('dinamica.administracion.rrhh.boleta-pago.quincenaTecnicoPdf', compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora','dias_tra', 'numeros_domingo','horas_dob','dias_noc','faltas','descuentos','tecnico','request'))->output();
            BoletaPago::setBoleta($content,'Quincena_'.Carbon::create($periodo)->isoFormat('MMMM_YYYY').'_'.$trabajador->primer_nombre.'_'.$trabajador->primer_apellido.'.pdf');
            // return view('dinamica.administracion.rrhh.boleta-pago.crearquincena',compact('trabajador','periodo','horas_nor','horas_25p','horas_35p','gastos','adelantos','costo_hora','dias_tra', 'numeros_domingo','horas_dob','dias_noc','faltas','descuentos','tecnico'));
        }
        if(Quincena::where('trabajador_id',$id)->where('periodo',$periodo)){
            $quincena = Quincena::orderBy('created_at','desc')->first();
            Asiento_contable::create([
                'fecha'=>$periodo,
                'glosa'=>'Quincena de trabajador '.$trabajador->primer_nombre.' '.$trabajador->primer_apellido.', periodo '.Carbon::parse($periodo)->isoFormat('DD-MM-YYYY'),
                'asientoable_id'=>$quincena->id,
                'asientoable_type'=>'App\Models\Administracion\RRHH\Quincena'
            ]);
            $asiento_contable_id = Asiento_contable::orderBy('created_at','desc')->first()->id;
            $cuenta_corriente_principal = Cuenta_contable::where('codigo','10411')->value('id');
            $cuenta_sueldos = Cuenta_contable::where('codigo','6211')->value('id');
            Asiento_cuenta::create([
                'cuenta_contable_id'=>$cuenta_corriente_principal,
                'asiento_contable_id'=>$asiento_contable_id,
                'haber'=>$quincena->pago
            ]);
            Asiento_cuenta::create([
                'cuenta_contable_id'=>$cuenta_sueldos,
                'asiento_contable_id'=>$asiento_contable_id,
                'debe'=>$quincena->pago
            ]);
            $saldo1 = Cuenta_contable::findOrFail($cuenta_corriente_principal)->saldo;
            Cuenta_contable::findOrFail($cuenta_corriente_principal)->update(['saldo'=>$saldo1-$quincena->pago]);
            $saldo2 = Cuenta_contable::findOrFail($cuenta_sueldos)->saldo;
            Cuenta_contable::findOrFail($cuenta_sueldos)->update(['saldo'=>$saldo2+$quincena->pago]);
        }
        return redirect('administracion/rrhh/boleta-pago')->with('mensaje','Quincena creada con éxito');
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
