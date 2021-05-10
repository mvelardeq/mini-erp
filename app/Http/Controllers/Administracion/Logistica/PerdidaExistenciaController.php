<?php

namespace App\Http\Controllers\Administracion\Logistica;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Logistica\Compra;
use App\Models\Administracion\Logistica\Item_compra;
use App\Models\Administracion\Logistica\Perdida_existencia;
use Illuminate\Http\Request;

class PerdidaExistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perdidas_existencia = Perdida_existencia::orderBy('id')->get();

        return view('dinamica.administracion.logistica.perdida_existencia.index', compact('perdidas_existencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear_comun()
    {
        $items = Item_compra::with('producto')->orderBy('id')->get();

        $productos_separados = collect();

        foreach ($items as $item) {
            $stock = $item->cantidad - $item->cantidad_perdida;
            if ($item->producto->tipo_producto->nombre == 'Activo común' && $stock>0) {
                $productos_separados->push($item);
            }
            $productos_comunes = $productos_separados->unique('producto_id');
        }

        // return dd($perdida);

        return view('dinamica.administracion.logistica.perdida_existencia.crear_comun', compact('productos_comunes'));
    }


    public function crear_particular()
    {
        $items = Item_compra::with('producto')->orderBy('id')->get();

        $productos_particulares = collect();

        foreach ($items as $item) {
            $stock = $item->cantidad - $item->cantidad_perdida;
            if ($item->producto->tipo_producto->nombre == 'Activo particular' && $stock>0) {
                $productos_particulares->push($item);
            }
        }
        // return dd($productos_particulares);

        return view('dinamica.administracion.logistica.perdida_existencia.crear_particular', compact('productos_particulares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar_comun(Request $request)
    {
        $items = Compra::join('item_compra','compra.id', '=','item_compra.compra_id')->with('producto')->where('producto_id', $request->producto_id)->orderBy('fecha', 'asc')->get();


        foreach ($items as $item) {
            $stock = $item->cantidad - $item->cantidad_perdida;
            if ($stock>0) {
                // var_dump($stock);
                if ($request->cantidad > $stock) {
                    Item_compra::findOrFail($item->id)->update([
                        'cantidad_perdida' => $stock,
                    ]);
                    $request->cantidad = $request->cantidad -$stock;
                    Perdida_existencia::create([
                        'item_compra_id' => $item->id,
                        'fecha' => $request->fecha,
                        'motivo' => $request->motivo,
                        'cantidad' => $stock
                    ]);
                }else {
                    Item_compra::findOrFail($item->id)->update(['cantidad_perdida'=>$request->cantidad]);
                    Perdida_existencia::create([
                        'item_compra_id' => $item->id,
                        'fecha' => $request->fecha,
                        'motivo' => $request->motivo,
                        'cantidad' => $request->cantidad
                    ]);
                    break;
                }
            }

        }
        return redirect('administracion/logistica/perdida')->with('mensaje', 'Pérdida registrada con éxito');
    }


    public function guardar_particular(Request $request){
        if ($request->cantidad = 1) {
            Item_compra::findOrFail($request->item_compra_id)->update([
                'cantidad_perdida' => $request->cantidad,
            ]);
            Perdida_existencia::create([
                'item_compra_id' => $request->item_compra_id,
                'fecha' => $request->fecha,
                'motivo' => $request->motivo,
                'cantidad' => $request->cantidad,
            ]);
            return redirect('administracion/logistica/perdida')->with('mensaje', 'Pérdida creada con éxito');
        }else {
            abort(404);
        }
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
