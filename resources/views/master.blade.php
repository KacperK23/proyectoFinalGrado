<!DOCTYPE HTML>
<html lang="es-ES">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title')</title>

        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('bootstrap/icons/bootstrap-icons.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ url('css/estilos.css') }}">
        
        <link rel="icon" type="image/png" href="{{ asset('/imagenes/favicon.png') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

 
    <header class="text-white p-3 d-flex align-items-center">
        <div class="d-flex mx-auto">
            <a href="{{ route('inicio') }}"><img class="mx-2" id="escudo-maella" src="{{ asset('/imagenes/logo-sinfondo.png') }}" alt=""></a>
            <h1><a href="{{ route('inicio') }}">ALBERGUES KACPER</a></h1>
        </div>
        <div>
            @if(auth()->check())
    <div class="dropdown">
        @can('isAdmin', auth()->user())
            <button class="btn dropdown-toggle color3-bg" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        @endcan

        @can('isUsuario', auth()->user())
            <button class="btn dropdown-toggle color5-bg" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        @endcan
            Hola, {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a href="{{ route('mostrarperfil',[auth()->user()->id])}}" class="dropdown-item">Mi perfil</a></li>
            <li><a class="dropdown-item" href="{{ route('configuracion',[auth()->user()->id])}}">Configuración</a></li>
            @can('isAdmin', auth()->user())
                <li><a class="dropdown-item" href="{{ route('mostrar_datos') }}">Panel central</a></li>
                <li><a class="dropdown-item" href="{{ route('´mostrarEstadisticas') }}">Estadísticas</a></li>
            @endcan
            <div class="dropdown-divider"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <li>
                    <button type="submit" class="btn">Cerrar sesión</button>

                </li>
            </form>
        </ul>
    </div>
          @else 
          <button type="button" class="btn btn-primary me-2"><a href="{{ route('login') }}"class="botonIniciarSesion">Iniciar sesion</a>
          </button>
          <button type="button" class="btn btn-primary"><a href="{{ route('register') }}" class="botonesRegistro">Registrar</a></button>
          @endif
        </div>
    </header>



<nav class="navbar navbar-expand-lg pb-4" id="navMenuPrincipal">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-lg-none" href="#">MENÚ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link menuNavegacionPaginas" href="{{ route('inicio') }}">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menuNavegacionPaginas" href="{{ route('quienessomos') }}">¿QUIENES SOMOS?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menuNavegacionPaginas" href="{{ route('dondeestamos') }}">DONDE ESTAMOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menuNavegacionPaginas" href="{{ route('sitioscercanos') }}">SITIOS CERCANOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menuNavegacionPaginas" href="{{ route('servicios') }}">SERVICIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menuNavegacionPaginas" href="{{ route('formularioContacto') }}">CONTACTANOS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        @section('content')
        @show

        <footer class="text-white mt-5 text-center p-3">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5>AYUDA</h5>
                <hr>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">Como realizar la reserva</li>
                    <li class="nav-item mb-2">Cancelar reserva</li>
                    <li class="nav-item mb-2">Tipos de reservas</li>
                    <li class="nav-item mb-2">Preguntas frecuentes</li>
                </ul>
            </div>

            <div class="col-md-4 mb-3">
                <div class="row justify-content-center">
                    <div class="justify-content-center mb-2">
                        <h5>SECCIONES</h5>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="index.html" class="nav-link p-0 text-white">Inicio</a>
                            </li>
                            <li class="nav-item mb-2"><a href="calendario.html"
                                    class="nav-link p-0 text-white">¿Quienes somos?</a></li>
                            <li class="nav-item mb-2"><a href="contactanos.html"
                                    class="nav-link p-0 text-white">Donde estamos</a></li>
                            <li class="nav-item mb-2"><a href="historico.html"
                                    class="nav-link p-0 text-white">Sitios cercanos</a></li>
                            <li class="nav-item mb-2"><a href="imagenes.html"
                                    class="nav-link p-0 text-white">Servicios</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <h5>Información</h5>
                <hr>
                <h6>Dirección oficina:</h6>
                <p>Calle Mayor 2, Maella (Zaragoza)</p>
                <br>
                <h6>Teléfono:</h6>
                <p>+34 976 00 00 000</p>
                <br>
                <h6>Correo electrónico:</h6>
                <p>preuba@maella.com</p>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-center py-4 border-top">
            <p>&copy; 2024 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex mr-3">
                <li class="ms-3"><a class="text-white"
                        href="https://twitter.com/CBBreogan?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i
                            class="bi bi-twitter"></i></a></li>
                <li class="ms-3"><a class="text-white" href="https://www.instagram.com/cbbreogan/"><i
                            class="bi bi-instagram"></i></a></li>
                <li class="ms-3"><a class="text-white" href="https://www.facebook.com/CBBreoganSAD/?locale=es_ES"><i
                            class="bi bi-facebook"></i></a></li>
            </ul>
        </div>
    </footer>
</body>
</html>