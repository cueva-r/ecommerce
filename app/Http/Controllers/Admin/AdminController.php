<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function listar()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = 'Administrador';
        return view('admin.admin.list', $data);
    }

    public function agregar()
    {
        $data['header_title'] = 'Agregar administrador';
        return view('admin.admin.agregar', $data);
    }

    public function insertar(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);

        $usuario = new User;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->estado = $request->estado;
        $usuario->es_admin = 1;
        $usuario->save();

        return redirect('admin/admin/listar')->with('success', 'Administrador agregado exitosamente');
    }

    public function editar($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['header_title'] = 'Editar administrador';
        return view('admin.admin.editar', $data);
    }

    public function actualizar($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id
        ]);

        $usuario = User::getSingle($id);
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;

        if (!empty($request->password)) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->estado = $request->estado;
        $usuario->es_admin = 1;
        $usuario->save();

        return redirect('admin/admin/listar')->with('success', 'Administrador editado exitosamente');
    }

    public function eliminar($id)
    {
        $usuario = User::getSingle($id);
        $usuario->esta_eliminado = 1;
        $usuario->save();

        return redirect()->back()->with('success', 'Administrador eliminado exitosamente');
    }
}
