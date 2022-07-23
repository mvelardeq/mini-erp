<?php

namespace App\Http\Controllers\Administracion\RRHH;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionTrabajador;
use App\Models\Admin\Rol;
use App\Models\Seguridad\Trabajador;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-trabajadores');
        $datas = Trabajador::with('roles:id,nombre', 'observaciones', 'periodos', 'ascensos')->orderBy('id')->get();
        return view('dinamica.administracion.rrhh.trabajador.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-trabajadores');
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $trabajadores = Trabajador::with('roles')->orderBy('id')->get();
        $supervisores = Trabajador::whereHas('roles',function(Builder $query){
            $query->where('nombre','=','supervisor');
        })->get();
        return view('dinamica.administracion.rrhh.trabajador.crear', compact('rols', 'supervisores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionTrabajador $request)
    {
        can('crear-trabajadores');
        // $trabajador = Trabajador::create($request->all());
        // $trabajador->roles()->sync($request->rol_id);
        // return redirect('admin/trabajador')->with('mensaje', 'Trabajador creado con exito');

        if ($foto = Trabajador::setFoto($request->foto_up))
            $request->request->add(['foto' => $foto]);
        $trabajador = Trabajador::create($request->all());

        // return dd($request->foto);
        $request->request->add(["rol_id"=>2]);
        $trabajador->roles()->sync($request->rol_id);
        return redirect()->route('trabajador')->with('mensaje', 'El trabajador se registró correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('editar-trabajadores');
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Trabajador::with('roles')->findOrFail($id);
        $supervisores = Trabajador::whereHas('roles',function(Builder $query){
            $query->where('nombre','=','supervisor');
        })->get();
        return view('dinamica.administracion.rrhh.trabajador.editar', compact('data', 'rols','supervisores'));
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
        can('editar-trabajadores');
        $trabajador = Trabajador::findOrFail($id);
        if ($foto = Trabajador::setFoto($request->foto_up, $trabajador->foto))
            $request->request->add(['foto' => $foto]);
        if($request->password==null && $request->re_password==null){
            $trabajador->update(Arr::except($request->all(),['password']));
        }else{
            $trabajador->update($request->all());
        }
        $trabajador->roles()->sync($request->rol_id);
        return redirect()->route('trabajador')->with('mensaje', 'El trabajdor se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-trabajadores');
        if ($request->ajax()) {
            $trabajador=Trabajador::findOrFail($id);
            $trabajador->roles()->detach();
            $trabajador->delete();
            Storage::disk('s3')->delete("photos/profilePhoto/$trabajador->foto");
            return response()->json(['mensaje'=>'ok']);
        } else {
            abort(404);
        }

    }
}
