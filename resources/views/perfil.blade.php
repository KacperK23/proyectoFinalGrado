@extends("master")

@section("title", "Albergues Kacper")

@section("content")

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div id="caja-padre">
    <div class="cajas" id="caja1">
        @if(auth()->check())
        @if(auth()->user()->dni)
        <?php $nombre = auth()->user()->name ?>
        <div id="circuloPerfilUsuario"><?php echo(strtoupper(substr($nombre, 0, 1))) ?></div>
        <table id="tablaPerfilUsuario">
            <tr>
                <td class="w-50 text-end"><strong>Documento de identidad:</strong></td>
                <td class="w-50 text-start tabla2ColumnaMiPerfil">{{ auth()->user()->dni }}</td>
            </tr>
            <tr>
                <td class="w-50 text-end"><strong>Nombre:</strong></td>
                <td class="w-50 text-start tabla2ColumnaMiPerfil">{{ auth()->user()->name }}</td>
            </tr>
            <tr>
                <td class="w-50 text-end"><strong>Apellido:</strong></td>
                <td class="w-50 text-start tabla2ColumnaMiPerfil">{{ auth()->user()->apellido }}</td>
            </tr>
            <tr>
                <td class="w-50 text-end"><strong>Email:</strong></td>
                <td class="w-50 text-start tabla2ColumnaMiPerfil">{{ auth()->user()->email }}</td>
            </tr>
            <tr>
                <td class="w-50 text-end"><strong>Telefono:</strong></td>
                <td class="w-50 text-start tabla2ColumnaMiPerfil">{{ auth()->user()->telefono }}</td>
            </tr>
        </table>
        
            <button type="button" class="btn btn-primary my-2 w-25" data-bs-toggle="modal" data-bs-target="#modalOferta">Cambiar contraseña</button>
            <button type="button" class="btn btn-danger my-2 w-25">Darse de baja</button>
        @else
            <p>Error en la autenticación - DNI no disponible</p>
        @endif
    @else
        <p>Error en la autenticación</p>
    @endif
    
     <!-- Modal Reserva-->
     <div class="modal fade" id="modalOferta" tabindex="-1" aria-labelledby="modalReservalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary-subtle">
                    <h1 class="modal-title fs-5" id="modalReservalLabel">CAMBIAR CONTRASEÑA</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="passwordForm" action="{{ route('usuario.actualizarContrasena',['id' => auth()->user()->id]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="contrasenaActual" class="form-label">Contraseña actual</label>
                            <input type="password" id="contrasenaActual" name="contrasenaActual" class="form-control" placeholder="Ingrese la contraseña antigua" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasenaNueva" class="form-label">Contraseña nueva</label>
                            <input type="password" id="contrasenaNueva" name="contrasenaNueva" class="form-control" placeholder="Ingrese la contraseña nueva" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasenaNuevaRepetir" class="form-label">Repetir contraseña nueva</label>
                            <input type="password" id="contrasenaNuevaRepetir" name="contrasenaNuevaRepetir" class="form-control" placeholder="Repita la contraseña nueva" required>
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

    <script>
        document.getElementById('passwordForm').addEventListener('submit', function(event) {
            var password = document.getElementById('contrasenaNueva').value;
            var confirmPassword = document.getElementById('contrasenaNuevaRepetir').value;
            
            if (password !== confirmPassword) {
                event.preventDefault(); // Detiene el envío del formulario
                alert('Las contraseñas nuevas no coinciden.');
            }
        });
    </script>
    
    </div>
    <div class="cajas" id="caja2">
        <div class="form-check form-switch d-flex justify-content-evenly flex-row">
            <div class="">
                <input class="form-check-input" type="checkbox" id="checkReservasActivas" checked>
                <label class="form-check-label" for="checkReservasActivas">Mostrar reservas activas</label>
            </div>
            <div class="">
                <input class="form-check-input" type="checkbox" id="checkHistorialReservas">
                <label class="form-check-label" for="checkHistorialReservas">Mostrar historial de reservas</label>
            </div>
        </div>
        
        <div id="perfil2TablasReservas">
            <div class="tablaReservas" id="tablaReservasActuales">
                <div class="tablasReservasTituloHR">
                    <h4>RESERVAS ACTIVAS</h4>
                    <hr class="personalizarHR">
                </div>
                <div class="tablasCollapse">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de entrada</th>
                            <th>Fecha de salida</th>
                            <th>Tipo de habitacion</th>
                            <th>Cantidad</th>
                        </tr>
                    @foreach ($reservasActuales as $actual)
                        <tr class="filasDatos">
                            <td>{{ $actual->id}}</td>
                            <td>{{ $actual->fecha_entrada}}</td>
                            <td>{{ $actual->fecha_salida}}</td>
                            <td>{{ $actual->habitacion->tipo}}</td>
                            <td>{{ $actual->cantidad}}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
            
            <div class="tablaReservas" id="tablaReservasHistorial">
                <div class="tablasReservasTituloHR">
                    <h4>HISTORIAL DE RESERVAS</h4>
                    <hr class="personalizarHR">
                </div>
                <div class="tablasCollapse">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de entrada</th>
                            <th>Fecha de salida</th>
                            <th>Tipo de habitacion</th>
                            <th>Cantidad</th>
                        </tr>
                    @foreach ($reservas as $reserva)
                        <tr class="filasDatos">
                            <td>{{ $reserva->id}}</td>
                            <td>{{ $reserva->fecha_entrada}}</td>
                            <td>{{ $reserva->fecha_salida}}</td>
                            <td>{{ $reserva->habitacion->tipo}}</td>
                            <td>{{ $reserva->cantidad}}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const checkbox1 = document.getElementById('checkReservasActivas');
    const checkbox2 = document.getElementById('checkHistorialReservas');
    const table1 = document.getElementById('tablaReservasActuales');
    const table2 = document.getElementById('tablaReservasHistorial');

    checkbox1.addEventListener('change', function() {
        if (checkbox1.checked) {
            table1.style.display = "block";
        } else {
            table1.style.display = "none";
        }
    });
    checkbox2.addEventListener('change', function() {
        if (checkbox2.checked) {
            table2.style.display = "block";
        } else {
            table2.style.display = "none";
        }
    });
</script>
@endsection