@extends("master")

@section("title", "Albergues Kacper")

<style>
  img{
    height: 100px;
  }
</style>
@section("content")

<div class="container" id="quienessomos">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('inicio') }}">INICIO</a></li>
        <li class="breadcrumb-item active" aria-current="page">¿QUIENES SOMOS?</li>
      </ol>
    </nav>
  <h2>¿QUIENES SOMOS?</h2>
  <div>
      <p>Algergue Maella es un edificio en el cual cualquier persona puede quedarse a dormir en el. Es llevada por una endida publica como es el Ayuntamiento de Maella.</p>
  </div>
  <div id="quienessomosFotos">
  <h3>INSTALACIONES</h3>
  <p class="quienesSomosTituloSeccion">LAS HABITACIONES</p>
  <div id="carouselExampleDark2" class="carousel carousel-white slide w-50">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('/imagenesInstalaciones/cama-1.jpg') }}" class="d-block w-100" alt="cama1">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ asset('/imagenesInstalaciones/cama-2.jpg') }}" class="d-block w-100" alt="cama2">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenesInstalaciones/cama-3.jpg') }}" class="d-block w-100" alt="cama3">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenesInstalaciones/cama-4.jpg') }}" class="d-block w-100" alt="cama4">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <p class="quienesSomosTituloSeccion">COMEDOR Y COCINA</p>
  <div id="carouselExampleDark" class="carousel carousel-white slide w-50">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('/imagenesInstalaciones/comedor-1.jpg') }}" class="d-block w-100" alt="comedor1">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ asset('/imagenesInstalaciones/comedor-2.jpg') }}" class="d-block w-100" alt="comedor2">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenesInstalaciones/cocina-1.jpg') }}" class="d-block w-100" alt="cocina1">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenesInstalaciones/cocina-2.jpg') }}" class="d-block w-100" alt="cocina2">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <p class="quienesSomosTituloSeccion">BAÑOS Y TAQUILLAS</p>
  <div id="carouselExampleDark1" class="carousel carousel-white slide w-50">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('/imagenesInstalaciones/baño-1.jpg') }}" class="d-block w-100" alt="baño1">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ asset('/imagenesInstalaciones/baño-2.jpg') }}" class="d-block w-100" alt="baño2">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenesInstalaciones/baño-3.jpg') }}" class="d-block w-100" alt="baño3">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenesInstalaciones/taquilla-1.jpg') }}" class="d-block w-100" alt="taquilla1">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenesInstalaciones/taquilla-2.jpg') }}" class="d-block w-100" alt="taquilla2">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark1" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark1" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

</div>
    
@endsection

