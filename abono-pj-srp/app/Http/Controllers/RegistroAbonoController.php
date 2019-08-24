<?php
namespace App\Http\Controllers;

use App\Abono;
use App\Intendente;
use App\Usuario;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RegistroAbonoController extends Controller
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
        return view('registro_abono');
    }

    /**
     * Obtener Intendente
     */
    public function obtenerIntendente(Request $request) {
        $dniIntendente = $request->input('dni_intendente');

        $matchData = ['dni' => $dniIntendente];
        $columnas  = ['id','dni','nombres','apellidos','telefono'];

        $intendente   = Intendente::where($matchData)->select($columnas)->first();

        if(!empty($intendente)) {
            $nombresIntendente = $intendente['telefono'];
            $apellidosIntendente = $intendente['nombres'];
            $telefonoIntendente = $intendente['apellidos'];
            $idIntendente = $intendente['id'];
            $return['data']  = array(
                'nombres_intendente' =>$nombresIntendente,
                'apellidos_intendente' =>$apellidosIntendente,
                'telefono' =>$telefonoIntendente,
                'id_intendente' =>$idIntendente
            );

            $return['estado'] = true;
        } else {
            $return['estado'] = false;
        }
        return $return;
    }

    function getFullURLFile($endpoint) {
        $url = \Request::url();
        $replacedURL = str_replace($endpoint, '', $url) ;
        return $replacedURL.'/uploads/';
    }

    public function registrarAbono(Request $request) {
        $idIntendente  = $request->input('id_intendente');
        $dniIntendente = $request->input('dni_intendente');
        $importe       = $request->input('importe');

        $matchData = ['dni' => $dniIntendente];

        $abono = new Abono();

        $abono->id_usuario  = Auth::user()->id;
        $abono->dni_usuario = Auth::user()->dni;
        $abono->id_abonado  = $idIntendente;
        $abono->dni_abonado = $dniIntendente;
        $abono->importe = $importe;

        $abono->fecha = date("Y-m-d h:i:s", time());

        $destinationPath = "upload/";
        $file = $request->file('file_abono');
        if($file->isValid()){
            $file->move($destinationPath, $file->getClientOriginalName());
            $abono->url = $this->getFullURLFile('registro_abono').$file->getClientOriginalName();
        }

        try {
            $abono->save();
            $return['estado'] = true;
        } catch (\Exception $ex) {
            $return['estado'] = false;
        }
        return $return;
    }
}
