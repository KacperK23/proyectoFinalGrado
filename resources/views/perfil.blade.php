@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<div id="caja-padre">
    <div class="cajas" id="caja1">
        @if(auth()->check())
        @if(auth()->user()->dni)
            <p>DNI:  {{ auth()->user()->dni }}</p>
            <p>Nombre: {{ auth()->user()->name }}</p>
            <p>Apellido: {{ auth()->user()->apellido }}</p>
            <p>Email: {{ auth()->user()->email }}</p>
            <p>Telefono: {{ auth()->user()->telefono }}</p>
            <button>Cambiar contraseña</button>
        @else
            <p>Error en la autenticación - DNI no disponible</p>
        @endif
    @else
        <p>Error en la autenticación</p>
    @endif
    


    </div>
    <div class="cajas" id="caja2">
        <h3>RESERVAS</h3>
        <div>
            <h4>RESERVAS ACTIVAS</h4>
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
        <div>
            <h4>HISTORIAL DE RESERVAS</h4>
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
@endsection