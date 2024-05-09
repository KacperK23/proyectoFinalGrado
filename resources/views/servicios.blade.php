@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<div class="container" id="servicios">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('inicio') }}">INICIO</a></li>
          <li class="breadcrumb-item active" aria-current="page">SERVICIOS</li>
        </ol>
      </nav>
    <h2>SERVICIOS</h2>
    <div class="row">
        <div class="col">
            <i class="bi bi-wifi"></i>
            <p>WIFI</p>
        </div>
        <div class="col">
            <i class="bi bi-p-circle-fill"></i>
            <p>PARKING</p>
        </div>
        <div class="col">
           <i class="bi bi-badge-wc-fill"></i>
           <p>SERVICIO DE BAÑO</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <i class="bi bi-thermometer-snow"></i>
            <p>AIRE ACONDICIONADO</p>
        </div>
        <div class="col">
            <span class="material-symbols-outlined pb-4">soup_kitchen</span>
            <p>COCINA</p>
        </div>
        <div class="col">
            <i class="bi bi-tv-fill"></i>
            <p>TELEVICION</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <i class="bi bi-lock-fill"></i>
            <p>TAQUILLAS</p>
        </div>
        <div class="col">
            <i class="bi bi-person-wheelchair"></i>
            <p>ACCESIBILIDAD</p>
        </div>
    </div>
    
</div>
       
@endsection