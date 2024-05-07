@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<form action="{{ route('editar',['id' => auth()->user()->id]) }}" method="post" class="formulariosFondoGris">
    @csrf
      <input type="text" id="dni" name="dni" class="form-control" value="{{ auth()->user()->dni }}" hidden>
      <div class="mb-3">
        <label for="username" class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido de usuario</label>
        <input type="text" class="form-control" id="apellido" name="apellido" value=" {{ auth()->user()->apellido }}">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Telefomo</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value=" {{ auth()->user()->telefono }}" >
      </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal">ACTUALIZAR DATOS</button>
    </div>
</form>
@endsection