@extends("master")

@section("title", "Albergues Kacper")

@section("content")
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function(){
        $('#example').DataTable();
    })
</script>

<section class="p-2">
    
        <div > 
            @foreach ($ofertas as $oferta)
                @if($oferta->banner == 1)
                    <img src="{{ asset($oferta->imagen_banner) }}" id="banner-publi-inicio"
                    alt="Imagen de cabecera">
                @endif
            @endforeach
         </div>

        <form action="{{ route('consultarDisponibilidad') }}" method="post" class="formulariosFondoGris">
            @csrf
            <div class="mb-3">
                <label for="fechaEntrada" class="form-label">FECHA DE ENTRADA</label>
                <input type="date" id="fechaEntrada" name="fechaEntrada" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fechaSalida" class="form-label">FECHA DE SALIDA</label>
                <input type="date" id="fechaSalida" name="fechaSalida" class="form-control" required>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label for="tipoHabitacion" class="form-label selectoresFormulario">Tipo de habitacion</label>
                <select class="form-select w-75" name="tipoHabitacion" id="tipoHabitacion" required>
                @foreach($habitaciones as $habitacion){
                    <option value="{{$habitacion->id}}">{{strtoupper($habitacion->tipo)}}</option>
                }
                @endforeach
            </select>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label for="numeroHabitacion" class="form-label selectoresFormulario">Numero de habitaciones</label>
                <select class="form-select w-75" name="numeroHabitacion" id="numeroHabitacion" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" id="indexOpcionLiteras" style="display: none">3</option>
                </select>
            </div>

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
            <script>
                document.getElementById('tipoHabitacion').addEventListener('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    var selectedText = selectedOption.textContent;
                    console.log("Texto seleccionado:", selectedText);
                    if (selectedText == 'INDIVIDUAL'){
                        document.getElementById('indexOpcionLiteras').style.display = 'block';
                        document.getElementById('numeroHabitacion').value = '1';
                    }else {
                        document.getElementById('indexOpcionLiteras').style.display = 'none';
                        document.getElementById('numeroHabitacion').value = '1';
                    }
                });
            </script>


            <!-- <div class="row mb-3">
                <div class="col-8">
                    <label for="selector" class="form-label">TIPO DE HABITACIÓN</label>
                    <select id="selector" class="form-select" required>
                        <option>Problemas con las entradas</option>
                        <option>Problemas con la tienda online</option>
                        <option>Problemas con la página web</option>
                        <option>Otros</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="selector" class="form-label">CANTIDAD</label>
                    <select id="selector" class="form-select" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
            </div> -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Enviar</button>
            </div>
        </form>

        <h3 class="text-center">OFERTAS DESTACADAS</h3>
        <!-- Cards -->
        <div class="row row-cols-1 row-cols-md-3 g-4 w-75 mx-auto">
                @foreach ($ofertas as $oferta)
                    <div class="col">
                        <div class="card ofertas p-2">
                            <img src="{{ asset($oferta->imagen_banner) }}" class="card-img-top h-100" id="banner-publi-inicio" alt="imagen de la oferta">
                            <div class="card-body text-center   ">
                                <p class=""><strong>{{ $oferta->nombre }}</strong></p>
                                <a href="{{ route('oferta.mostrar',['oferta' => $oferta->id]) }}" class="btn btn-primary">Ver oferta</a>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </section>
    
@endsection


