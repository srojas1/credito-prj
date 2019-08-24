<?php
namespace App\Http\Controllers;

use App\Intendente;
use App\Usuario;
use GuzzleHttp\Client;
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

    /**
     * @param $telefono
     */
    private function sendSMS($telefono) {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api2.gamacom.com.pe',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $apikey    = "9585E2532034";
        $apicard   = "1293309859";
        $smstext   = "Registro exitoso";
        $smstype   = "0";

        $response = $client->request('POST', 'http://api2.gamacom.com.pe/smssend', [
            'form_params' => [
                'apicard'  => urlencode($apicard),
                'apikey'   => urlencode($apikey),
                'smsnumber'=> urlencode($telefono),
                'smstext'  => urlencode($smstext),
                'smstype'  => urlencode($smstype),
            ]
        ]);
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

           $this->sendSMS($telefono);

           $return['estado'] = true;

       } catch (\Exception $ex) {
           $return['estado'] = false;
           $return['error_msg'] = $ex;
       }

       return $return;
   }
}
