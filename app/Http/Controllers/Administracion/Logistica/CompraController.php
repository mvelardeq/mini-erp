<?php

namespace App\Http\Controllers\Administracion\Logistica;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCompra;
use App\Models\Administracion\Logistica\Compra;
use App\Models\Administracion\Logistica\Item_compra;
use App\Models\Administracion\Logistica\Producto;
use App\Models\Finanzas\Contabilidad\Asiento_contable;
use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use App\Models\Finanzas\Contabilidad\Cuenta_contable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-compras');
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
        can('crear-compras');
        $productosc = Producto::where('tipo_producto_id', '1')->orWhere('tipo_producto_id','3')->orderBy('id')->get();
        $productosp = Producto::where('tipo_producto_id', '2')->orderBy('id')->get();
        $cuentas_contable = Cuenta_contable::where('responsable_id',Auth::user()->id)->orderBy('id')->get();

        return view('dinamica.administracion.logistica.compra.crear', compact('productosc', 'productosp','cuentas_contable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionCompra $request)
    {
        can('crear-compras');
        Compra::create([
            'proveedor' => $request->proveedor,
            'fecha' => $request->fecha,
            'ruc_proveedor' => $request->ruc_proveedor,
            'total_con_igv' => $request->total,
            'observacion' => $request->observacion,
            ]);

            $idcompra = Compra::orderBy('created_at', 'desc')->first()->id;

            for ($i=0; $i < count($request->producto_id); $i++) {
                Item_compra::create([
                    'compra_id' => $idcompra,
                    'producto_id' => $request->producto_id[$i],
                    'costo_con_igv' => $request->costo_con_igv[$i],
                    'cantidad' => $request->cantidad[$i],
                    'capacidad' => $request->capacidad[$i],
                    'numero_serie' => $request->numero_serie[$i],
                    'marca' => $request->marca[$i],
                    'modelo' => $request->modelo[$i],
                ]);
            }


            Asiento_contable::create([
                'fecha'=>$request->fecha,
                'glosa'=>'Compra de articulos para la empresa',
                'asientoable_id'=>$idcompra,
                'asientoable_type'=>'App\Models\Administracion\Logistica\Compra',
            ]);


            $idasientocontable = Asiento_contable::orderBy('created_at','desc')->first()->id;
            $idcuentaigv = Cuenta_contable::where('codigo','1673')->value('id');
            $idcuentaactivo = Cuenta_contable::where('codigo','3371')->value('id');
            $idcuentasuministro = Cuenta_contable::where('codigo','6032')->value('id');
            $items_compra = Item_compra::with('producto')->where('compra_id',$idcompra)->orderBy('id')->get();

            if (isset($request->ruc_proveedor)) {

                // Asientos de compra
                foreach ($items_compra as $item_compra) {

                    if ($item_compra->producto->tipo_producto_id != 3) {
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$request->cuenta_contable_id,
                            'haber'=>$item_compra->costo_con_igv,
                        ]);
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentaigv,
                            'debe'=>($item_compra->costo_con_igv)*0.18/1.18,
                        ]);
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentaactivo,
                            'debe'=>($item_compra->costo_con_igv)/1.18,
                        ]);
                        $saldo1 = Cuenta_contable::findOrFail($request->cuenta_contable_id)->saldo;
                        Cuenta_contable::findOrFail($request->cuenta_contable_id)->update(['saldo'=>($saldo1-$item_compra->costo_con_igv)]);
                        $saldo2 = Cuenta_contable::findOrFail($idcuentaactivo)->saldo;
                        Cuenta_contable::findOrFail($idcuentaactivo)->update(['saldo'=>($saldo2+($item_compra->costo_con_igv)/1.18)]);
                        $saldoigv = Cuenta_contable::findOrFail($idcuentaigv)->saldo;
                        Cuenta_contable::findOrFail($idcuentaigv)->update(['saldo'=>($saldoigv+($item_compra->costo_con_igv)*0.18/1.18)]);

                    }else {
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$request->cuenta_contable_id,
                            'haber'=>$item_compra->costo_con_igv,
                        ]);
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentaigv,
                            'debe'=>($item_compra->costo_con_igv)*0.18/1.18,
                        ]);
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentasuministro,
                            'debe'=>($item_compra->costo_con_igv)/1.18,
                        ]);
                        $saldo1 = Cuenta_contable::findOrFail($request->cuenta_contable_id)->saldo;
                        Cuenta_contable::findOrFail($request->cuenta_contable_id)->update(['saldo'=>($saldo1-$item_compra->costo_con_igv)]);
                        $saldo2 = Cuenta_contable::findOrFail($idcuentasuministro)->saldo;
                        Cuenta_contable::findOrFail($idcuentasuministro)->update(['saldo'=>($saldo2+($item_compra->costo_con_igv)/1.18)]);
                        $saldoigv = Cuenta_contable::findOrFail($idcuentaigv)->saldo;
                        Cuenta_contable::findOrFail($idcuentaigv)->update(['saldo'=>($saldoigv+($item_compra->costo_con_igv)*0.18/1.18)]);

                    }
                }

            }else{
                // Asientos de compra
                foreach ($items_compra as $item_compra) {

                    if ($item_compra->producto->tipo_producto_id != 3) {
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$request->cuenta_contable_id,
                            'haber'=>$item_compra->costo_con_igv,
                        ]);
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentaactivo,
                            'debe'=>$item_compra->costo_con_igv,
                        ]);

                        $saldo1 = Cuenta_contable::findOrFail($request->cuenta_contable_id)->saldo;
                        Cuenta_contable::findOrFail($request->cuenta_contable_id)->update(['saldo'=>($saldo1-$item_compra->costo_con_igv)]);
                        $saldo2 = Cuenta_contable::findOrFail($idcuentaactivo)->saldo;
                        Cuenta_contable::findOrFail($idcuentaactivo)->update(['saldo'=>($saldo2+$item_compra->costo_con_igv)]);

                    }else {
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$request->cuenta_contable_id,
                            'haber'=>$item_compra->costo_con_igv,
                        ]);
                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentasuministro,
                            'debe'=>$item_compra->costo_con_igv,
                        ]);

                        $saldo1 = Cuenta_contable::findOrFail($request->cuenta_contable_id)->saldo;
                        Cuenta_contable::findOrFail($request->cuenta_contable_id)->update(['saldo'=>($saldo1-$item_compra->costo_con_igv)]);
                        $saldo2 = Cuenta_contable::findOrFail($idcuentasuministro)->saldo;
                        Cuenta_contable::findOrFail($idcuentasuministro)->update(['saldo'=>($saldo2+$item_compra->costo_con_igv)]);
                    }
                }
            }

        return redirect('administracion/logistica/compra')->with('mensaje', 'Compra realizada con éxito');

        return dd(count($request->producto_id));
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
