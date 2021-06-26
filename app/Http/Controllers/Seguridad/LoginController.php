<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use App\Models\Seguridad\Trabajador;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/inicio';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dinamica.seguridad.index');
    }

    protected function authenticated(Request $request, $user)
    {
        // $request->session()->flush();
        $roles = $user->roles()->get();
        if ($roles->isNotEmpty() && isset(Trabajador::findOrFail(auth()->user()->id)->periodos->last()->fecha_inicio) && !isset(Trabajador::findOrFail(auth()->user()->id)->periodos->last()->fecha_fin)) {
            $user->setSession($roles->toArray());
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('/seguridad/login')->withErrors(['error' => 'Este trabajador no tiene un rol activo']);
        }
    }

    public function username()
    {
        return 'usuario';
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('seguridad/login');
    }

}
