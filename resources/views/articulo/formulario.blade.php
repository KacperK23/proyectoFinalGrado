@extends("master")

@section("title", "Albergues Kacper")

@section("content")

<form action="{{ route('articulo.actualizar', ['articulo' => $articulo->id]) }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control"
            placeholder="Ingrese el nombre de la oferta" value="{{ $articulo->nombre}}" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control"
            placeholder="Ingrese la descripcion de la oferta" value="{{ $articulo->descripcion}}" required>
    </div>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal">ACTUALIZAR DATOS</button>
  </div>
</form>
@endsection