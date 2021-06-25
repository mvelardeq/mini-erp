<?php

namespace App\Http\Controllers\Administracion\Logistica;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCategoriaProducto;
use App\Models\Administracion\Logistica\Categoria_producto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias_producto = Categoria_producto::orderBy('id')->get();
        return  view('dinamica.administracion.logistica.categoria_producto.index', compact('categorias_producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $categorias_producto = Categoria_producto::orderBy('id')->get();
        return  view('dinamica.administracion.logistica.categoria_producto.crear', compact('categorias_producto'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionCategoriaProducto $request)
    {
        Categoria_producto::create($request->all());
        return redirect('administracion/logistica/categoria')->with('mensaje','Categoría creada con éxito');
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
        $categoria_producto = Categoria_producto::findOrFail($id);
        return view('dinamica.administracion.logistica.categoria_producto.editar', compact('categoria_producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionCategoriaProducto $request, $id)
    {
        // return dd($request->all());
        Categoria_producto::findOrFail($id)->update($request->all());
        return redirect('administracion/logistica/categoria')->with('mensaje','categoria actualizada con éxito');
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
            if (Categoria_producto::destroy($id)) {
                return response()->json(['mensaje'=>'ok']);
            }else {
                return response()->json(['mensaje'=>'ng']);
            }
        }else {
            abort(404);
        }
    }
}
