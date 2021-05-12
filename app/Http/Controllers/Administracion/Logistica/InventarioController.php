<?php

namespace App\Http\Controllers\Administracion\Logistica;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Logistica\Item_compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item_compra::join('producto','producto.id','=','item_compra.producto_id')->with('producto')->select('producto_id', DB::raw('SUM(cantidad-cantidad_perdida) as stock'), DB::raw('SUM(cantidad*costo_con_igv)/SUM(cantidad) as precio_promedio'), DB::raw('SUM(cantidad-cantidad_perdida)*SUM(cantidad*costo_con_igv)/SUM(cantidad) as precio_total'),'tipo_producto_id')->groupBy('producto_id')->havingRaw('tipo_producto_id<>3')->get();
        // $table = Item_compra::join('producto','producto.id','=','item_compra.producto_id')->select('producto_id', DB::raw('SUM(cantidad-cantidad_perdida) as stock'))->groupBy('producto_id')->havingRaw('tipo_producto_id=?',[1])->get();
        $items_comunes = Item_compra::join('producto','producto.id','=','item_compra.producto_id')->with('producto')->select('producto_id', DB::raw('SUM(cantidad-cantidad_perdida) as stock'), DB::raw('SUM(cantidad*costo_con_igv)/SUM(cantidad) as precio_promedio'), DB::raw('SUM(cantidad-cantidad_perdida)*SUM(cantidad*costo_con_igv)/SUM(cantidad) as precio_total'),'tipo_producto_id')->groupBy('producto_id')->havingRaw('tipo_producto_id=1')->get();
        $items_particulares = Item_compra::join('producto','producto.id','=','item_compra.producto_id')->with('producto')->where('tipo_producto_id',2)->where('cantidad_perdida',0)->select('capacidad','numero_serie','marca','modelo','producto_id',DB::raw('cantidad as stock'),DB::raw('costo_con_igv as precio'),DB::raw('cantidad*costo_con_igv as total'))->get();
        return view('dinamica.administracion.logistica.inventario.index', compact('items', 'items_comunes', 'items_particulares'));
        // dd($items_particulares);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
