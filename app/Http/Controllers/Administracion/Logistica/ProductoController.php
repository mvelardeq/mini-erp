<?php

namespace App\Http\Controllers\Administracion\Logistica;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionProducto;
use App\Models\Administracion\Logistica\Categoria_producto;
use App\Models\Administracion\Logistica\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('tipo_producto', 'categoria_producto')->orderBy('id')->get();
        return  view('dinamica.administracion.logistica.producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $productos = Producto::orderBy('id')->get();
        $categorias_producto = Categoria_producto::orderBy('id')->get();

        return  view('dinamica.administracion.logistica.producto.crear', compact('productos', 'categorias_producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionProducto $request)
    {
        if ($foto = Producto::setFoto($request->foto_producto))
            $request->request->add(['foto' => $foto]);
        Producto::create($request->all());
        return redirect('administracion/logistica/producto')->with('mensaje','Producto creado con éxito');

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
        $producto = Producto::findOrFail($id);
        $categorias_producto = Categoria_producto::orderBy('id')->get();
        return view('dinamica.administracion.logistica.producto.editar', compact('producto', 'categorias_producto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionProducto $request, $id)
    {
        Producto::findOrFail($id)->update($request->all());
        return redirect('administracion/logistica/producto')->with('mensaje','producto actualizado con éxito');
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
            $producto = Producto::findOrFail($id);
            Storage::disk('s3')->delete("photos/product/$producto->foto");
            $producto->delete();
            return response()->json(['mensaje'=>'ok']);
        } else {
            abort(404);
        }

    }
}
