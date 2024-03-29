<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionTrabajador;
use App\Models\Admin\Rol;
use App\Models\Seguridad\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Trabajador::with('roles:id,nombre', 'observaciones', 'periodos', 'ascensos')->orderBy('id')->get();
        return view('dinamica.admin.usuario.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $trabajadores = Trabajador::with('roles')->orderBy('id')->get();
        $supervisores = collect();
        foreach ($trabajadores as $trabajador) {
            $roles = $trabajador->roles->pluck('nombre');
            if ($roles->search('supervisor')) {
                $supervisores->push($trabajador);
            }
        }
        return view('dinamica.admin.usuario.crear', compact('rols', 'supervisores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionTrabajador $request)
    {
        // $trabajador = Trabajador::create($request->all());
        // $trabajador->roles()->sync($request->rol_id);
        // return redirect('admin/trabajador')->with('mensaje', 'Trabajador creado con exito');

        if ($foto = Trabajador::setFoto($request->foto_up))
            $request->request->add(['foto' => $foto]);
        $trabajador = Trabajador::create($request->all());

        // return dd($request->foto);
        $trabajador->roles()->sync($request->rol_id);
        return redirect()->route('usuario')->with('mensaje', 'El trabajador se actualizó correctamente');
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
        $trabajadores = Trabajador::with('roles')->orderBy('id')->get();
        $supervisores = collect();
        foreach ($trabajadores as $trabajador) {
            $roles = $trabajador->roles->pluck('nombre');
            if ($roles->search('supervisor')) {
                $supervisores->push($trabajador);
            }
        }
        return view('dinamica.admin.usuario.editar', compact('data', 'rols', 'supervisores'));
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
        return $request;
        $trabajador = Trabajador::findOrFail($id);
        if ($foto = Trabajador::setFoto($request->foto_up, $trabajador->foto))
            $request->request->add(['foto' => $foto]);
        if ($request->password == '' && $request->re_password == '') {
            return dd('hola');
            $trabajador->update(Arr::except($request->all(), ['password']));
        } else {
            $trabajador->update($request->all());
        }
        // // $trabajador->update(array_filter($request->all()));
        $trabajador->roles()->sync($request->rol_id);
        return redirect()->route('usuario')->with('mensaje', 'El trabajdor se actualizó correctamente');
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
            $trabajador = Trabajador::findOrFail($id);
            $trabajador->roles()->detach();
            $trabajador->delete();
            // Storage::disk('s3')->delete("photos/profilePhoto/$trabajador->foto");
            Storage::disk('cloudinary')->delete("files/quotation/$trabajador->foto");
            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }
}
