<?php

namespace App\Http\Controllers\Administracion\Logistica;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Logistica\Compra;
use App\Models\Administracion\Logistica\Producto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::orderBy('id')->get();

        return view('dinamica.administracion.logistica.compra.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $productosc = Producto::where('tipo_producto_id', '1')->orWhere('tipo_producto_id','3')->orderBy('id')->get();
        $productosp = Producto::where('tipo_producto_id', '2')->orderBy('id')->get();

        // return $productosp;

        return view('dinamica.administracion.logistica.compra.crear', compact('productosc', 'productosp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        Compra::create([
            'proveedor' => $request->proveedor,
            'fecha' => $request->fecha,
            'total' => $request->total,
            ]);

            $idcompra = Compra::orderBy('created_at', 'desc')->first()->id;
        return dd($request->id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        //
    }
}
