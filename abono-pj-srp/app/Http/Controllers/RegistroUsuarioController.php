<?php
namespace App\Http\Controllers;

use App\Intendente;
use App\Usuario;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegistroUsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param Request $request
     */
    public function __construct() {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('registro_usuario');
    }

   public function registrarUsuario(Request $request) {
       $dni       = $request->input('dni');
       $nombres   = $request->input('nombre');
       $apellidos = $request->input('apellido');
       $telefono  = $request->input('telefono');

       try {
           $usuario = new Usuario();

           $usuario->dni = $dni;
           $usuario->nombres = $nombres;
           $usuario->apellidos = $apellidos;
           $usuario->telefono = $telefono;

           $usuario->save();
           $return['estado'] = true;

       } catch (\Exception $ex) {
           $return['estado'] = false;
           $return['error_msg'] = $ex;
       }

       return $return;
   }
}
