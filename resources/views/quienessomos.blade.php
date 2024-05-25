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
  <h3>INSTALACIONES</h3>
  <p>LAS HABITACIONES</p>
  <div id="carouselExampleDark2" class="carousel carousel-dark slide w-75">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/483410606.jpg?k=740a8b5758ebf40bf6df8cc1add787c68ce10d73373006897e0ecb8585b83667&o=&hp=1" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ asset('/imagenes/logo-sinfondo.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenes/logo-sinfondo.png') }}" class="d-block w-100" alt="...">
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

  <p>COMEDOR Y COCINA</p>
  <div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('/imagenes/logo-sinfondo.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ asset('/imagenes/logo-sinfondo.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenes/logo-sinfondo.png') }}" class="d-block w-100" alt="...">
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
  <p>BAÑOS Y TAQUILLAS</p>
  <div id="carouselExampleDark1" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('/imagenes/logo-sinfondo.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ asset('/imagenes/logo-sinfondo.png') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/imagenes/logo-sinfondo.png') }}" class="d-block w-100" alt="...">
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


    
@endsection

