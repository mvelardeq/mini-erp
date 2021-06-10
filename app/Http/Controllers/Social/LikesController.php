<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\Seguridad\Trabajador;
use App\Models\Social\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Likes::create(['trabajador_id'=>Auth::user()->id,'post_id'=>$id])) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }

    public function listar($id){

        $likes = Likes::with('trabajador')->where("post_id",$id)->orderBy("created_at",'desc')->get();

        $lista = '';

        foreach ($likes as $like) {
            // $lista .= '<h5> '.$like->trabajador->primer_nombre.' </h5>';
            $lista .=   '<div class="card-comment">
                            <div class="comment-text">
                                <span class="username">
                                    <span class="text-muted float-right">
                                        <button type="submit" class="btn btn-default btn-sm text-primary">
                                        <i class="far fa-thumbs-up"></i> Le gusta
                                        </button>
                                    </span>
                                </span>

                                '.$like->trabajador->primer_nombre.' '.$like->trabajador->primer_apellido.'
                            </div>
                        </div>';

        }

        echo '<div class="card-footer card-comments">'.$lista.'</div>';
        // echo $lista;
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
    public function eliminar(Request $request, $id)
    {
        $likeid = Likes::where('trabajador_id',Auth::user()->id)->where('post_id',$id)->first()->id;
        if ($request->ajax()) {
            if (Likes::destroy($likeid)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
