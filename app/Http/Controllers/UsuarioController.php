<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreoFormularioContacto;
use App\Mail\EnviarCorreoRecuperarContrasena;

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

        return redirect()->route('mostrarperfil', ['id' => $id])->with('success', 'Perfil actualizado correctamente');
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
            'baja'=> 0,
            'rol_id'=> 2,
        ]);

        return redirect()->route('mostrar_datos')->with('success', 'Usuario insertado correctamente');
    }

    public function editarUsuario($id) {
        $usuario = Usuario::find($id);
        return view('usuario.formulario', array('usuario' => $usuario));
    }
    public function actualizarUsuario($id, Request $r) {
        $usuario = Usuario::find($id);
        $usuario->email = $r->email;
        // Verificar si se ha proporcionado una nueva contraseña
        if (!empty($r->password)) {
        // Si se proporciona una nueva contraseña, actualiza la contraseña del usuario
        $usuario->password = bcrypt($r->password);
        }
        $usuario->name = $r->name;
        $usuario->dni = strtoupper($r->dni);
        $usuario->apellido = $r->apellido;
        $usuario->telefono = $r->telefono;
        $usuario->baja = $r->baja;
        $usuario->save();
        
        return redirect()->route('mostrar_datos')->with('success', 'Usuario actualizado correctamente');
    }

    public function eliminarUsuario($id) {
        $p = Usuario::find($id);
        $p->delete();
        return redirect()->route('mostrar_datos')->with('success', 'Usuario eliminado correctamente');
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

    public function darseBajaUsuario($id, Request $r)
    {
        $usuario = Usuario::find($id);

        // Verificar la contraseña actual
        if (!Hash::check($r->contrasena, $usuario->password)) {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta.');
        }

        // Actualizar la contraseña
        if ($r->has('checkBaja')){
            $usuario->baja = 1;
            Auth::logout();
            $usuario->save();
            return redirect('/')->with('status', 'Te has dado de baja correctamente.');
        } else {
            $usuario->baja = 0;
            $usuario->save();

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'El usuario no se ha dado de baja.');
        }
    }


    public function showFormularioContactanos()
    {
        return view('formulariocontacto');
    }
    public function enviarFormularioContactanos(Request $r)
    {
        $nombreUsuario = $r->nombre;
        $correoUsuario = $r->email;
        $contenidoTexto = $r->duda;

        $receivers = ['kacpermaellakon@gmail.com'];
        Mail::to($receivers)->send(new EnviarCorreoFormularioContacto($nombreUsuario, $correoUsuario, $contenidoTexto));

        // Redirige a la página de inicio con un mensaje de éxito
        return redirect('/')->with('success', 'Correo enviado con éxito');

    }
    public function generarContrasena(Request $r)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!/()?¿-*+';
        $contrasena = '';

        for ($i=0; $i<10; $i++){
            $numeroAleatorio = random_int(0, strlen($caracteres) - 1);
            $contrasena .= $caracteres[$numeroAleatorio];
        }

        $usuario = Usuario::where('email', $r->emailUsuario)->first();
    if ($usuario) {
        $usuario->password = bcrypt($contrasena);
        $usuario->save();

        $emailUsuario = $usuario->email;
        Mail::to($emailUsuario)->send(new EnviarCorreoRecuperarContrasena($contrasena, $emailUsuario));

        return redirect()->back()->with('success', 'La contraseña se ha cambiado correctamente.');
    } else {
        return redirect()->back()->with('error', 'El usuario no existe.');
    }
    }

}
