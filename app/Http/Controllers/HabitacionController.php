<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\Oferta;

class HabitacionController extends Controller
{
    //
    public function consultarDisponibilidad(Request $request)
{
    $fecha_inicio = $request->input('fechaEntrada');
    $fecha_fin = $request->input('fechaSalida');
    $tipo_habitacion = $request->input('tipoHabitacion');
    $cantidadHabitacionSolicitadas = $request->input('numeroHabitacion');
    
    if ($request->input('ofertaID')){
        $oferta_id = $request->input('ofertaID');
    } else {
        $oferta_id = null;
    };


    // Obtener todas las reservas que hay entre las fechas indicadas
    $reservas = Reserva::where('habitacion_id', $tipo_habitacion)
    ->where(function($query) use ($fecha_inicio, $fecha_fin) {
        $query->where(function($subQuery) use ($fecha_inicio, $fecha_fin) {
            $subQuery->where('fecha_entrada', '<=', $fecha_inicio)
                ->where('fecha_salida', '>=', $fecha_inicio);
        })
        ->orWhere(function($subQuery) use ($fecha_inicio, $fecha_fin) {
            $subQuery->whereBetween('fecha_entrada', [$fecha_inicio, $fecha_fin])
                ->orWhereBetween('fecha_salida', [$fecha_inicio, $fecha_fin]);
        });
    })
    ->count();

    // Obtener el total de reservas que hay el mismo dia de inicio de una reserva que la salida de otra y 
    //restarlo ya que marca como reserva el mismo dia.
    $reservasDia = Reserva::where('fecha_salida', '=', $fecha_inicio)
    ->where('habitacion_id', $tipo_habitacion)->get();
    foreach ($reservasDia as $reserva) {
        if ($fecha_inicio == $reserva->fecha_salida) {
            $reservas--;
        }
    }

     // Obtener el total de reservas que hay el mismo dia de inicio de una reserva que la salida de otra y 
    //restarlo ya que marca como reserva el mismo dia.
    $reservasFin = Reserva::where('fecha_entrada', '=', $fecha_fin)
    ->where('habitacion_id', $tipo_habitacion)->get();
    foreach ($reservasFin as $reserva) {
        if ($fecha_fin == $reserva->fecha_entrada) {
            $reservas--;
        }
    }

    //Cantidad de habitacion de la categoria especificada
    $cantidad = Habitacion::where('id', $tipo_habitacion)->value('cantidad');
    
    //Cantidad de habitacion disponibles
    $total = $cantidad - $reservas;

    $nombreHabitacion = Habitacion::find($tipo_habitacion)->tipo;

    //Condicion que mira si hay disponibilidad de la cantida de habitaciones solicitadas y ejecuta una vista u otra.
    if ($total>=$cantidadHabitacionSolicitadas){
  // Puedes enviar $disponibilidad y las fechas formateadas a la vista
  return view('disponibilidad', [
    'reservas' =>$reservas,
    'oferta_id' => $oferta_id,
    'total' => $total, 'fehcaInicio' => $fecha_inicio, 'fechaFin' => $fecha_fin, 'nombreHabitacion' => $nombreHabitacion , 'tipo_habitacion' => $tipo_habitacion, 'cantidad' => $cantidadHabitacionSolicitadas
]); 
    }else {
        return view('nodisponibilidad');
    }
}
public function mostrarHabitaciones()
{
    $habitacion = Habitacion::all();
    $ofertas = Oferta::all();
    return view('index', ['habitaciones'=>$habitacion,'ofertas'=>$ofertas]);
}

public function editarHabitacion($id) {
    $habitacion = Habitacion::find($id);
    return view('habitacion.formulario', array('habitacion' => $habitacion));
}
public function actualizarHabitacion($id, Request $r) {
    $habitacion = Habitacion::find($id);
    $habitacion->tipo = $r->tipo;
    $habitacion->precio = $r->precio;
    $habitacion->cantidad = $r->cantidad;
    $habitacion->save();
    
    return redirect()->route('mostrar_datos')->with('success', 'Habitacion actualizar correctamente');
}

public function eliminarHabitacion($id) {
    $p = Habitacion::find($id);
    $p->delete();
    return redirect()->route('mostrar_datos')->with('success', 'Habitacion eliminado correctamente');
}

public function insertarHabitacion(Request $r){
    $habitacion = Habitacion::create([  
    'tipo' => $r->tipo,
    'precio' => $r->precio,
    'cantidad' => $r->cantidad,
    ]);
    
    return redirect()->route('mostrar_datos')->with('success', 'Habitacion insertar correctamente');
}
}
    
