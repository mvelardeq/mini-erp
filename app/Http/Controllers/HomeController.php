<?php

namespace App\Http\Controllers;

use App\Models\Social\Post;
use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

use Dompdf\Dompdf;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('trabajador')->with('comentarios')->with('likes')->orderBy('created_at','desc')->get();

        return view('dinamica.inicio', compact('posts'));

    }
    public function guardar(Request $request)
    {
        // $name=$request->file("foto_up")->getClientOriginalName();
        // $photo = $request->file("foto_up");
        // Storage::disk('s3')->put('photos',$photo);
        // $url = Storage::disk('s3')->url('photos/mfolVjh1ippk9NECcEbMybSiCuQJ0vo28Pf7YasO.jpg');

        // return dd($url);
        return dd(Config::get('filesystems'));

    }
}
