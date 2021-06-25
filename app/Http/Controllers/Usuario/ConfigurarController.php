<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionCambiarPassword;
use App\Models\Seguridad\Trabajador;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class ConfigurarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dinamica.usuario.configurar.index');
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

    public function cambiarPassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required|min:6',
            're_password' => 'required|required_with:password|min:6|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        if(Trabajador::findOrFail(auth()->user()->id)->update(array_filter($request->all())))
        {
            return response()->json(['mensaje' => 'ok']);
        }else {
            return response()->json(['mensaje' => 'ng']);
        }
        // return redirect('usuario/configurar')->with('mensaje','Se cambió la contraseña de manera exitosa');
    }


    public function informacion()
    {
        $response = Trabajador::findOrFail(auth()->user()->id);
        return response()->json($response);
    }


    public function cambiarInformacion(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'direccion' => 'required|max:400',
            'botas' => 'required|max:5',
            'overol' => 'required|max:5',
            'celular' => 'required|max:9',
            'correo' => 'required|email|max:300',ValidationRule::unique('trabajador')->ignore(auth()->user()->id),
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        if(Trabajador::findOrFail(auth()->user()->id)->update(array_filter($request->all())))
        {
            return response()->json(['mensaje' => 'ok']);
        }else {
            return response()->json(['mensaje' => 'ng']);
        }
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
