<?php

namespace App\Http\Controllers\Administracion\RRHH;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ascenso_trabajador;
use App\Models\Admin\Obs_trabajador;
use App\Models\Seguridad\Trabajador;
use Illuminate\Http\Request;

class ObservacionTrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // can('listar-libros');
        // dd(session()->all());
        $observaciones = Obs_trabajador::with('trabajador:id,primer_nombre, primer_apellido')->orderBy('id')->get();
        return view('dinamica.administracion.rrhh.observacion-trabajador.index', compact('observaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($id)
    {
        // $trabajador = Trabajador::orderBy('id')->pluck('nombres', 'id')->toArray();
        $trabajador = Trabajador::with('ascensos')->findOrFail($id);

        $data = Trabajador::with('roles:id,nombre', 'observaciones', 'periodos', 'ascensos')->findOrFail($id);
        $ascensos = Ascenso_trabajador::with('cargo')->where('trabajador_id', $id)->get();

        return view('dinamica.administracion.rrhh.observacion-trabajador.crear', compact('trabajador', 'data', 'ascensos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request, $id)
    {
        if ($foto = Obs_trabajador::setFoto($request->foto_up))
            $request->request->add(['foto' => $foto]);
        Obs_trabajador::create($request->all());
        // return redirect()->route('observacion-trabajador')->with('mensaje', 'La observación se creo correctamente');
        return redirect()->route('trabajador_perfil', ['id' => $id])->with('mensaje', 'La observación del trabajador se creó correctamente');
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
