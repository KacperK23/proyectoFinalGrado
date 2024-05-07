@extends("master")

@section("title", "Albergues Kacper")

@section("content")

<form action="{{ route('oferta.actualizar', ['oferta' => $oferta->id]) }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" id="nombre" name="nombre" class="form-control"
          value="{{ $oferta->nombre}}" required>
  </div>
  <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text" id="descripcion" name="descripcion" class="form-control"
      value="{{ $oferta->descripcion}}" required>
  </div>
  <div class="mb-3">
      <label for="precio" class="form-label">Precio</label>
      <input type="number" class="form-control" id="precio" name="precio"
      value="{{ $oferta->precio}}" step=0.01 required>
  </div>



  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen</label>
    <input class="form-control" type="file" name="imagen" id="imagen">
  </div>
  <div class="mb-3 d-flex align-items-center">
    <label for="tipoHabitacion" class="form-label selectoresFormulario">Bnner principal</label>
    <select class="form-select w-75" name="banner" id="">
        <option value="1">SI</option>
        <option value="0">NO</option>
    </select>
    </div>


  <div class="mb-3">
      <label for="fechaEntrada" class="form-label">FECHA DE ENTRADA</label>
      <input type="date" id="fechaEntrada" name="fechaEntrada" class="form-control" value="{{ $oferta->fecha_entrada}}">
  </div>
  <div class="mb-3">
      <label for="fechaSalida" class="form-label">FECHA DE SALIDA</label>
      <input type="date" id="fechaSalida" name="fechaSalida" class="form-control" value="{{ $oferta->fecha_salida}}">
  </div>
  <div class="mb-3 d-flex align-items-center">
      <label for="tipoHabitacion" class="form-label selectoresFormulario">Tipo de
          habitacion</label>
      <select class="form-select w-75" name="tipoHabitacion" id="">
        @foreach($habitaciones as $habitacion){
          <option value="{{$habitacion->id}}"
            @if( $habitacion->id == ($oferta->habitacion_id ?? ""))
              selected
            @endif
            >{{strtoupper($habitacion->tipo)}}</option>
          
      }
      @endforeach
      </select>
  </div>
  <div class="mb-3 d-flex align-items-center">
    <label for="tipoArticulo" class="form-label selectoresFormulario">Tipo de
        articulo</label>
    <select class="form-select w-75" name="tipoArticulo" id="">
      @foreach ($articulos as $articulo)
      <option value="{{ $articulo->id }}"
          @foreach ($oferta->articulos as $ofertaArticulo)
              @if($articulo->id == $ofertaArticulo->id)
                  selected
              @endif
          @endforeach
      >{{ strtoupper($articulo->nombre) }}</option>
      @endforeach
  
    </select>
</div>
</div>
<div class="text-center">
  <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
      data-bs-target="#exampleModal">ACTUALIZAR DATOS</button>
</div>
</form>
@endsection