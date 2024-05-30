@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<div class="colorGradianteVerde">
    <form method="POST" action="{{ route('login') }}" class="formulariosFondoGris">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h2>INICIAR SESIÓN</h2>
        <hr>
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
            <p>¿No tienes cuenta? <a class="text-primary" href="{{ route('register') }}">Registrar</a></p>
            <p>¿Olvidaste tu contraseña? <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#recuperarContrasenaModal">Recuperar contraseña</button></p>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Acceder</button>
    </form>
</div>

<!-- Modal Cambiar contraseña-->
<div class="modal fade" id="recuperarContrasenaModal" tabindex="-1" aria-labelledby="recuperarContrasenaModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary-subtle">
                <h1 class="modal-title fs-5" id="modalReservalLabel">RECUPERAR CONTRASEÑA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Introduce el correo electrónico del usuario que se quiere cambiar la contraseña</p>
                <form id="contrasenaCambiarForm" action="{{ route('cambiarContrasena') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="emailUsuario" class="form-label">Correo electrónico</label>
                        <input type="email" id="emailUsuario" name="emailUsuario" class="form-control" placeholder="Correo electrónico" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Recuperar contraseña</button>
            </div>
                </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@endsection
