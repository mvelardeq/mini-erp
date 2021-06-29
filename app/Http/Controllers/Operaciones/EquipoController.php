<?php

namespace App\Http\Controllers\Operaciones;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionEquipo;
use App\Models\Operaciones\Empresa;
use App\Models\Operaciones\Equipo;
use App\Models\Operaciones\Obra;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-equipos');
        $equipos= Equipo::with('obra')->orderBy('id','desc')->get();
        return view('dinamica.operaciones.equipo.index',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-equipos');
        $equipos= Equipo::with('obra')->orderBy('id','desc')->get();
        $obras= Obra::orderBy('id','desc')->get();
        $empresas = Empresa::orderBy('id')->get();
        return  view('dinamica.operaciones.equipo.crear',compact('equipos', 'obras','empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        can('crear-equipos');
        if ($plane = Equipo::setPlane($request->plano_up))
        {
            $request->request->add(['plano' => $plane]);
        }
        Equipo::create($request->all());
        return redirect('operaciones/equipo')->with('mensaje', 'Equipo creado con éxito');
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
        can('editar-equipos');
        $equipo = Equipo::findOrFail($id);
        $obras= Obra::orderBy('id','desc')->get();
        $empresas = Empresa::orderBy('id')->get();

        return view('dinamica.operaciones.equipo.editar', compact('equipo', 'obras', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionEquipo $request, $id)
    {
        can('editar-equipos');
        // Equipo::findOrFail($id)->update($request->all());
        $equipo = Equipo::findOrFail($id);
        if ($plane = Equipo::setPlane($request->plano_up, $equipo->plano))
            $request->request->add(['plano' => $plane]);
        $equipo->update(array_filter($request->all()));
        return redirect('operaciones/equipo')->with('mensaje', 'Equipo actualizado con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-equipos');
        $equipo = Equipo::findorFail($id);
        if ($request->ajax()) {
            if (Equipo::destroy($id)) {
                Storage::disk('s3')->delete("files/planes/$equipo->plano");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }



    public function subir(Request $request, $id)
    {
        // $plano = $_POST['plano'];
        $equipo = Equipo::findOrFail($id);
        $plane = Equipo::setPlane($request->planoModal, $equipo->plano);
        Equipo::findOrFail($id)->update(['plano'=>$plane]);

        // return dd($request->planoModal);

        return response()->json(['mensaje'=>'ok','id'=>$id, 'plano'=>$plane]);
    }
}
