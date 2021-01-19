<?php

namespace App\Http\Controllers\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Operaciones\Equipo;
use App\Models\Operaciones\Obra;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos= Equipo::with('obra')->orderBy('id')->get();
        return view('dinamica.operaciones.equipo.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $equipos= Equipo::with('obra')->orderBy('id')->get();
        $obras= Obra::orderBy('id')->get();
        return  view('dinamica.operaciones.equipo.crear',compact('equipos', 'obras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        Equipo::create($request->all());
        return redirect('operaciones/equipo')->with('mensaje', 'Equipo creado con éxito');
        // dd($request->file("plano")->getClientOriginalName());
        // $file= $request->file("plano");
        // $name= $request->file("plano")->getClientOriginalName();
        // Storage::disk('google')->put("$name", $request->file('plano'));
        // Storage::disk('google')->makeDirectory('Planos');
        // $path = $request->file('plano')->store(
            // 'Planos/', 'google');
            // $path = $request->file('plano')->store('planos');
            // Storage::putFile('plano', $file, 'public');
            // Storage::disk('google')->putFile('otro',$file);
        // Storage::disk('google')->put($path, $file);
        // dd($path);
        // dd('done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
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
        $equipo = Equipo::findOrFail($id);
        $obras= Obra::orderBy('id')->get();
        return view('dinamica.operaciones.equipo.editar', compact('equipo', 'obras'));
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
        Equipo::findOrFail($id)->update($request->all());
        return redirect('operaciones/equipo')->with('mensaje', 'Equipo actualizado con éxito');
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
            if (Equipo::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
