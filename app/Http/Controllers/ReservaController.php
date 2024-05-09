<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Usuario;
use App\Models\Oferta;
use App\Models\Habitacion;
use App\Models\Articulo;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

use function Laravel\Prompts\password;

class ReservaController extends Controller
{
    public function index() {
        $reservaList = Reserva::all();
        return $reservaList;
    }
    

    public function insertarReserva(Request $request){
        $fecha_inicio = $request->input('fechaEntrada');
        $fecha_salida = $request->input('fechaSalida');
        $dni = $request->input('dni');
        $idHabitacion = $request->input('idHabitacion');
        $cantidad = $request->input('cantidad');
        $oferta_id = $request->input('ofertaID');

        // Verificar si el usuario ya existe
        $persona = Usuario::where('dni', $dni)->first();

        if (!$persona) {
        // Crear nuevo usuario
        if ($request->password){
            $contrasena = bcrypt($request->password);
        } else{
            $contrasena = null;
        }
        $usuario = Usuario::create([            
            'email' => $request->email,
            'password' => $contrasena,
            'name' => $request->name,
            'dni'=> $dni,
            'apellido'=> $request->apellido,
            'telefono'=> $request->telefono,
            'rol_id'=> $request->rol_id,
            ]);
         // Obtener el ID del nuevo usuario creado
         $usuario_id = $usuario->id;
        } else {
            // Obtener el ID del usuario existente
            $usuario_id = $persona->id;
        }
        $reserva = Reserva::create([
            'fecha_entrada' => $fecha_inicio,
            'fecha_salida' => $fecha_salida,
            'usuario_id' => $usuario_id,
            'habitacion_id'=> $idHabitacion,
            'cantidad'=> $cantidad,
            'oferta_id'=> $oferta_id,
        ]);

        $data['resumenReserva'] = $reserva;
        return view('resumen', $data);
    }

    public function mostrarperfil($usuario_id) {
        // Encuentra todas las reservas asociadas con el usuario usando el DNI
        $reservas = Reserva::where('usuario_id', $usuario_id)->get();

        // Obtener la fecha actual
        $fechaActual = Carbon::now();

        // Encuentra todas las reservas asociadas con el usuario usando el DNI
        $reservasActuales = Reserva::where('usuario_id', $usuario_id)
        ->where('fecha_salida', '>=', $fechaActual)
        ->get();

        $data['reservasActuales'] = $reservasActuales;
        $data['reservas'] = $reservas;
        return view('perfil', $data);
    }
    public function mostrarreservaActuales($usuario_id) {
        // Encuentra todas las reservas asociadas con el usuario usando el DNI
        $reservas = Reserva::where('usuario_id', $usuario_id)->get();

        // Obtener la fecha actual
        $fechaActual = Carbon::now();

        if ($reservas->fecha_salida >= $fechaActual){
            $data['reservasActuales'] = $reservas;
            return view('perfil', $data);
        }
    }

    public function reservasHoy() {
        $fechaActual = Carbon::today(); // Esto obtiene la fecha actual sin la parte de la hora
    

        // Obtener todas las reservas que comienzan hoy
    $reservasHoy = Reserva::whereDate('fecha_entrada', '=', $fechaActual)->get();

    // Obtener todas las reservas que aún están vigentes (que comenzaron antes pero aún no han terminado)
    $reservasVigentes = Reserva::whereDate('fecha_entrada', '<', $fechaActual)
                                ->whereDate('fecha_salida', '>', $fechaActual)
                                ->get();

    $reservas = $reservasHoy->merge($reservasVigentes);
    return $reservas;
    }

    public function mostrarDatos() {
        $usuarios = Usuario::all();
        $ofertas = Oferta::all();
        $habitaciones = Habitacion::all();
        $articulos = Articulo::all();
        $reservasHoy = $this->reservasHoy();
        $reservaList = $this->index();
        // Llama a otras funciones para obtener más conjuntos de datos si es necesario
    
        return view('panelcentral', compact('reservasHoy', 'reservaList','usuarios',"ofertas","habitaciones","articulos")); // Puedes pasar más variables si es necesario
    }

    public function editarReserva($id) {
        $reserva = Reserva::find($id);
        $habitaciones = Habitacion::all();
        return view('reserva.formulario', array('reserva' => $reserva,'habitaciones' => $habitaciones));
    }
    public function actualizarDatos($id, Request $r) {
        $reserva = Reserva::find($id);
        $reserva->fecha_entrada = $r->fechaEntrada;
        $reserva->fecha_salida = $r->fechaSalida;
        $reserva->usuario_id = $r->usuario_id;
        $reserva->habitacion_id = $r->tipoHabitacion;
        $reserva->cantidad = $r->cantidad;
        $reserva->pagado = $r->pagado;
        $reserva->save();

        return redirect()->route('mostrar_datos');
    }

    public function eliminarReserva($id) {
        $p = Reserva::find($id);
        $p->delete();
        return redirect()->route('mostrar_datos');
    }

    public function reservaPDF($id){
        $resumenReserva = Reserva::find($id);
        $pdf = Pdf::loadView('reserva.ficheropdf', compact('resumenReserva'));
        return $pdf->download('invoice.pdf');
    }
}
