<?php

namespace App\Http\Controllers\Administracion\Logistica;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPerdidaExistencia;
use App\Models\Administracion\Logistica\Compra;
use App\Models\Administracion\Logistica\Item_compra;
use App\Models\Administracion\Logistica\Perdida_existencia;
use App\Models\Finanzas\Contabilidad\Asiento_contable;
use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use App\Models\Finanzas\Contabilidad\Cuenta_contable;
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
        can('listar-perdidas');
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
        can('crear-perdidas');
        $items = Item_compra::with('producto')->orderBy('id')->get();

        $productos_separados = collect();

        foreach ($items as $item) {
            $stock = $item->cantidad - $item->cantidad_perdida;
            if ($item->producto->tipo_producto->nombre == 'Activo común' && $stock>0) {
                $productos_separados->push($item);
            }
            $productos_comunes = $productos_separados->unique('producto_id');
        }

        if (!isset($productos_comunes)) {
            $productos_comunes = collect();
        }

        return view('dinamica.administracion.logistica.perdida_existencia.crear_comun', compact('productos_comunes'));
    }


    public function crear_particular()
    {
        can('crear-perdidas');
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
    public function guardar_comun(ValidacionPerdidaExistencia $request)
    {
        can('crear-perdidas');
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


                    $idperdidaexistencia = Perdida_existencia::orderBy('created_at','desc')->first()->id;

                        Asiento_contable::create([
                            'fecha'=>$request->fecha,
                            'glosa'=>'Pérdida o desuso de herramienta(s)',
                            'asientoable_id'=>$idperdidaexistencia,
                            'asientoable_type'=>'App\Models\Administracion\Logistica\Perdida_existencia'
                        ]);
                        $idasientocontable = Asiento_contable::orderBy('created_at','desc')->first()->id;
                        $idcuentacontable = Cuenta_contable::where('codigo','3371')->value('id');
                        $idcuentacontabledebe = Cuenta_contable::where('codigo','3647')->value('id');

                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentacontable,
                            'haber'=>($stock)*($item->costo_con_igv)
                        ]);
                        $saldo1 = Cuenta_contable::findOrFail($idcuentacontable)->saldo;
                        Cuenta_contable::findOrFail($idcuentacontable)->update(['saldo'=>($saldo1-($stock*$item->costo_con_igv))]);

                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentacontabledebe,
                            'debe'=>($stock)*($item->costo_con_igv)
                        ]);
                        $saldo1 = Cuenta_contable::findOrFail($idcuentacontabledebe)->saldo;
                        Cuenta_contable::findOrFail($idcuentacontabledebe)->update(['saldo'=>($saldo1+($stock*$item->costo_con_igv))]);




                }else {
                    Item_compra::findOrFail($item->id)->update(['cantidad_perdida'=>$request->cantidad]);
                    Perdida_existencia::create([
                        'item_compra_id' => $item->id,
                        'fecha' => $request->fecha,
                        'motivo' => $request->motivo,
                        'cantidad' => $request->cantidad
                    ]);


                    $idperdidaexistencia = Perdida_existencia::orderBy('created_at','desc')->first()->id;

                        Asiento_contable::create([
                            'fecha'=>$request->fecha,
                            'glosa'=>'Pérdida o desuso de herramienta(s)',
                            'asientoable_id'=>$idperdidaexistencia,
                            'asientoable_type'=>'App\Models\Administracion\Logistica\Perdida_existencia'
                        ]);
                        $idasientocontable = Asiento_contable::orderBy('created_at','desc')->first()->id;
                        $idcuentacontable = Cuenta_contable::where('codigo','3371')->value('id');
                        $idcuentacontabledebe = Cuenta_contable::where('codigo','3647')->value('id');

                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentacontable,
                            'haber'=>($request->cantidad)*($item->costo_con_igv)
                        ]);
                        $saldo1 = Cuenta_contable::findOrFail($idcuentacontable)->saldo;
                        Cuenta_contable::findOrFail($idcuentacontable)->update(['saldo'=>($saldo1-($stock*$item->costo_con_igv))]);

                        Asiento_cuenta::create([
                            'asiento_contable_id'=>$idasientocontable,
                            'cuenta_contable_id'=>$idcuentacontabledebe,
                            'debe'=>($request->cantidad)*($item->costo_con_igv)
                        ]);
                        $saldo1 = Cuenta_contable::findOrFail($idcuentacontabledebe)->saldo;
                        Cuenta_contable::findOrFail($idcuentacontabledebe)->update(['saldo'=>($saldo1+($request->cantidad*$item->costo_con_igv))]);


                    break;
                }
            }

        }
        return redirect('administracion/logistica/perdida')->with('mensaje', 'Pérdida registrada con éxito');
    }


    public function guardar_particular(ValidacionPerdidaExistencia $request)
    {
        can('crear-perdidas');
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

            $item = Item_compra::findOrFail($request->item_compra_id);
            $idperdidaexistencia = Perdida_existencia::orderBy('created_at','desc')->first()->id;

            Cuenta_contable::create([
                'fecha'=>$request->fecha,
                'glosa'=>'Pérdida o desuso de equipo',
                'asientoable_id'=>$idperdidaexistencia,
                'asientoable_type'=>'App\Models\Administracion\Logistica\Perdida_existencia'
            ]);
            $idasientocontable = Asiento_contable::orderBy('created_at','desc')->first()->id;
            $idcuentacontable = Cuenta_contable::where('codigo','3371')->value('id');
            $idcuentacontabledebe = Cuenta_contable::where('codigo','3646')->value('id');

            Asiento_cuenta::create([
                'asiento_contable_id'=>$idasientocontable,
                'cuenta_contable_id'=>$idcuentacontable,
                'haber'=>($item->costo_con_igv)
            ]);
            $saldo1 = Cuenta_contable::findOrFail($idcuentacontable)->saldo;
            Cuenta_contable::findOrFail($idcuentacontable)->update(['saldo'=>($saldo1-($item->costo_con_igv))]);

            Asiento_cuenta::create([
                'asiento_contable_id'=>$idasientocontable,
                'cuenta_contable_id'=>$idcuentacontabledebe,
                'debe'=>($item->costo_con_igv)
            ]);
            $saldo1 = Cuenta_contable::findOrFail($idcuentacontabledebe)->saldo;
            Cuenta_contable::findOrFail($idcuentacontabledebe)->update(['saldo'=>($saldo1+($item->costo_con_igv))]);


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
