@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<style>
    #contenedorTodasPreviciones{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }
    .previsionTiempo{
        padding: 5px;
        box-shadow: none;
        background-color: #b2ede1
    }
    .headerCardTiempo{
        background-color: #23d6af;
    }
</style>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('inicio') }}">INICIO</a></li>
      <li class="breadcrumb-item active" aria-current="page">PREVISIÓN DE TIEMPO</li>
    </ol>
  </nav>
<h2>Previsión del Tiempo para los próximos 14 días</h2>
    <div id="contenedorTodasPreviciones">
        @foreach($weatherData['time'] as $index => $date)
            <div class="card text-center col-md-3 col-sm-6 previsionTiempo">
                <div class="card-header headerCardTiempo">
                    <p><strong>{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}</strong></p>
                  </div>
                  <div class="card-body">
                <p>Máxima: {{ $weatherData['temperature_2m_max'][$index] }} °C</p>
                <p>Mínima: {{ $weatherData['temperature_2m_min'][$index] }} °C</p>
                <!--<p>Código del Clima: {{ $weatherData['weathercode'][$index] }}</p>-->
            </div>
            </div>
        @endforeach
    </div>
</div>      
@endsection