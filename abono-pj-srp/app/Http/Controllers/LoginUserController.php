<?php
namespace App\Http\Controllers;

use App\Intendente;
use App\Usuario;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;

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
     * @param $telefono
     */
    private function sendSMS($telefono) {

        $tokenSMS =  rand(10000,99999);

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://api2.gamacom.com.pe',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $apikey    = "9585E2532034";
        $apicard   = "1293309859";
        $smstext   = "Su clave de acceso es ". $tokenSMS;
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

        return $tokenSMS;
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

            $claveUsuario = $this->sendSMS($telefonoIntendente);

            Usuario::where('dni', $dni)->update(array('password' => Hash::make($claveUsuario)));

            $return['data']  = array(
                'telefono' =>$telefonoIntendente
            );
            return route('login', ['dni' => $dni,'sms_success'=>1]);
        } else {
            return route('registro_usuario');
        }
    }
}
