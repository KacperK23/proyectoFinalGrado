@extends("master")

@section("title", "Albergues Kacper")

@section("content")

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <h1>Bienvenido, {{ auth()->user()->name }}</h1>
          <h2 class="text-center">Sección Privada</h2>
          <p class="lead text-center">Bienvenido a la sección privada de la página.</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
