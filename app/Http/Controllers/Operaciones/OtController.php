<?php

namespace App\Http\Controllers\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Operaciones\Estado_ot;
use App\Models\Operaciones\Ot;
use App\Models\Ventas\Contrato;
use Illuminate\Http\Request;

class OtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ots= Ot::with('contrato','trabajdor','estado_ot')->orderBy('id')->get();
        return view('dinamica.operaciones.ot.index',compact('ots'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $ots= Ot::with('contrato','trabajdor','estado_ot')->orderBy('id')->get();
        $contratos= Contrato::orderBy('id')->get();
        $estados_ot = Estado_ot::orderBy('id')->get();
        return  view('dinamica.operaciones.ot.crear',compact('ots', 'contratos','estados_ot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        //
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
        $ot= Ot::findOrFail($id);
        $contratos= Contrato::orderBy('id')->get();
        $estados_ot = Estado_ot::orderBy('id')->get();
        return  view('dinamica.operaciones.ot.editar',compact('ot', 'contratos','estados_ot'));
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
