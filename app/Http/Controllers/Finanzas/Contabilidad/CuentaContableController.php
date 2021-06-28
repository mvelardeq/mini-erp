<?php

namespace App\Http\Controllers\Finanzas\Contabilidad;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCuentaContable;
use App\Models\Administracion\Servicio_tercero;
use App\Models\Finanzas\Contabilidad\Asiento_contable;
use App\Models\Finanzas\Contabilidad\Asiento_cuenta;
use App\Models\Finanzas\Contabilidad\Cuenta_contable;
use App\Models\Seguridad\Trabajador;
use Illuminate\Http\Request;

class CuentaContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-cuentas-contables');
        $cuentas_contable = Cuenta_contable::orderBy('codigo','asc')->get();
        $trabajadores = Trabajador::orderBy('id')->get();
        return view('dinamica.finanzas.contabilidad.cuenta-contable.index',compact('cuentas_contable','trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-cuentas-contables');
        $trabajadores = Trabajador::orderBy('id')->get();
        return view('dinamica.finanzas.contabilidad.cuenta-contable.crear', compact('trabajadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionCuentaContable $request)
    {
        can('crear-cuentas-contables');
        Cuenta_contable::create($request->all());

        return redirect('finanzas/contabilidad/cuenta-contable')->with('mensaje','Cuenta contable creada con éxito');
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
    public function editar($id)
    {
        can('editar-cuentas-contables');
        $cuenta_contable = Cuenta_contable::findOrFail($id);
        $trabajadores = Trabajador::orderBy('id')->get();
        return view('dinamica.finanzas.contabilidad.cuenta-contable.editar',compact('trabajadores','cuenta_contable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionCuentaContable $request, $id)
    {
        can('editar-cuentas-contables');
        Cuenta_contable::findOrFail($id)->update($request->all());
        return redirect('finanzas/contabilidad/cuenta-contable')->with('mensaje','La cuenta contable se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-cuentas-contables');
        if ($request->ajax()) {
            if (Cuenta_contable::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
