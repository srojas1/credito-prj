<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function showLoginForm() {
        return view('ingreso_usuario');
    }

    public function login() {
        $credentials = $this->validate(request(), [
                'dni' => 'required|string',
                'password' => 'required|string'
            ]
        );

        if(Auth::attempt($credentials)) {
            return redirect('dashboard');
        }

        return back()->withErrors(['dni' => 'Estas credenciales no coinciden'])->withInput(request(['dni']));
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
