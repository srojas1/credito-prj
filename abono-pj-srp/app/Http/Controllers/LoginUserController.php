<?php
namespace App\Http\Controllers;

use App\Intendente;
use App\Usuario;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginUserController extends Controller
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
    public function index()
    {
        return view('ingreso_usuario');
    }

    /**
     * Validar DNI: intendente/usuario
     */
    public function validateDNI(Request $request) {
        $dni = $request->input('dni');

        $matchData = ['dni' => $dni];
        $columnas  = ['dni','telefono'];

        $usuario   = Usuario::where($matchData)->select($columnas)->first();

        if(!empty($usuario)) {
            $telefonoIntendente = $usuario['telefono'];
           //Enviar SMS
            //enviarSMS($telefonoIntendente);
            $return['data']  = array(
                'telefono' =>$telefonoIntendente
            );
            return route('login', ['dni' => '47156198']);
        } else {
            return route('registro_usuario');
        }
    }
}
