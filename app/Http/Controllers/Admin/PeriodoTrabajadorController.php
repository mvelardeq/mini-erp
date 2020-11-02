<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ascenso_trabajador;
use App\Models\Admin\Cargo_trabajador;
use App\Models\Admin\Periodo_trabajador;
use App\Models\Seguridad\Trabajador;
use Illuminate\Http\Request;

class PeriodoTrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo_trabajador::with('trabajador:id,primer_nombre, primer_apellido')->orderBy('id')->get();
        return view('dinamica.admin.periodo-trabajador.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($id)
    {
        $trabajador = Trabajador::with('ascensos')->findOrFail($id);
        $cargo_trabajador = Cargo_trabajador::get();

        $data = Trabajador::with('roles:id,nombre', 'observaciones', 'periodos', 'ascensos')->findOrFail($id);
        $ascensos = Ascenso_trabajador::with('cargo')->where('trabajador_id', $id)->get();

        return view('dinamica.admin.periodo-trabajador.crear', compact('trabajador','cargo_trabajador', 'data', 'ascensos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request, $id)
    {
        Periodo_trabajador::create([
            'trabajador_id' => $request->trabajador_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            ]);
            Ascenso_trabajador::create([
                'trabajador_id' => $request->trabajador_id,
                'cargo_trabajador_id' => $request->cargo_trabajador_id,
                'sueldo' => $request->sueldo,
                'fecha' => $request->fecha_inicio,
                'observacion' => $request->observacion,
            ]);
        // return $request->all();
        return redirect()->route('trabajador_perfil', ['id' => $id])->with('mensaje', 'El periodo del trabajador se creó correctamente');
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
    public function editar($id)
    {
        // $data = Periodo_trabajador::findOrFail($id);

        $trabajador = Trabajador::with('ascensos')->findOrFail($id);
        $cargo_trabajador = Cargo_trabajador::get();

        $data = Trabajador::with('roles:id,nombre', 'observaciones', 'periodos', 'ascensos')->findOrFail($id);
        $ascensos = Ascenso_trabajador::with('cargo')->where('trabajador_id', $id)->get();

        return view('dinamica.admin.periodo-trabajador.fin', compact('data', 'trabajador', 'cargo_trabajador', 'ascensos'));
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
        $data = Trabajador::with('roles:id,nombre', 'observaciones', 'periodos', 'ascensos')->findOrFail($id);
        Periodo_trabajador::findOrFail($data->periodos->last()->id)->update($request->all());
        return redirect('admin/permiso')->with('mensaje', 'Trabajador actualizado con exito');
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
