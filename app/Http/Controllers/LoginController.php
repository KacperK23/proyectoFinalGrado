<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Verificar si el usuario existe y no está dado de baja
        $user = Usuario::where('email', $credentials['email'])->first();
    
        if ($user) {
            if ($user->baja == 1) {
                return back()->withErrors(['email' => 'Este usuario está dado de baja.']);
            }
        
            if (Auth::attempt($credentials)) {
                return redirect()->intended("/");
            }
        
            // Autenticación fallida
            return back()->with('error', 'Usuario o contraseña incorrecta');
        }

        // Autenticación fallida
        return back()->with('error', 'Usuario o contraseña incorrecta');
    }

    public function register(Request $request)
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

        if ($usuario) {
            Auth::login($usuario);
            return redirect('perfil/'.$usuario->id);
        } else {
            // Manejar el error, por ejemplo:
            return back()->with('error', 'No se pudo registrar el usuario');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function showPrivatePage()
    {
        return view('privada');
    }
}