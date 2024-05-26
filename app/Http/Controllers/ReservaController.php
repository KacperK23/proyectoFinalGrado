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
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreoReserva;
use Dompdf\Dompdf;
use Dompdf\Options;

use function Laravel\Prompts\alert;
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
            'baja'=> 0,
            'rol_id'=> $request->rol_id,
            ]);
         // Obtener el ID del nuevo usuario creado
         $usuario_id = $usuario->id;
        } else {
            $usuario = $persona;
            // Obtener el ID del usuario existente
            $usuario_id = $usuario->id;
        }
        $reserva = Reserva::create([
            'fecha_entrada' => $fecha_inicio,
            'fecha_salida' => $fecha_salida,
            'usuario_id' => $usuario_id,
            'habitacion_id'=> $idHabitacion,
            'cantidad'=> $cantidad,
            'oferta_id'=> $oferta_id,
            'pagado'=> 0,
        ]);

        // Llamar a la función para generar y guardar el PDF
        // Crear PDF sin guardarlo en disco
        $resumenReserva = $reserva;
        // Configura las opciones de Dompdf
        $options = new Options();
        $options->set('isPhpEnabled', true); // Habilita el soporte PHP
        $options->set('isRemoteEnabled', true); // Habilita la carga de recursos remotos
        
        // Inicializa Dompdf con las opciones configuradas
        $dompdf = new Dompdf($options);
        
        // Establece la ruta base para las rutas de las imágenes
        $dompdf->setBasePath(asset('/'));

    $html = view('reserva.ficheropdf', compact('resumenReserva'))->render();
    $dompdf->loadHtml($html);
    $dompdf->render();
    $pdfContents = $dompdf->output();

    
        $receivers = $usuario->email;
        //Mail::to($receivers)->send(new EnviarCorreoReserva($reserva,$pdfContents));

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

    public function graficoReservas()
    {
        // Establecer el locale a español para Carbon
        Carbon::setLocale('es');

        $currentDate = Carbon::now();
        $oneYearAgo = $currentDate->copy()->subYear();

        $sales = Reserva::selectRaw('YEAR(fecha_entrada) as year, MONTH(fecha_entrada) as month, COUNT(*) as total')
            ->whereBetween('fecha_entrada', [$oneYearAgo, $currentDate])
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Arrays to hold month names and totals
        $months = [];
        $totals = [];

        for ($i = 0; $i <= 11; $i++) {
            $date = $currentDate->copy()->subMonths($i);
            $months[$date->format('Y-m')] = ucfirst($date->translatedFormat('F Y'));  // Use translatedFormat
            $totals[$date->format('Y-m')] = 0;
        }

        // Populate the totals array with the actual data from the query
        foreach ($sales as $sale) {
            $key = "{$sale->year}-" . str_pad($sale->month, 2, '0', STR_PAD_LEFT);
            if (isset($totals[$key])) {
                $totals[$key] = $sale->total;
            }
        }

        // Reverse the arrays to have them in chronological order
        $months = array_reverse($months);
        $totals = array_reverse($totals);

         // Obtener todas las reservas
         $reservas = Reserva::all();

         // Inicializar el total facturado
         $totalFacturado = 0;
 
         // Iterar sobre cada reserva y sumar el precio de la habitación al total
         foreach ($reservas as $reserva) {
             $totalFacturado += $reserva->habitacion->precio;
         }


        /*------------------------------------------------------------------------ */
         // Obtener el año actual
         $anioActual = Carbon::now()->year;

         // Obtener las reservas desde el 1 de enero del año actual hasta hoy
         $reservasAnio = Reserva::whereYear('fecha_entrada', $anioActual)
                             ->get();
 
         // Inicializar el total facturado
         $totalFacturadoAnio = 0;
 
         // Iterar sobre cada reserva y sumar el precio de la habitación al total
         foreach ($reservasAnio as $reservaAnio) {
             $totalFacturadoAnio += $reservaAnio->habitacion->precio;
         }
        return view('reserva.estadisticasAdmin', [
            'months' => array_values($months),
            'totals' => array_values($totals),
            'anioActual' => $anioActual,
            'totalFacturadoAnio' => $totalFacturadoAnio,
            'totalFacturado' => $totalFacturado
        ]);
    }
}
