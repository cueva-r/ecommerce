<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Hash;

class AuthController extends Controller
{
    public function login_admin()
    {
        if (!empty(Auth::check()) && Auth::user()->es_admin == 1) {
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'es_admin' => 1, 'estado' => 0, 'esta_eliminado' => 0], $remember)) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Email y/o contraseña inconrrectos');
        }
    }

    public function cerrar_sesion_admin()
    {
        Auth::logout();
        return redirect('admin');
    }
}
