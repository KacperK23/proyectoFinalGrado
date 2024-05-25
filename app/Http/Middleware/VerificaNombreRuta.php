<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificaNombreRuta
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si la URL fue accedida directamente o a través de una ruta nombrada
        if (!$request->route()->getName()) {
            // Redirigir o abortar si no se accedió por nombre de ruta
            return abort(403, 'Acceso directo a la URL no permitido.');
        }

        return $next($request);
    }
}
