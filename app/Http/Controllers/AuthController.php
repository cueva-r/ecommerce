<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function registro(Request $request)
    {
        $checkEmail = User::checkEmail($request->email);

        if (empty($checkEmail)) {
            $save = new User;

            $save->name = trim($request->name);
            $save->email = trim($request->email);
            $save->password = Hash::make($request->password);
            $save->save();

            $json['status'] = true;
            $json['message'] = "Cuenta creada con éxito!";
        }else{
            $json['status'] = false;
            $json['message'] = "Este correo ya existe, intente con otro porfavor!";
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
}
