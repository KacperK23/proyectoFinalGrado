@extends("master")

@section("title", "Albergues Kacper")

@section("content")

<div class="colorGradianteVerde">
  <form method="POST" acction="{{route ('enviarformularioContacto')}}" class="formulariosFondoGris">
    <h2>FORMULARIO DE CONTACTO</h2>
    <hr>
    @csrf
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre completo</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre completo" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Correo electrónico</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
    </div>
    <div class="mb-3">
      <label for="duda" class="form-label">Explicanos tu duda</label>
      <textarea class="form-control" id="duda" rows="3" name="duda" placeholder="Explicanos tu duda" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Acceder</button>
  </form>

</div>

@endsection

