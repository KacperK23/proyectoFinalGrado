@extends('master')

@section('title', 'Albergues Kacper')

@section('content')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('.datatable').each(function() {
            $(this).DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron registros",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente",
                        "first": "Primero",
                        "last": "Último"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                //"columnDefs": [
                //    {"orderable": false, "targets": [8, 9]} // Desactiva ordenación para las columnas que no deseas
                //]
            });
        });
    });
    </script>
    

    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="reservasHoy-tab" data-bs-toggle="tab" href="#reservasHoy" role="tab"
                    aria-controls="reservasHoy" aria-selected="true">Reservas Hoy</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="reservas-tab" data-bs-toggle="tab" href="#reservas" role="tab"
                    aria-controls="reservas" aria-selected="false">Reservas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="ofertas-tab" data-bs-toggle="tab" href="#ofertas" role="tab"
                    aria-controls="ofertas" aria-selected="false">Ofertas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="articulos-tab" data-bs-toggle="tab" href="#articulos" role="tab"
                    aria-controls="articulos" aria-selected="false">Articulos</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="usuarios-tab" data-bs-toggle="tab" href="#usuarios" role="tab"
                    aria-controls="usuarios" aria-selected="false">Usuarios</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="habitaciones-tab" data-bs-toggle="tab" href="#habitaciones" role="tab"
                    aria-controls="habitaciones" aria-selected="false">Habitacion</a>
            </li>
        </ul>

        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="reservasHoy" role="tabpanel" aria-labelledby="reservasHoy-tab">
                <div>
                    <h3>RESERVAS DE HOY</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha entrada</th>
                            <th>Fecha salida</th>
                            <th>DNi Usuario</th>
                            <th>Nombre completo del usuario</th>
                            <th>Tipo de habitacion</th>
                            <th>Cantidad</th>
                            <th>Oferta</th>
                            <th>Pagado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí van los datos de los artículos -->
                        @foreach ($reservasHoy as $hoy)
                            <tr class="filasDatos">
                                <td>{{ $hoy->id }}</td>
                                <td>{{ $hoy->fecha_entrada }}</td>
                                <td>{{ $hoy->fecha_salida }}</td>
                                <td>{{ $hoy->usuario->dni }}</td>
                                <td>{{ $hoy->usuario->name }} {{ $hoy->usuario->apellido }}</td>
                                <td>{{ $hoy->habitacion->tipo }}</td>
                                <td>{{ $hoy->cantidad }}</td>
                                <td><?php if($hoy->oferta_id){
                                    echo $hoy->oferta->nombre;
                                } else {
                                    echo "NO";
                                }
                                ?></td>
                                <td> @if($hoy->pagado == 1)
                                    <i class="bi bi-check-circle-fill text-success"></i>
                                    @else
                                    <i class="bi bi-dash-circle-fill text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="reservas" role="tabpanel" aria-labelledby="reservas-tab">
                <div class="panelCabezeraSecciones">
                    <h3>RESERVAS</h3>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalReserva">AÑADIR RESERVAS</button>
                    </div>
                </div>

                <div class="pt-2">
                    <table id="" class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha entrada</th>
                                <th>Fecha salida</th>
                                <th>DNi Usuario</th>
                                <th>Nombre completo del usuario</th>
                                <th>Tipo de habitacion</th>
                                <th>Cantidad</th>
                                <th>Oferta</th>
                                <th>Pagado</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                             <!-- Aquí van los datos de las ofertas -->
                        @foreach ($reservaList as $reserva)
                        <tr class="filasDatos">
                            <td>{{ $reserva->id }}</td>
                            <td>{{ $reserva->fecha_entrada }}</td>
                            <td>{{ $reserva->fecha_salida }}</td>
                            <td>{{ $reserva->usuario->dni }}</td>
                            <td>{{ $reserva->usuario->name }} {{ $reserva->usuario->apellido }}</td>
                            <td>{{ $reserva->habitacion->tipo }}</td>
                            <td>{{ $reserva->cantidad }}</td>
                            <td><?php if($reserva->oferta_id){
                                echo $reserva->oferta->nombre;
                            } else {
                                echo "NO";
                            }
                                ?></td>
                            <td> @if($reserva->pagado == 1)
                                <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                <i class="bi bi-dash-circle-fill text-danger"></i>
                                @endif
                            </td>
                            <td><button class="btn btn-primary"><a class="text-white"
                                        href="{{ route('reserva.editar', $reserva->id) }}">EDITAR</a></button></td>
                            <td>
                                <form action = "{{ route('reserva.eliminar', $reserva->id) }}" method="POST" onsubmit="return confirmarEliminar()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="ofertas" role="tabpanel" aria-labelledby="ofertas-tab">
                <div class="panelCabezeraSecciones">
                    <h3>OFERTAS</h3>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalOferta">AÑADIR OFERTAS</button>
                    </div>
                </div>

            <div class="pt-2">
                <table id="" class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Fecha entrada</th>
                            <th>Fecha salida</th>
                            <th>Tipo de habitacion</th>
                            <th>Banner</th>
                            <th>Imagen banner</th>
                            <th>Imagen oferta</th>
                            <th>Articulos</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ofertas as $oferta)
                        <tr class="filasDatos">
                            <td>{{ $oferta->id }}</td>
                            <td>{{ $oferta->nombre }}</td>
                            <td>{{ $oferta->descripcion }}</td>
                            <td>{{ $oferta->precio }}</td>
                            <td>{{ $oferta->fecha_entrada }}</td>
                            <td>{{ $oferta->fecha_salida }}</td>
                            <td>{{ $oferta->habitacion->tipo }}</td>
                            <td> @if($oferta->banner == 1)
                                <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                <i class="bi bi-dash-circle-fill text-danger"></i>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalImagen{{ $oferta->id }}">
                                    VER IMAGEN BANNER
                                  </button>
                                <!-- Modal imagen banner-->
                                <div class="modal fade" id="modalImagen{{ $oferta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">IMAGEN BANNER</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <img src="{{ asset($oferta->imagen_banner)}}" alt="" class="w-100">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </td>
                            <td>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalImagenOferta{{ $oferta->id }}">
                                    VER IMAGEN OFERTA
                                  </button>
                                <!-- Modal imagen banner-->
                                <div class="modal fade" id="modalImagenOferta{{ $oferta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">IMAGEN OFERTA</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <img src="{{ asset($oferta->imagen_oferta)}}" alt="" class="w-100">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </td>
                            <td>
                                @foreach ($oferta->articulos as $articulo)
                                    {{ $articulo->nombre }},
                                @endforeach
                            </td>
                            <td><button class="btn btn-primary"><a class="text-white"
                                href="{{ route('oferta.editar', $oferta->id) }}">EDITAR</a></button></td>
                            <td><form action="{{ route('oferta.eliminar', $oferta->id) }}" method="POST" onsubmit="return confirmarEliminar()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Modal Reserva-->
            </div>

            </div>

            <div class="tab-pane fade" id="articulos" role="tabpanel" aria-labelledby="articulos-tab">
                <div class="panelCabezeraSecciones">
                    <h3>ARTICULOS</h3>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalArticulo">AÑADIR ARTICULOS</button>
                    </div>
                </div>

                <div class="pt-2">
                    <table id="" class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articulos as $articulo)
                            <tr class="filasDatos">
                                <td>{{ $articulo->id }}</td>
                                <td>{{ $articulo->nombre }}</td>
                                <td>{{ $articulo->descripcion }}</td>
                                <td><button class="btn btn-primary"><a class="text-white"
                                    href="{{ route('articulo.editar', $articulo->id) }}">EDITAR</a></button></td>
                                <td><form action = "{{ route('articulo.eliminar', $articulo->id) }}" method="POST" onsubmit="return confirmarEliminar()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>  
            </div>

            <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                <div class="panelCabezeraSecciones">
                    <h3>USUARIOS</h3>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalUsuario">AÑADIR USUARIOS</button>
                    </div>
                </div>
                <div class="pt-2">
                    <table id="" class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Documento de identidad</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Rol</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr class="filasDatos">
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->dni }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->apellido }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->rol->rol }}</td>
                                <td><button class="btn btn-primary"><a class="text-white"
                                    href="{{ route('usuario.editar', $usuario->id) }}">EDITAR</a></button></td>
                                <td><form action = "{{ route('usuario.eliminar', $usuario->id) }}" method="POST" onsubmit="return confirmarEliminar()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="habitaciones" role="tabpanel" aria-labelledby="habitaciones-tab">
                <div class="panelCabezeraSecciones">
                    <h3>HABITACIONES</h3>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalHabitacion">AÑADIR HABITACIONES</button>
                    </div>
                </div>
                <div class="pt-2">
                    <table id="" class="table table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($habitaciones as $habitacion)
                            <tr class="filasDatos">
                                <td>{{ $habitacion->id }}</td>
                                <td>{{ $habitacion->tipo }}</td>
                                <td>{{ $habitacion->precio }}</td>
                                <td>{{ $habitacion->cantidad }}</td>
                                <td><button class="btn btn-primary"><a class="text-white"
                                    href="{{ route('habitacion.editar', $habitacion->id) }}">EDITAR</a></button></td>
                                <td><form action = "{{ route('habitacion.eliminar', $habitacion->id) }}" method="POST" onsubmit="return confirmarEliminar()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">ELIMINAR</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <!-- Modal Reserva-->
    <div class="modal fade" id="modalReserva" tabindex="-1" aria-labelledby="modalReservalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary-subtle">
                    <h1 class="modal-title fs-5" id="modalReservalLabel">INSERTAR RESERVA</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('insertarReserva') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="fechaEntrada" class="form-label">FECHA DE ENTRADA</label>
                            <input type="date" fechaEntrada name="fechaEntrada" class="form-control fechaEntrada">
                        </div>
                        <div class="mb-3">
                            <label for="fechaSalida" class="form-label">FECHA DE SALIDA</label>
                            <input type="date" name="fechaSalida" class="form-control fechaSalida">
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <label for="idHabitacion" class="form-label selectoresFormulario">Tipo de habitacion</label>
                            <select class="form-select w-75" name="idHabitacion" id="">
                                @foreach ($habitaciones as $habitacion)
                                    {
                                    <option value="{{ $habitacion->id }}">{{ strtoupper($habitacion->tipo) }}</option>
                                    }
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <label for="cantidad" class="form-label selectoresFormulario">Numero de habitaciones</label>
                            <select class="form-select w-75" name="cantidad" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" id="dni" name="dni" class="form-control"
                                placeholder="Ingrese su DNI" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido de usuario</label>
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Ingrese su apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Ingrese su correo electrónico" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefomo</label>
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                placeholder="Ingrese su telefono" required>
                        </div>
                        <input type="hidden" name="rol_id" value="2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Realizar reserva</button>
                </div>
                </form>
            </div>
        </div>
    </div>
        <!-- Modal Ofertas-->
        <div class="modal fade" id="modalOferta" tabindex="-1" aria-labelledby="modalOfertaLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-secondary-subtle">
                        <h1 class="modal-title fs-5" id="modalOfertaLabel">INSERTAR OFERTA</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('oferta.insertar') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    placeholder="Ingrese el nombre de la oferta" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control"
                                    placeholder="Ingrese la descripcion de la oferta" required>
                            </div>

                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio"
                                    placeholder="Ingrese el precio de la oferta" step=0.01 required>
                            </div>

                            <div class="mb-3">
                                <label for="fechaEntrada" class="form-label">FECHA DE ENTRADA</label>
                                <input type="date" fechaEntrada name="fechaEntrada" class="form-control fechaEntrada">
                            </div>
                            <div class="mb-3">
                                <label for="fechaSalida" class="form-label">FECHA DE SALIDA</label>
                                <input type="date" name="fechaSalida" class="form-control fechaSalida">
                            </div>
                            <div class="mb-3">
                                <label for="eleccionBanner" class="form-label">¿Quieres poner esta oferta como destacada?</label>
                                <select class="form-select w-75" name="eleccionBanner" id="">
                                        <option value="1">SI</option>
                                        <option value="0">NO</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen banner</label>
                                <input class="form-control" type="file" name="imagen" id="imagen">
                            </div>
                            <div class="mb-3">
                                <label for="imagenOferta" class="form-label">Imagen oferta</label>
                                <input class="form-control" type="file" name="imagenOferta" id="imagenOferta">
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="tipoHabitacion" class="form-label selectoresFormulario">Tipo de
                                    habitacion</label>
                                <select class="form-select w-75" name="tipoHabitacion" id="">
                                    @foreach ($habitaciones as $habitacion)
                                        {
                                        <option value="{{ $habitacion->id }}">{{ strtoupper($habitacion->tipo) }}
                                        </option>
                                        }
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                              <label for="tipoArticulo" class="form-label selectoresFormulario">Tipo de
                                  articulo</label>
                              <select class="form-select w-75" name="tipoArticulo" id="">
                                  @foreach ($articulos as $articulo)
                                      {
                                      <option value="{{ $articulo->id }}">{{ strtoupper($articulo->nombre) }}
                                      </option>
                                      }
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Realizar reserva</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Articulos-->
        <div class="modal fade" id="modalArticulo" tabindex="-1" aria-labelledby="modalArticuloLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalArticuloLabel">INSERTAR ARTICULO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('articulo.insertar') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    placeholder="Ingrese el nombre de la oferta" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control"
                                    placeholder="Ingrese la descripcion de la oferta" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Realizar reserva</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Usuario-->
        <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalUsuarioLabel">INSERTAR USUARIO</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('usuario.insertar') }}" method="post">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Añadir usuario</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Habitacion-->
        <div class="modal fade" id="modalHabitacion" tabindex="-1" aria-labelledby="modalHabitacionLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalHabitacionLabel">INSERTAR HABITACION</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('habitacion.insertar') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo</label>
                                <input type="text" id="tipo" name="tipo" class="form-control"
                                    placeholder="Ingrese el tipo de la habitacion" required>
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" step=0.01 placeholder="Ingrese el precio de la habitacion" required>
                            </div>
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad de habitaciones se ofertan" required>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Añadir usuario</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function confirmarEliminar() {
                if (confirm("¿Está seguro de que desea eliminar este registro?")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modals = document.querySelectorAll('.modal-body');
        
                modals.forEach(modal => {
                    const fechaEntrada = modal.querySelector('.fechaEntrada');
                    const fechaSalida = modal.querySelector('.fechaSalida');
        
                    const today = new Date().toISOString().split('T')[0];
                    fechaEntrada.setAttribute('min', today);
        
                    fechaEntrada.addEventListener('change', function() {
                        const fechaEntradaValue = new Date(fechaEntrada.value);
                        fechaEntradaValue.setDate(fechaEntradaValue.getDate() + 1);
        
                        const fechaMinSalida = fechaEntradaValue.toISOString().split('T')[0];
                        fechaSalida.min = fechaMinSalida;
        
                        if (fechaSalida.value < fechaMinSalida) {
                            fechaSalida.value = fechaMinSalida;
                        }
                    });
                });
            });
        </script>
        
    @endsection
    
