@extends("master")

@section("title", "Albergues Kacper")

@section("content")

<div class="container" id="dondeestamos">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('inicio') }}">INICIO</a></li>
          <li class="breadcrumb-item active" aria-current="page">DONDE ESTAMOS</li>
        </ol>
      </nav>
    <h2>¿DONDE ESTAMOS?</h2>
    <div>
        <p>Algergue Maella es un edificio en el cual cualquier persona puede quedarse a dormir en el. Es llevada por una endida publica como es el Ayuntamiento de Maella.</p>
        <div id="direccion"><i class="bi bi-geo-alt-fill"></i><p>Plaza Martires 11, 50710 Maella, Zaragoza</p></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d893.5697768982172!2d0.13531926683053008!3d41.121459171749784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a0af4fa3cb8ef1%3A0xa9fb8a9e27bd8726!2sAlbergue%20Maella!5e0!3m2!1ses!2ses!4v1710933285974!5m2!1ses!2ses" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>

</div>

@endsection

