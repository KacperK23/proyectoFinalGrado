<style>
<style>
    .container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        
    }
    table#pdfCabezera{
        width: 600px;
        text-align: center;
        font-weight: bold;
    }

    table{
        width: 600px;
    }
    .vistapdfcolumna1{
        font-weight: bold;
    }
    img{
        height: 100px;
    }
    #texto{
        font-size: 30px;
    }
    h1{
        text-align: center;
    }
</style>
<div class="container">
    <table id="pdfCabezera">
        <tr>
            <img class="mx-2" id="escudo-maella" src="{{ asset('/imagenes/logo-sinfondo.png') }}" alt="">
            <td id="texto">JUSTIFICANTE DE RESERVA</td>
        </tr>
    </table>
    <br>
    <br>
    <h1>RESERVA {{ $resumenReserva->id }}</h1>
    <br>
    <table>
        <tr>
            <td class="vistapdfcolumna1">Fecha de Entrada:</td>
            <td>{{ $resumenReserva->fecha_entrada }}</td>
        </tr>
        <tr>
            <td class="vistapdfcolumna1">Fecha de Salida:</td>
            <td>{{ $resumenReserva->fecha_salida }}</td>
        </tr>
        <tr>
            <td class="vistapdfcolumna1">DNI:</td>
            <td>{{ $resumenReserva->usuario->dni }}</td>
        </tr>
        <tr>
            <td class="vistapdfcolumna1">Nombre completo</td>
            <td>{{ $resumenReserva->usuario->name }} {{ $resumenReserva->usuario->apellido }}</td>
        </tr>
        <tr>
            <td class="vistapdfcolumna1">Telefono:</td>
            <td>{{ $resumenReserva->usuario->telefono }}</td>
        </tr>
        <tr>
            <td class="vistapdfcolumna1">Tipo de Habitación:</td>
            <td>{{ $resumenReserva->habitacion->tipo }}</td>
        </tr>
        <tr>
            <td class="vistapdfcolumna1">Cantidad de habitaciones:</td>
            <td>{{ $resumenReserva->cantidad }}</td>
        </tr>
        <tr>
            <td class="vistapdfcolumna1">Oferta:</td>
            <td><?php if($resumenReserva->oferta_id){
                echo $resumenReserva->oferta->nombre;
            } else {
                echo "NO";
            }
            ?></td>
        </tr>
    </table>
</div>