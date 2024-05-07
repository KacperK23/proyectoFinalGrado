@extends("master")

@section("title", "Albergues Kacper")

@section("content")
@if($total <= 0)
    <!-- Mostrar este bloque si el resultado es 0 -->
    <div>
        <h1>No se ha encontraron disposicio de la haitacion para estos dias.</h1>
        <p>Vuelve al incio para buscar disposicion para otro dia</p>
        <p>{{$total}}</p>
        <a href="{{ url('/') }}">
            <button type="button">Ir a la página principal</button>
        </a>
    </div>
@else
<form action="{{ route('insertarReserva') }}" method="post" class="formulariosFondoGris">
    @csrf
    <!--
    @if(auth()->check())
    <p>Usuario autorizado</p>
    @else 
    <p>Usuario no autorizado</p>
    @endif
    <p>{{$reservas}}</p>
    <p>Total{{$total}}</p>
    -->
    <div class="mb-3">
        <label for="fechaEntrada" class="form-label">FECHA DE ENTRADA</label>
        <input type="date" id="fechaEntrada" name="fechaEntrada" class="form-control" value="{{ $fehcaInicio }}" readonly>
    </div>
    <div class="mb-3">
        <label for="fechaSalida" class="form-label">FECHA DE SALIDA</label>
        <input type="date" id="fechaSalida" name="fechaSalida" class="form-control" value="{{ $fechaFin }}" readonly>
    </div>
    <div class="mb-3">
        <label for="tipoHabitacion" class="form-label">Tipo de habitación</label>
        <input type="text" id="tipoHabitacion" name="tipoHabitacion" class="form-control" value="{{ $nombreHabitacion}}" readonly>
    </div>
    <div class="mb-3">
      <label for="cantidad" class="form-label">Cantidad</label>
      <input type="text" id="cantidad" name="cantidad" class="form-control" value="{{ $cantidad}}" readonly>
  </div>
    <input type="text" id="ofertaID" name="ofertaID" class="form-control" value="{{ $oferta_id}}" hidden>
    <input type="text" id="idHabitacion" name="idHabitacion" class="form-control" value="{{ $tipo_habitacion}}" hidden >
    @if(auth()->check())
      <input type="text" id="dni" name="dni" class="form-control" value="{{ auth()->user()->dni }}" hidden>
      <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" hidden>
      <input type="text" class="form-control" id="apellido" name="apellido" value=" {{ auth()->user()->apellido }}" hidden>
      <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" hidden>
      <input type="text" class="form-control" id="telefono" name="telefono" value=" {{ auth()->user()->telefono }}" hidden>
    @else

    <div class="mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" id="dni" name="dni" class="form-control" placeholder="Ingrese su DNI" required>
    </div>
      <div class="mb-3">
        <label for="username" class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre" required>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido de usuario</label>
        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Telefomo</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su telefono" required>
      </div>
      @endif
      @if(auth()->check())
      <input type="hidden" name="rol_id" value="2">
      @else 
      <input type="hidden" name="rol_id" value="3">
      @endif
    <div class="text-center">
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Realizar reserva</button>
    </div>
</form>
@endif     
@endsection


