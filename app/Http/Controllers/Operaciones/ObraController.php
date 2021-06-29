<?php

namespace App\Http\Controllers\Operaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionObra;
use App\Models\Operaciones\Obra;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-obras');
        $obras= Obra::orderBy('id','desc')->get();
        return view('dinamica.operaciones.obra.index',compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-obras');
        $obras= Obra::orderBy('id','desc')->get();
        return  view('dinamica.operaciones.obra.crear',compact('obras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionObra $request)
    {
        can('crear-obras');
        Obra::create($request->all());
        return redirect('operaciones/obra')->with('mensaje', 'Obra creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
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
        can('editar-obras');
        $obra = Obra::findOrFail($id);
        return view('dinamica.operaciones.obra.editar', compact('obra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionObra $request, $id)
    {
        can('editar-obras');
        Obra::findOrFail($id)->update($request->all());
        return redirect('operaciones/obra')->with('mensaje', 'Obra actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-obras');
        if ($request->ajax()) {
            if (Obra::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
