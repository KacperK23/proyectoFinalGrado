@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<div class="container text-center" id="contenedorInfoOferta">
    <h2>INFORMACION DE LA OFERTA</h2>
    <hr>
    <div id="ofertaImagenInformacion">
        <div class="w-50">
            <img src="{{ asset($oferta->imagen_oferta) }}" class="img-fluid" alt="imagen de la oferta">
        </div>
    
        <div class="w-50">
            <p><strong>NOMBRE:</strong> {{ $oferta->nombre }}</p>
            <p><strong>Descripcion:</strong> {{ $oferta->descripcion }}</p>
            <p><strong>Precio:</strong> {{ $oferta->precio}}</p>
            <p><strong>Fechas de entrada:</strong> {{ $oferta->fecha_entrada}}</p>
            <p><strong>Fecha de salida:</strong> {{ $oferta->fecha_salida}}</p>
            <p><strong>Tipo de Habitación:</strong> {{ $oferta->habitacion->tipo }}</p>
            
        
            <form action="{{ route('consultarDisponibilidad') }}" method="post" style="background-color: white">
              @csrf
                  <input type="date" id="fechaEntrada" name="fechaEntrada" class="form-control" value="{{$oferta->fecha_entrada}}" hidden>
                  <input type="date" id="fechaSalida" name="fechaSalida" class="form-control" value="{{$oferta->fecha_salida}}"  hidden>
                  <input type="number" name="tipoHabitacion" id="tipoHabitacion" value="{{$oferta->habitacion->id}}" hidden>
                  <input type="number" name="numeroHabitacion" id="numeroHabitacion" value="1" hidden>
                  <input type="number" name="ofertaID" id="ofertaID" value="{{$oferta->id}}" hidden>
        
              <div class="text-center" id="ofertaBoton">
                  <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Buscar disponibilidad</button>
              </div>
          </form>
        </div>
    </div>

</div>
@endsection