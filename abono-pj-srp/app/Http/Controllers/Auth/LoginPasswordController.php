<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginPasswordController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login_password';

    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index() {
//        return view('login_password');
//    }

    /**
     * Validar DNI: intendente/usuario
     */
    public function validatePassword(Request $request) {
        $password = $request->input('password');

        //validarPasswordConSMS()
        //enviarSMSRegistroExitoso()

        if($password == 1) {
            $return['estado'] = true;
        } else {
            $return['estado'] = false;
        }

        return $return;
    }
}
