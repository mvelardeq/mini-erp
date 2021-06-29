<?php

namespace App\Http\Controllers\Operaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionEmpresa;
use App\Models\Operaciones\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-empresas');
        $empresas= Empresa::orderBy('id','desc')->get();
        return view('dinamica.operaciones.empresa.index',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-empresas');
        $empresas= Empresa::orderBy('id','desc')->get();
        return  view('dinamica.operaciones.empresa.crear',compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionEmpresa $request)
    {
        can('crear-empresas');
        Empresa::create($request->all());
        return redirect('operaciones/empresa')->with('mensaje', 'Empresa creada con éxito');
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
        can('editar-empresas');
        $empresa = Empresa::findOrFail($id);
        return view('dinamica.operaciones.empresa.editar', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionEmpresa $request, $id)
    {
        can('editar-empresas');
        Empresa::findOrFail($id)->update($request->all());
        return redirect('operaciones/empresa')->with('mensaje', 'Empresa actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-empresas');
        if ($request->ajax()) {
            if (Empresa::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
