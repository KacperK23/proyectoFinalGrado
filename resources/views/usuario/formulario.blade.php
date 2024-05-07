@extends("master")

@section("title", "Albergues Kacper")

@section("content")

<form action="{{ route('usuario.actualizar', ['usuario' => $usuario->id]) }}" method="post">
  @csrf
  <div class="mb-3">
    <label for="dni" class="form-label">DNI</label>
    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese su DNI" value="{{ $usuario->dni}}" required>
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Nombre de usuario</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese su nombre" value="{{ $usuario->name ?? '' }}" required>
  </div>
  <div class="mb-3">
    <label for="apellido" class="form-label">Apellido de usuario</label>
    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido" value="{{ $usuario->apellido ?? '' }}" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ $usuario->email ?? '' }}" required>
  </div>
  <div class="mb-3">
    <label for="telefono" class="form-label">Telefomo</label>
    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su telefono" value="{{ $usuario->telefono ?? '' }}" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" value="{{ $usuario->password ?? '' }}" required>
  </div> 

    <div class="text-center">
      <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
          data-bs-target="#exampleModal">ACTUALIZAR DATOS</button>
  </div>
    </form>
@endsection