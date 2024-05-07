@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<div class="container text-center">
    <h1>INFORMACION DE LA OFERTA</h1>
    <p><strong>NOMBRE:</strong> {{ $oferta->nombre }}</p>
    <p><strong>Descripcion:</strong> {{ $oferta->descripcion }}</p>
    <p><strong>Precio:</strong> {{ $oferta->precio}}</p>
    <p><strong>Fechas de entrada:</strong> {{ $oferta->fecha_entrada}}</p>
    <p><strong>Fecha de salida:</strong> {{ $oferta->fecha_salida}}</p>
    <p><strong>Tipo de Habitación:</strong> {{ $oferta->habitacion->tipo }}</p>
    <img src="{{ asset($oferta->imagen) }}" lass="img-fluid mb-3" id="banner-publi-inicio" alt="Imagen de cabecera">
    

    <form action="{{ route('consultarDisponibilidad') }}" method="post" class="formulariosFondoGris">
      @csrf
          <input type="date" id="fechaEntrada" name="fechaEntrada" class="form-control" value="{{$oferta->fecha_entrada}}" hidden>
          <input type="date" id="fechaSalida" name="fechaSalida" class="form-control" value="{{$oferta->fecha_salida}}"  hidden>
          <input type="number" name="tipoHabitacion" id="tipoHabitacion" value="{{$oferta->habitacion->id}}" hidden>
          <input type="number" name="numeroHabitacion" id="numeroHabitacion" value="1" hidden>
          <input type="number" name="ofertaID" id="ofertaID" value="{{$oferta->id}}" hidden>

      <div class="text-center">
          <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#exampleModal">Enviar</button>
      </div>
  </form>

</div>
@endsection