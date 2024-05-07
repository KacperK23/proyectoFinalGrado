@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<div class="container">
    <h1>Resumen de la Reserva</h1>
    <p><strong>Fecha de Entrada:</strong> {{ $resumenReserva->fecha_entrada }}</p>
    <p><strong>Fecha de Salida:</strong> {{ $resumenReserva->fecha_salida }}</p>
    <p><strong>DNI:</strong> {{ $resumenReserva->usuario->dni }}</p>
    <p><strong>Tipo de Habitación:</strong> {{ $resumenReserva->habitacion->tipo }}</p>
    <p><strong>Cantidad de habitaciones:</strong> {{ $resumenReserva->cantidad }}</p>

    <a href="{{ route('reserva.reservaPDF',[$resumenReserva->id])}}">
      <button class="btn btn-primary" type="button">DESCARGAR RESERVA EN PDF</button>
  </a>
    @if(auth()->check())
    <a href="{{ route('mostrarperfil',[auth()->user()->id])}}">
        <button class="btn btn-primary" type="button">PERFIL DE USUARIO</button>
    </a>
  @endif
</div>
  
@endsection
