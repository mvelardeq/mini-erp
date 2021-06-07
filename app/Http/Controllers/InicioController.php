<?php

namespace App\Http\Controllers;

use App\Models\Social\Post;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('comentarios')->with('likes')->orderBy('created_at','desc')->get();
        return view("inicio");
    }
}
