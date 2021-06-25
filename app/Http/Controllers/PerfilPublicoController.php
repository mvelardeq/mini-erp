<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ascenso_trabajador;
use App\Models\Admin\Obs_trabajador;
use App\Models\Admin\Periodo_trabajador;
use App\Models\Seguridad\Trabajador;
use App\Models\Social\Post;
use Illuminate\Http\Request;

class PerfilPublicoController extends Controller
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

        $roles = array();

        foreach ($data->roles as $rol) {
            array_push($roles,$rol->nombre);
        }

        $posts = Post::with('trabajador')->with('comentarios')->with('likes')->where('trabajador_id',$id)->orderBy('created_at','desc')->get();

        // return view('dinamica.inicio', compact('posts'));


        return view('dinamica.perfil-publico.index', compact('data', 'ascensos','events','roles','posts'));
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
