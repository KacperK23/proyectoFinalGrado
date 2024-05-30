@extends("master")

@section("title", "Albergues Kacper")

@section("content")

<div id="divNoDisponibilidad">
    <p>No hay disponibilidad para este tipo de habitación</p> 
    <p>Puedes buscar disponiblidad para otros dias o seleccionar otro tipo de habitacion</p>

    <div>
        <a href="{{ route('inicio') }}">
            <button class="btn btn-primary" type="button">PAGINA PRINCIPAL</button>
        </a>
        <div id="botonesSecundarios">
            <a href="{{ url('/quienes-somos') }}">
                <button class="btn btn-primary" type="button">¿Quienes somos?</button>
            </a>

            <a href="{{ url('/contactanos') }}">
                <button class="btn btn-primary" type="button">FORMULARIO DE CONTACTO</button>
            </a>
        </div>
    </div>

</div> 
@endsection


