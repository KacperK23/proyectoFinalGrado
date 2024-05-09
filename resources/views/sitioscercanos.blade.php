@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<div class="container" id="sitioscercanos">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('inicio') }}">INICIO</a></li>
      <li class="breadcrumb-item active" aria-current="page">SITIOS CERCANOS</li>
    </ol>
  </nav>
    <h2>SITIOS CERCANOS</h2>
    <div class="row">
        <div class="col">
            <p class="titulositioscercanos">PUEBLOS CERCANOS</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">LOCALIDAD</th>
                      <th scope="col">DISTANCIA (KM)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">FABARA</th>
                      <td>9 KM</td>
                    </tr>
                    <tr>
                      <th scope="row">BATEA</th>
                      <td>17,5 KM</td>
                    </tr>
                    <tr>
                      <th scope="row">MAZALEON</th>
                      <td>10,6 KM</td>
                    </tr>
                    <tr>
                        <th scope="row">CASPE</th>
                        <td>21,2 KM</td>
                      </tr>
                  </tbody>
            </table>
        </div>
        <div class="col">
            <p class="titulositioscercanos">RESTAURANTE Y BARES</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">CALLE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Restaurante El Guijarro</th>
                      <td>Av. de Aragón, 117</td>
                    </tr>
                    <tr>
                      <th scope="row">Bar Restaurante Matarraña</th>
                      <td>C. Teruel, 2</td>
                    </tr>
                    <tr>
                      <th scope="row">Bar casino</th>
                      <td>Pl. de España, 3</td>
                    </tr>
                    <tr>
                        <th scope="row">Bar Lis</th>
                        <td>Av. Pablo Gargallo, 63</td>
                      </tr>
                  </tbody>
            </table>
        </div>
    </div>   

    <div class="row">
        <div class="col">
            <p class="titulositioscercanos">INSTALACIONES DEPORTIVAS</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">TIPO</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>POLIDEPORTIVO</td>
                    </tr>
                    <tr>
                      <td>GIMNASIO</td>
                    </tr>
                    <tr>
                      <td>PISTA DE PADEL</td>
                    </tr>
                    <tr>
                        <td>CAMPO DE FUTBOL</td>
                    </tr>
                  </tbody>
            </table>
        </div>
        <div class="col">
            <p class="titulositioscercanos">SITIOS VARA VISITAR</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">TIPO</th>
                      <th scope="col">DIRECCION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Casa natal museo de Pablo Gargallo</th>
                      <td>Av. Pablo Gargallo, 2</td>
                    </tr>
                    <tr>
                      <th scope="row">Castillo de Maella</th>
                      <td>C. Virgen del Pilar, 30</td>
                    </tr>
                    <tr>
                      <th scope="row">Torre del ayuntamiento</th>
                      <td>Pl. de España, 1</td>
                    </tr>
                    <tr>
                        <th scope="row">Iglesia de San Esteban Protomártir</th>
                        <td>Pl. Cristo Rey, 1</td>
                      </tr>
                  </tbody>
            </table>
        </div>
    </div>   

    <div class="row">
        <div class="col">
            <p class="titulositioscercanos">AEROPUESTOS Y PUERTO CERCANO</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">LOCALIDAD</th>
                      <th scope="col">DISTANCIA (KM)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">AEROPUESTO ZARAGOZA</th>
                      <td>138 KM</td>
                    </tr>
                    <tr>
                      <th scope="row">AEROPUESTO LLEIDA</th>
                      <td>101 KM</td>
                    </tr>
                    <tr>
                      <th scope="row">AEROPUESTO ZARAGOZA</th>
                      <td>104 KM</td>
                    </tr>
                    <tr>
                        <th scope="row">PUERTO TARRAGONA</th>
                        <td>116 KM</td>
                      </tr>
                  </tbody>
            </table>
        </div>
        <div class="col">
            <p class="titulositioscercanos">TRANSPORTE PUBLICO CERCANO</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">TIPO</th>
                      <th scope="col">DIRECCION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">AUTOBUS</th>
                      <td>Av. Pablo Gargallo, 63, 1, 50710 Maella, Zaragoza</td>
                    </tr>
                    <tr>
                      <th scope="row">TREN FABARA</th>
                      <td>Estacion De Ferrocarril, S/N, 50793 Fabara, Zaragoza</td>
                    </tr>
                    <tr>
                      <th scope="row">TREN CASPE</th>
                      <td>Pl. Obispo Cubeles, 15, 50700 Caspe, Zaragoza</td>
                    </tr>
                    <tr>
                        <th scope="row">AVE</th>
                        <td>Plaça de Berenguer IV, s/n, 25005 Lleida</td>
                      </tr>
                  </tbody>
            </table>
        </div>
    </div> 
</div>
       
@endsection