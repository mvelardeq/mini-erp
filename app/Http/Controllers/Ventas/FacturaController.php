<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Models\Operaciones\Equipo;
use App\Models\Ventas\Concepto_pago;
use App\Models\Ventas\Contrato;
use App\Models\Ventas\Estado_conceptopago;
use App\Models\Ventas\Factura;
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
        $facturas= Factura::with('concepto_pago')->orderBy('id','desc')->get();
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
        $contratos= Contrato::with('conceptos_pago','equipo')->where('estado','Abierto')->orderBy('id')->get();
        $conceptos_pago= Concepto_pago::orderBy('id')->get();
        $equipos= Equipo::orderBy('id')->get();
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
        Factura::create($request->all());
        $conceptopago_id = Factura::orderBy('created_at', 'desc')->first()->concepto_pago_id;

        Concepto_pago::findOrFail($conceptopago_id)->update(['estado_conceptopago_id' => 2 ]);
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
                  $pago_proveedor=number_format($costo*1.18*(100-$concepto_pago->contrato->empresa->porcentaje_detraccion)/100,2);
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
        $pago = $_POST['pago'];
        $fecha_pago = $_POST['fecha_pago'];
        Factura::findOrFail($id)->update(['estado_factura_id' => 3,'pago'=>$pago, 'fecha_pago'=>$fecha_pago]);
        return response()->json(['mensaje'=>'ok','id'=>$id]);

        // if ($request->ajax()) {
        //     if (Factura::findOrFail($id)->update(['estado_factura_id' => 3, 'pago' => $request->pago, 'fecha_pago' => $request->fecha_pago ])) {
        //         return response()->json(['mensaje' => 'ok','id'=>$id]);
        //     } else {
        //         return response()->json(['mensaje' => 'ng']);
        //     }
        // } else {
        //     abort(404);
        // }
    }

    public function anular(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Factura::findOrFail($id)->update(['estado_factura_id' => 4 ])) {
                return response()->json(['mensaje' => 'ok','id'=>$id]);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }



}
