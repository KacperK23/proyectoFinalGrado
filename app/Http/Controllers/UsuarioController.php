<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function editar($id) {
        $usuario = Usuario::find($id);
        return view('configuracion', array('usuario' => $usuario));
    }
    public function actualizarDatos($id, Request $r) {
        $usuario = Usuario::find($id);
        $usuario->name = $r->name;
        $usuario->apellido = $r->apellido;
        $usuario->email = $r->email;
        $usuario->telefono = $r->telefono;
        $usuario->save();

        return redirect()->route('mostrarperfil', ['id' => $id]);
    }

    public function insertarUsuario(Request $request)
    {
        // Valida y crea un nuevo usuario
        $usuario = Usuario::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'dni'=> strtoupper($request->dni),
            'apellido'=> $request->apellido,
            'telefono'=> $request->telefono,
            'rol_id'=> 2,
        ]);

        return redirect()->route('mostrar_datos');
    }

    public function editarUsuario($id) {
        $usuario = Usuario::find($id);
        return view('usuario.formulario', array('usuario' => $usuario));
    }
    public function actualizarUsuario($id, Request $r) {
        $usuario = Usuario::find($id);
        $usuario->email = $r->email;
        $usuario->password = bcrypt($r->password);
        $usuario->name = $r->name;
        $usuario->dni = strtoupper($r->dni);
        $usuario->apellido = $r->apellido;
        $usuario->telefono = $r->telefono;
        $usuario->save();
        
        return redirect()->route('mostrar_datos');
    }

    public function eliminarUsuario($id) {
        $p = Usuario::find($id);
        $p->delete();
        return redirect()->route('mostrar_datos');
    }

    public function actualizarContrasena($id, Request $r)
    {
        $usuario = Usuario::find($id);

        // Verificar la contraseña actual
        if (!Hash::check($r->contrasenaActual, $usuario->password)) {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta.');
        }

        // Actualizar la contraseña
        $usuario->password = Hash::make($r->contrasenaNueva);
        $usuario->save();

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'La contraseña se ha cambiado correctamente.');
    }
}
