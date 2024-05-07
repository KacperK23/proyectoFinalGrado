@extends("master")

@section("title", "Albergues Kacper")

@section("content")
          <form method="POST" acction="{{route ('login')}}" class="formulariosFondoGris">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
            </div>
            <div class="mb-3">
              <p>¿No tienes cuenta? <a href="{{route('register')}}">Registrar</a></p>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
          </form>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@endsection