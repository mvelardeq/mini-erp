<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Models\Finanzas\Contabilidad\Asiento_contable;
use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use App\Models\Finanzas\Contabilidad\Cuenta_contable;
use App\Models\Operaciones\Equipo;
use App\Models\Ventas\Anular_factura;
use App\Models\Ventas\Concepto_pago;
use App\Models\Ventas\Contrato;
use App\Models\Ventas\Detraer_factura;
use App\Models\Ventas\Estado_conceptopago;
use App\Models\Ventas\Factura;
use App\Models\Ventas\Pagar_factura;
use CrearTablaAsientoCuenta;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-facturas');
        $facturas= Factura::with('concepto_pago', 'pagar_factura', 'detraer_factura', 'anular_factura')->orderBy('numero','desc')->get();
        // $contratos= Contrato::with('conceptos_pago','equipo')->where('estado','abierto')->orderBy('id')->get();
        $equipos= Equipo::orderBy('id')->get();

        return  view('dinamica.ventas.factura.index',compact('facturas','equipos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-facturas');
        $contratos= Contrato::with('conceptos_pago','equipo')->where('estado','Abierto')->orderBy('fecha_inicio','desc')->get();
        $conceptos_pago= Concepto_pago::orderBy('id')->get();
        $equipos= Equipo::orderBy('created_at','desc')->get();
        return  view('dinamica.ventas.factura.crear',compact('contratos', 'conceptos_pago', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        can('crear-facturas');
        define("IGV",0.18);
        $concepto_pago = Concepto_pago::with('contrato')->findOrFail($request->concepto_pago_id);
        $pago_sin_detraccion = $concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje*(IGV+1)*(1-($concepto_pago->contrato->equipo->empresa->porcentaje_detraccion/100))/100;

        Factura::create([
            'concepto_pago_id'=>$request->concepto_pago_id,
            'numero'=>$request->numero,
            'fecha_facturacion'=>$request->fecha_facturacion,
            'subtotal'=>$concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje/100,
            'total_con_igv'=>$concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje*(IGV+1)/100,
            'pago_sin_detraccion'=>(($pago_sin_detraccion<700) ? $concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje*(IGV+1)/100 : $pago_sin_detraccion),
            'observacion'=>$request->observacion
        ]);
        $idfactura = Factura::orderBy('created_at','desc')->first()->id;

        Asiento_contable::create([
            'fecha'=>$request->fecha_facturacion,
            'glosa'=>'facturación por servicios de la factura número: '.$request->numero.', por concepto de '.$concepto_pago->concepto.' de la obra '.$concepto_pago->contrato->equipo->obra->nombre,
            'asientoable_id'=>$idfactura,
            'asientoable_type'=>'App\Models\Ventas\Factura'
        ]);
        $asiento_contable_id = Asiento_contable::orderBy('created_at','desc')->first()->id;
        $cuentas_por_cobrar = Cuenta_contable::where('codigo','1212')->value('id');
        $igv_por_pagar = Cuenta_contable::where('codigo','40111')->value('id');
        $ingresos_servicios_tercero = Cuenta_contable::where('codigo','70321')->value('id');
        Asiento_cuenta::create([
            'cuenta_contable_id'=>$cuentas_por_cobrar,
            'asiento_contable_id'=>$asiento_contable_id,
            'debe'=>$concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje*(IGV+1)/100,
        ]);
        Asiento_cuenta::create([
            'cuenta_contable_id'=>$igv_por_pagar,
            'asiento_contable_id'=>$asiento_contable_id,
            'haber'=>$concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje*IGV/100,
        ]);
        Asiento_cuenta::create([
            'cuenta_contable_id'=>$ingresos_servicios_tercero,
            'asiento_contable_id'=>$asiento_contable_id,
            'haber'=>$concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje/100,
        ]);

        $sueldo1 = Cuenta_contable::findOrFail($cuentas_por_cobrar)->saldo;
        Cuenta_contable::findOrFail($cuentas_por_cobrar)->update(['saldo'=>$sueldo1+$concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje*(IGV+1)/100]);
        $sueldo2 = Cuenta_contable::findOrFail($igv_por_pagar)->saldo;
        Cuenta_contable::findOrFail($igv_por_pagar)->update(['saldo'=>$sueldo2+$concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje*IGV/100]);
        $sueldo3 = Cuenta_contable::findOrFail($ingresos_servicios_tercero)->saldo;
        Cuenta_contable::findOrFail($ingresos_servicios_tercero)->update(['saldo'=>$sueldo3+$concepto_pago->contrato->costo_sin_igv*$concepto_pago->porcentaje/100]);

        Concepto_pago::findOrFail($request->concepto_pago_id)->update(['estado_conceptopago_id' => 2 ]);
        return redirect('ventas/factura')->with('mensaje', 'Factura creada con éxito');

    }

    public function combo($id)
    {
        $conceptos_pago = Concepto_pago::with('estado_conceptopago')->where('contrato_id',$id)->orderBy('id')->get();

        $listas = '<option value="0">Elige una opción</option>';

        foreach ($conceptos_pago as $concepto_pago) {
            if ($concepto_pago->estado_conceptopago->nombre == 'Sin facturar') {
                $listas .= '<option value="'.$concepto_pago->id.'">'.$concepto_pago->concepto.'</option>';
            }
        }
        echo $listas;
    }

    public function costofac($id)
    {
        if(Concepto_pago::with('contrato')->where('id',$id)){

            $conceptos_pago = Concepto_pago::with('contrato')->where('id',$id)->orderBy('id')->get();

            foreach ($conceptos_pago as $concepto_pago) {

                $costo=($concepto_pago->contrato->costo_sin_igv)*($concepto_pago->porcentaje)/100;

              $igv=number_format($costo*0.18, 2);
              $total=number_format($costo*1.18, 2);

              if($costo*1.18 < 700){
                  $pago_proveedor=number_format($costo*1.18,2);
              }else{
                  $pago_proveedor=number_format($costo*1.18*(100-$concepto_pago->contrato->equipo->empresa->porcentaje_detraccion)/100,2);
              }

              echo '                              <div class="form-group row">
                                                      <label class="col-lg-3 col-form-label" for="subtotal"> Costo </label>

                                                      <div class="col-lg-8">
                                                          <input type="number" id="subtotal" name="subtotal" disabled="disabled" value= "'.number_format($costo,2).'" placeholder= "'.number_format($costo,2).'" class="form-control" />
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">
                                                      <label class="col-lg-3 col-form-label" for="form-field-1"> IGV (18%) </label>

                                                      <div class="col-lg-8">
                                                          <input type="number" id="igvfac" value= "'.$igv.'" placeholder= "'.$igv.'" disabled="disabled" class="form-control" />
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">
                                                      <label class="col-lg-3 col-form-label" for="form-field-1">Total </label>

                                                      <div class="col-lg-8">
                                                          <input type="number" id="totalfac" value= "'.$total.'" placeholder= "'.$total.'" disabled="disabled" class="form-control" />
                                                      </div>
                                                  </div>

                                                     <div class="form-group row">
                                                      <label class="col-lg-3 col-form-label" for="form-field-1">Pago proveedor</label>

                                                      <div class="col-lg-8">
                                                          <input type="number" id="detracfac" value= "'.$pago_proveedor.'" placeholder= "'.$pago_proveedor.'" disabled="disabled" class="form-control" />
                                                      </div>
                                              </div>';
            }



          }
          else{
            echo '';
          }
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
        can('editar-facturas');
        $factura = Factura::findOrFail($id);
        // $contrato = Contrato::findOrFail($factura->concepto_pago->contrato);
        $contratos= Contrato::with('conceptos_pago','equipo')->where('estado','Abierto')->orderBy('id')->get();

        return view('dinamica.ventas.factura.editar', compact('factura', 'contratos'));
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
    public function eliminar(Request $request, $id)
    {
        can('eliminar-facturas');
        if ($request->ajax()) {

            $conceptopago_id = Factura::findOrFail($id)->concepto_pago_id;
            if (Factura::destroy($id)) {
                Concepto_pago::findOrFail($conceptopago_id)->update(['estado_conceptopago_id' => 1 ]);
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }


    public function procesar(Request $request, $id)
    {
        can('procesar-facturas');
        if ($request->ajax()) {
            if (Factura::findOrFail($id)->update(['estado_factura_id' => 2 ])) {
                return response()->json(['mensaje' => 'ok','id'=>$id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function pagar(Request $request, $id)
    {
        can('pagar-facturas');
        $pago = $_POST['pago'];
        $fecha_pago = $_POST['fecha_pago'];
        Pagar_factura::create(['factura_id'=>$id, 'pago'=>$pago, 'fecha'=>$fecha_pago]);
        Factura::findOrFail($id)->update(['estado_factura_id' => 3]);
        $factura = Factura::findOrFail($id);
        Concepto_pago::findOrFail($factura->concepto_pago_id)->update(['estado_conceptopago_id'=>3]);
        $pagar_factura_id = Pagar_factura::orderBy('created_at','desc')->first()->id;

        Asiento_contable::create([
            'fecha'=>$fecha_pago,
            'glosa'=>'Pago de la factura número '.$factura->numero,
            'asientoable_id'=>$pagar_factura_id,
            'asientoable_type'=>'App\Models\Ventas\Pagar_factura'
        ]);
        $asiento_contable_id = Asiento_contable::orderBy('created_at','desc')->first()->id;
        $cuenta_corriente_principal = Cuenta_contable::where('codigo','10411')->value('id');
        $cuenta_por_cobrar = Cuenta_contable::where('codigo','1212')->value('id');

        Asiento_cuenta::create([
            'cuenta_contable_id'=>$cuenta_corriente_principal,
            'asiento_contable_id'=>$asiento_contable_id,
            'debe'=>$pago
        ]);
        Asiento_cuenta::create([
            'cuenta_contable_id'=>$cuenta_por_cobrar,
            'asiento_contable_id'=>$asiento_contable_id,
            'haber'=>$pago
        ]);

        $sueldo1 = Cuenta_contable::findOrFail($cuenta_corriente_principal)->saldo;
        Cuenta_contable::findOrFail($cuenta_corriente_principal)->update(['saldo'=>$sueldo1+$pago]);
        $sueldo2 = Cuenta_contable::findOrFail($cuenta_por_cobrar)->saldo;
        Cuenta_contable::findOrFail($cuenta_por_cobrar)->update(['saldo'=>$sueldo2-$pago]);


        return response()->json(['mensaje'=>'ok','id'=>$id, 'pago'=>$pago,'fecha_pago'=>$fecha_pago]);
    }


    public function detraer(Request $request, $id)
    {
        can('detraer-facturas');
        $pago_detraccion = $_POST['pago_detraccion'];
        $fecha_detraccion = $_POST['fecha_detraccion'];
        Detraer_factura::create(['factura_id'=>$id, 'pago_detraccion'=>$pago_detraccion, 'fecha'=>$fecha_detraccion]);

        $detraccion_id = Detraer_factura::orderBy('created_at','desc')->first()->id;
        $factura = Factura::findOrFail($id);
        Asiento_contable::create([
            'fecha'=>$fecha_detraccion,
            'glosa'=>'pago de detracción de la factura N° '.$factura->numero,
            'asientoable_id'=>$detraccion_id,
            'asientoable_type'=>'App\Models\Ventas\Detraer_factura'
        ]);
        $asiento_contable_id = Asiento_contable::orderBy('created_at','desc')->first()->id;
        $cuentas_fines_especificos = Cuenta_contable::where('codigo','1042')->value('id');
        $cuentas_por_cobrar = Cuenta_contable::where('codigo','1212')->value('id');

        Asiento_cuenta::create([
            'cuenta_contable_id'=>$cuentas_fines_especificos,
            'asiento_contable_id'=>$asiento_contable_id,
            'debe'=>$pago_detraccion
        ]);
        Asiento_cuenta::create([
            'cuenta_contable_id'=>$cuentas_por_cobrar,
            'asiento_contable_id'=>$asiento_contable_id,
            'haber'=>$pago_detraccion
        ]);
        $saldo1 = Cuenta_contable::findOrFail($cuentas_fines_especificos)->saldo;
        Cuenta_contable::findOrFail($cuentas_fines_especificos)->update(['saldo'=>$saldo1 + $pago_detraccion]);
        $saldo2 = Cuenta_contable::findOrFail($cuentas_por_cobrar)->saldo;
        Cuenta_contable::findOrFail($cuentas_por_cobrar)->update(['saldo'=>$saldo2 - $pago_detraccion]);

        return response()->json(['mensaje'=>'ok','id'=>$id, 'pago_detraccion'=>$pago_detraccion]);
    }


    public function anular(Request $request, $id)
    {
        can('anular-facturas');
        $fecha_anulacion = $_POST['fecha_anulacion'];
        $motivo_anulacion = $_POST['motivo_anulacion'];
        Anular_factura::create(['factura_id'=>$id, 'motivo'=>$motivo_anulacion, 'fecha'=>$fecha_anulacion]);
        Factura::findOrFail($id)->update(['estado_factura_id' => 4]);

        $conceptopago_id = Factura::findOrFail($id)->concepto_pago_id;
        Concepto_pago::findOrFail($conceptopago_id)->update(['estado_conceptopago_id' => 1 ]);

        return response()->json(['mensaje'=>'ok','id'=>$id, 'fecha_anulacion'=>$fecha_anulacion,'motivo_anulacion'=>$motivo_anulacion]);
    }



}
