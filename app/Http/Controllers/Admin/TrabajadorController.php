<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionTrabajador;
use App\Models\Admin\Rol;
use App\Models\Seguridad\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Trabajador::with('roles:id,nombre')->orderBy('id')->get();
        return view('dinamica.admin.trabajador.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('dinamica.admin.trabajador.crear', compact('rols'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionTrabajador $request)
    {
        $trabajador = Trabajador::create($request->all());
        $trabajador->roles()->sync($request->rol_id);
        return redirect('admin/trabajador')->with('mensaje', 'Trabajador creado con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Trabajador::with('roles')->findOrFail($id);
        return view('dinamica.admin.trabajador.editar', compact('data', 'rols'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionTrabajador $request, $id)
    {
        $trabajador=Trabajador::findOrFail($id);
        $trabajador->update(array_filter($request->all()));
        $trabajador->roles()->sync($request->rol_id);
        return redirect('admin/trabajador')->with('mensaje', 'Trabajador actualizado con exito');
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
            $trabajador=Trabajador::findOrFail($id);
            $trabajador->roles()->detach();
            $trabajador->delete();
            return response()->json(['mensaje'=>'ok']);
        } else {
            abort(404);
        }

    }
}
