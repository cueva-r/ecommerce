<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Mail\CambiarContraseñaMail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Hash;
use Mail;
use Str;

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
        return redirect(url(''));
    }

    public function login(Request $request)
    {
        $remember = !empty($request->is_remember) ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'estado' => 0, 'esta_eliminado' => 0], $remember)) {
            if (!empty(Auth::user()->email_verified_at)) {
                $json['status'] = true;
                $json['message'] = "success";
            } else {
                $save = User::getSingle(Auth::user()->id);

                Mail::to($save->email)->send(new RegisterMail($save));

                Auth::logout();

                $json['status'] = false;
                $json['message'] = "Tu correo electrónico no está verificado, por favor revisa tu inbox en mailtrap y verificalo!";
            }
        } else {
            $json['status'] = false;
            $json['message'] = "Email y/o contraseña inconrrectos, por favor introduzca datos correctos!";
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
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

            Mail::to($save->email)->send(new RegisterMail($save));

            $json['status'] = true;
            $json['message'] = "Cuenta creada con éxito!, Porfavor veirifique su correo electrónico en mailtrap!";
        } else {
            $json['status'] = false;
            $json['message'] = "Este correo ya existe, intente con otro porfavor!";
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }

    public function activar_email($id)
    {
        $id = base64_decode($id);
        $user = User::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect(url(''))->with("success", "Su correo electrónico ya está verificado");
    }

    public function cambiar_contrasena(Request $request)
    {
        $data['meta_titulo'] = "Cambiar contraseña";
        return view('auth.cambiar', $data);
    }

    public function verificar_cambiar_contrasena(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new CambiarContraseñaMail($user));

            return redirect()->back()->with('success', 'Por favor revisa tu correo electrónico en mailtrap y restablece tu contraseña');
        } else {
            return redirect()->back()->with('error', 'Correo electrónico no encontrado en el sistema.');
        }
    }

    public function cambiar($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $data['user'] = $user;
            $data['meta_titulo'] = "Reestablecer contraseña";
            return view('auth.restablecer', $data);
        } else {
            abort(404);
        }
    }

    public function verificar_cambiar($token, Request $request)
    {
        if ($request->password == $request->cpassword) {
            $user = User::where('remember_token', '=', $token)->first();
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();

            return redirect(url(''))->with('success', 'Contraseña reestablecida correctamente!');
        } else {
            return redirect()->back()->with('error', 'La contraseña y la contraseña de confirmación no coinciden');
        }
    }
}
