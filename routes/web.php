<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Gate;

Route::get('/', [HabitacionController::class, 'mostrarHabitaciones'])->name('inicio');

Route::get('/quienes-somos', function () {
    return view('quienessomos');
})->name('quienessomos');

Route::get('/disponibilidad', function () {
    return view('disponibilidad');
});
Route::get('/servicios', function () {
    return view('servicios');
})->name('servicios');

Route::get('/sitioscercanos', function () {
    return view('sitioscercanos');
})->name('sitioscercanos');

Route::get('/dondeestamos', function () {
    return view('dondeestamos');
})->name('dondeestamos');

Route::get('/perfil/{id}', [ReservaController::class, 'mostrarperfil'])->name('mostrarperfil');
Route::get('/configuracion/{id}/edit', [UsuarioController::class, 'editar'])->name('configuracion');
Route::post('/configuracion/{id}', [UsuarioController::class, 'actualizarDatos'])->name('editar');
//Route::resource('reserva', ReservaController::class);
Route::get('/panelcentral', [ReservaController::class, 'mostrarDatos'])->name('mostrar_datos');
Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'editarReserva'])->name('reserva.editar');
Route::post('/reservas/{reserva}', [ReservaController::class, 'actualizarDatos'])->name('reserva.actualizar');
Route::delete('/reservas/{reserva}', [ReservaController::class, 'eliminarReserva'])->name('reserva.eliminar');

Route::get('/oferta/{oferta}/edit', [OfertaController::class, 'editarOferta'])->name('oferta.editar');
Route::post('/oferta/{oferta}', [OfertaController::class, 'actualizarDatos'])->name('oferta.actualizar');
Route::delete('/oferta/{oferta}', [OfertaController::class, 'eliminarOferta'])->name('oferta.eliminar');
Route::post('/oferta', [OfertaController::class, 'insertarOferta'])->name('oferta.insertar');
Route::get('/info/oferta/{oferta}', [OfertaController::class, 'verOferta'])->name('oferta.mostrar');

Route::get('/articulo/{articulo}/edit', [ArticuloController::class, 'editarArticulo'])->name('articulo.editar');
Route::post('/articulo/{articulo}', [ArticuloController::class, 'actualizarDatos'])->name('articulo.actualizar');
Route::delete('/articulo/{articulo}', [ArticuloController::class, 'eliminarArticulo'])->name('articulo.eliminar');
Route::post('/articulo', [ArticuloController::class, 'insertarArticulo'])->name('articulo.insertar');

Route::get('/usuario/{usuario}/edit', [UsuarioController::class, 'editarUsuario'])->name('usuario.editar');
Route::post('/usuario/{usuario}', [UsuarioController::class, 'actualizarUsuario'])->name('usuario.actualizar');
Route::delete('/usuario/{usuario}', [UsuarioController::class, 'eliminarUsuario'])->name('usuario.eliminar');
Route::post('/usuario', [UsuarioController::class, 'insertarUsuario'])->name('usuario.insertar');
Route::post('/perfil/{id}/cambiarcontrasena', [UsuarioController::class, 'actualizarContrasena'])->name('usuario.actualizarContrasena');

Route::get('/habitacion/{habitacion}/edit', [HabitacionController::class, 'editarHabitacion'])->name('habitacion.editar');
Route::post('/habitacion/{habitacion}', [HabitacionController::class, 'actualizarHabitacion'])->name('habitacion.actualizar');
Route::delete('/habitacion/{habitacion}', [HabitacionController::class, 'eliminarHabitacion'])->name('habitacion.eliminar');
Route::post('/habitacion', [HabitacionController::class, 'insertarHabitacion'])->name('habitacion.insertar');

//Route::get('/ma', [OfertaController::class, 'imagenOferta']);

/*Para poner privacidad a una pagina 
Route::middleware(['auth'])->get('/quienes-somos', function () {
    return view('quienessomos');
}); */


Route::post('/consultar-disponibilidad', [HabitacionController::class, 'consultarDisponibilidad'])->name('consultarDisponibilidad');
Route::post('/reserva', [ReservaController::class, 'insertarReserva'])->name('insertarReserva');
Route::get('/reserva/{id}/pdf', [ReservaController::class, 'reservaPDF'])->name('reserva.reservaPDF')->middleware(\App\Http\Middleware\CheckNamedRoute::class);

// Rutas para mostrar formularios
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');

Route::middleware(['auth'])->group(function () {

    // Ruta solo para administradores
    Route::get('/privada', function () {
        Gate::authorize('isAdmin', auth()->user());
        return view('privada');
    })->name('privada');

});

// Rutas para procesar datos
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
