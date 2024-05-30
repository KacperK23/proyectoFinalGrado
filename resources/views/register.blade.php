@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<div class="colorGradianteVerde">
          <form method="POST" acction="{{route('register')}}" class="formulariosFondoGris">
            <h2>CREAR CUENTA</h2>
            <hr>
            @csrf
            <div class="mb-3">
              <label for="dni" class="form-label">DNI</label>
              <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese su DNI" required>
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
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
            </div> 
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
          </form>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@endsection
