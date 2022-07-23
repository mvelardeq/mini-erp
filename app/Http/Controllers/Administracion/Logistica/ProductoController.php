<?php

namespace App\Http\Controllers\Administracion\Logistica;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionProducto;
use App\Models\Administracion\Logistica\Categoria_producto;
use App\Models\Administracion\Logistica\Producto;
use App\Models\Administracion\Logistica\Tipo_producto;
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
        can('listar-productos');
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
        can('crear-productos');
        $productos = Producto::orderBy('id')->get();
        $categorias_producto = Categoria_producto::orderBy('id')->get();
        $tipo_productos = Tipo_producto::orderBy('id')->get();

        return  view('dinamica.administracion.logistica.producto.crear', compact('productos', 'categorias_producto','tipo_productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionProducto $request)
    {
        can('crear-productos');
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
        can('editar-productos');
        $producto = Producto::findOrFail($id);
        $categorias_producto = Categoria_producto::orderBy('id')->get();
        $tipo_productos = Tipo_producto::orderBy('id')->get();

        return view('dinamica.administracion.logistica.producto.editar', compact('producto', 'categorias_producto', 'tipo_productos'));

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
        can('editar-productos');
        $producto = Producto::findOrFail($id);
        if ($foto = Producto::setFoto($request->foto_producto,$producto->foto))
            $request->request->add(['foto' => $foto]);
        $producto->update($request->all());
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
        can('eliminar-productos');
        if ($request->ajax()) {
            $foto = Producto::findOrFail($id)->foto;
            if(Producto::destroy($id)){
                // Storage::disk('cloudinary')->delete("photos/product/$foto.jpg");
                cloudinary()->destroy($foto);
                return response()->json(['mensaje'=>'ok']);
            }
        } else {
            abort(404);
        }

    }
}
