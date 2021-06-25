<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Finanzas\Contabilidad\Asiento_contable;
use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use App\Models\Finanzas\Contabilidad\Cuenta_contable;
use App\Models\Finanzas\Transferencia;
use Illuminate\Http\Request;

class UsuarioCuentaCorrienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cuentas_corrientes = Cuenta_contable::where('responsable_id','!=',null)->get();
        $cuentas_corrientes = Cuenta_contable::where('responsable_id',auth()->user()->id)->get();
        return view('dinamica.usuario.cuenta-corriente.index',compact('cuentas_corrientes'));
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

    public function transferencia($id)
    {
        $cuenta_cargo = Cuenta_contable::findOrFail($id);
        $cuentas_contables = Cuenta_contable::where('responsable_id','!=',null)->where('id','!=',$id)->get();
        // return dd($cuentas_contables);
        return view('dinamica.usuario.cuenta-corriente.transferencia',compact('cuenta_cargo','cuentas_contables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarTransferencia(Request $request,$id)
    {
        $cuenta_cargo = Cuenta_contable::findOrFail($id);
        $cuenta_abono = Cuenta_contable::findOrFail($request->cuentaabono_id);
        $request->request->add(['cuentacargo_id'=>$id]);
        Transferencia::create($request->all());
        $transferencia = Transferencia::orderBy('created_at','desc')->first();
            Asiento_contable::create([
                'fecha'=>$request->fecha,
                'glosa'=>'Transferencia de la cuenta '.$cuenta_cargo->nombre.' a la cuenta '.$cuenta_abono->nombre,
                'asientoable_id'=>$transferencia->id,
                'asientoable_type'=>'App\Models\Finanzas\Transferencia'
            ]);
            $asiento_contable_id = Asiento_contable::orderBy('created_at','desc')->first()->id;
            Asiento_cuenta::create([
                'cuenta_contable_id'=>$request->cuentacargo_id,
                'asiento_contable_id'=>$asiento_contable_id,
                'haber'=>$request->cantidad
            ]);
            Asiento_cuenta::create([
                'cuenta_contable_id'=>$request->cuentaabono_id,
                'asiento_contable_id'=>$asiento_contable_id,
                'debe'=>$request->cantidad
            ]);
            $saldo1 = Cuenta_contable::findOrFail($request->cuentacargo_id)->saldo;
            Cuenta_contable::findOrFail($request->cuentacargo_id)->update(['saldo'=>$saldo1-$request->cantidad]);
            $saldo2 = Cuenta_contable::findOrFail($request->cuentaabono_id)->saldo;
            Cuenta_contable::findOrFail($request->cuentaabono_id)->update(['saldo'=>$saldo2+$request->cantidad]);

        return redirect('usuario/cuenta-corriente')->with('mensaje','Se realizó la transferencia de manera exitosa');
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
