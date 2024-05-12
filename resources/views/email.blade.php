<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Albergues Kacper</h1>
    <h2>Resumen de la reserva</h2>
    <h3>Calle Buena 5, Maella</h3>

    <p><strong>Fecha de Entrada:</strong> {{ $reserva->fecha_entrada }}</p>
    <p><strong>Fecha de Salida:</strong> {{ $reserva->fecha_salida }}</p>
    <p><strong>Tipo de Habitación:</strong> {{ $reserva->habitacion->tipo }}</p>
    <p><strong>Cantidad de habitaciones:</strong> {{ $reserva->cantidad }}</p>
</body>
</html>