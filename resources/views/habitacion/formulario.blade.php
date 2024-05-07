@extends("master")

@section("title", "Albergues Kacper")

@section("content")

<form action="{{ route('habitacion.actualizar', ['habitacion' => $habitacion->id]) }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <input type="text" id="tipo" name="tipo" class="form-control"
            placeholder="Ingrese el tipo de la habitacion" value="{{ $habitacion->tipo}}" required>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio"
        value="{{ $habitacion->precio}}" step=0.01 required>
    </div>
    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad"
        value="{{ $habitacion->cantidad}}" required>
    </div>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal">ACTUALIZAR DATOS</button>
  </div>
</form>
@endsection