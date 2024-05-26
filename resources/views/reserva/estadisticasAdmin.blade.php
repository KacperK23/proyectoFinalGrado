@extends("master")

@section("title", "Albergues Kacper")

@section("content")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #salesChartContainer {
            width: 75%;
            margin: auto;
            margin-top: 15px;
        }
        #salesChart {
            height: 500px !important;
        }
        #recuadrosFacturacion{
            display: flex;
            justify-content: center;
            column-gap: 5px;
            margin: 10px;
        }
        #recuadrosFacturacion div{
            border-radius: 10px;
            background-color: red;
            color: white;
            width: 18%;
        }
        #tituloFacturacion{
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            padding: 5px;
        }
        #precioFacturado{
            font-size: 35px;
            font-weight: bold;
            text-align: center;
            padding: 5px;
        }
    </style>

    <div id="recuadrosFacturacion">
        <div>
            <p id="tituloFacturacion">Total facturado {{$anioActual}}</p>
            <p id="precioFacturado">{{$totalFacturadoAnio}}€</p>
        </div>
        <div>
            <p id="tituloFacturacion">Total facturado</p>
            <p id="precioFacturado">{{$totalFacturado}}€</p>
        </div>
    </div>

    <div id="salesChartContainer">
        <canvas id="salesChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Ventas',
                    data: @json($totals),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 10
                        }
                    }
                },
                plugins: {
        title: {
            display: true,
            text: 'Ventas Mensuales desde hace un año',
            font: {
                size: 18
            }
        }
    }
            }
        });
    </script>
@endsection