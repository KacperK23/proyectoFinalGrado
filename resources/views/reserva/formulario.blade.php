@extends("master")

@section("title", "Albergues Kacper")

@section("content")

<form action="{{ route('reserva.actualizar', ['reserva' => $reserva->id]) }}" method="post">
          @csrf
        <div class="mb-3">
          <label for="fechaEntrada" class="form-label">FECHA DE ENTRADA</label>
          <input type="date" id="fechaEntrada" name="fechaEntrada" class="form-control" value="{{ $reserva->fecha_entrada ?? '' }}">
        </div>
        <div class="mb-3">
          <label for="fechaSalida" class="form-label">FECHA DE SALIDA</label>
          <input type="date" id="fechaSalida" name="fechaSalida" class="form-control" value="{{ $reserva->fecha_salida ?? '' }}">
        </div>
        <div class="mb-3">
          <label for="dni" class="form-label">DNI</label>
          <input type="text" id="dni" name="dni" class="form-control" placeholder="Ingrese su DNI" value="{{ $reserva->usuario->dni ?? '' }}">
        </div>
        <div class="mb-3 d-flex align-items-center">
          <label for="tipoHabitacion" class="form-label selectoresFormulario">Tipo de habitacion</label>
          <select class="form-select w-75" name="tipoHabitacion" id="">
          @foreach($habitaciones as $habitacion){
              <option value="{{$habitacion->id}}"
                @if( $habitacion->id == ($reserva->habitacion_id ?? ""))
                  selected
                @endif
                >{{strtoupper($habitacion->tipo)}}</option>
              
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

      <div class="mb-3 d-flex align-items-center">
        <label for="pagado" class="form-label selectoresFormulario">Pagado</label>
        <select class="form-select w-75" name="pagado" id="">
                <option value="0" @if( $reserva->pagado == 0) selected @endif>NO</option>
                <option value="1" @if( $reserva->pagado == 1) selected @endif>SI</option>
        </select>
    </div>
     
      <input type="hidden" name="usuario_id" value="{{ $reserva->usuario_id}}">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
          data-bs-target="#exampleModal">ACTUALIZAR DATOS</button>
  </div>
    </form>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const fechaEntrada = document.getElementById('fechaEntrada');
          const fechaSalida = document.getElementById('fechaSalida');

          // Obtener la fecha actual en el formato YYYY-MM-DD
          const today = new Date().toISOString().split('T')[0];
                          
          // Establecer la fecha mínima como la fecha actual
          fechaEntrada.setAttribute('min', today);
  
          fechaEntrada.addEventListener('change', function () {
              // Obtener la fecha de entrada y sumar un día
              const fechaEntradaValue = new Date(fechaEntrada.value);
              fechaEntradaValue.setDate(fechaEntradaValue.getDate() + 1);
  
              // Convertir la fecha a formato ISO (YYYY-MM-DD)
              const fechaMinSalida = fechaEntradaValue.toISOString().split('T')[0];
  
              // Establecer la fecha mínima de fechaSalida
              fechaSalida.min = fechaMinSalida;
  
              // Restablecer fechaSalida si es menor que la nueva fecha mínima
              if (fechaSalida.value < fechaMinSalida) {
                  fechaSalida.value = fechaMinSalida;
              }
          });
      });
  </script>
@endsection