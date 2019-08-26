<?php
namespace App\Http\Controllers;

use App\Abono;
use App\Intendente;
use App\Usuario;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Dashboard extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $abonos = Abono::all()->where('id_usuario', Auth::id());
        return view('dashboard', ["abonos"=>$abonos]);
    }
}
