<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Articulo;
use App\Models\Habitacion;

class OfertaController extends Controller
{
    public function editarOferta($id) {
        $oferta = Oferta::find($id);
        $articulos = Articulo::all();
        $habitaciones = Habitacion::all();
        return view('oferta.formulario', array('oferta' => $oferta,'articulos' => $articulos,'habitaciones' => $habitaciones));
    }
    public function actualizarDatos($id, Request $r) {
        $oferta = Oferta::find($id);
        if ($r->hasFile('imagen')){
            $rutaImagen = "";

            // Obtiene el archivo de la solicitud
            $imagen = $r->file('imagen');
    
            // Genera un nombre único para la imagen
            $nombreImagen = uniqid('imagen_') . '.' . $imagen->getClientOriginalExtension();
    
            // Mueve la imagen a la carpeta public/imagenes
            $imagen->move(public_path('imagenes'), $nombreImagen);
    
            // Almacena la ruta de la imagen en la variable $rutaImagen
            $rutaImagen = 'imagenes/' . $nombreImagen;
        } else {
            $rutaImagen = $oferta->imagen_banner;
        }

        // Busca si hay alguna oferta con banner establecido como 1
        $ofertaConBanner = Oferta::where('banner', 1)->first();

        if (!($ofertaConBanner)){
            if($r->banner == 0){
                $primeraOferta = Oferta::first();
                $primeraOferta->banner = 1;
                $primeraOferta->save();
            }
        } else {
            if (!($ofertaConBanner->id == $oferta->id)) {
                // Si se encuentra alguna oferta con banner establecido como 1, actualiza el campo banner a 0
                if ($ofertaConBanner) {
                    $ofertaConBanner->update(['banner' => 0]);
                }
            }else {
                if ($r->banner == 0){
                    $primeraOferta = Oferta::first();
                    $primeraOferta->banner = 1;
                    $primeraOferta->save();
                }
            }  
        }

        $oferta->nombre = $r->nombre;
        $oferta->descripcion = $r->descripcion;
        $oferta->precio = $r->precio;
        $oferta->fecha_entrada = $r->fechaEntrada;
        $oferta->fecha_salida = $r->fechaSalida;
        $oferta->habitacion_id = $r->tipoHabitacion;
        $oferta->imagen_banner = $rutaImagen;
        $oferta->banner = $r->banner;
        $oferta->save();
        
         // Actualizar los artículos asociados a la oferta
        $oferta->articulos()->sync([$r->tipoArticulo]);

        return redirect()->route('mostrar_datos');
    }

    public function eliminarOferta($id) {
        $p = Oferta::find($id);
        $p->delete();
        return redirect()->route('mostrar_datos');
    }

    public function insertarOferta(Request $r) {
        // Inicializa la variable $rutaImagen como nula
        $rutaImagen = "";
    
        // Verifica si se ha enviado una imagen
        if ($r->hasFile('imagen')) {
            // Obtiene el archivo de la solicitud
            $imagen = $r->file('imagen');
    
            // Genera un nombre único para la imagen
            $nombreImagen = uniqid('imagen_') . '.' . $imagen->getClientOriginalExtension();
    
            // Mueve la imagen a la carpeta public/imagenes
            $imagen->move(public_path('imagenes'), $nombreImagen);
    
            // Almacena la ruta de la imagen en la variable $rutaImagen
            $rutaImagen = 'imagenes/' . $nombreImagen;
        }
    
        // Busca si hay alguna oferta con banner establecido como 1
        $ofertaConBanner = Oferta::where('banner', 1)->first();

        // Si se encuentra alguna oferta con banner establecido como 1, actualiza el campo banner a 0
        if ($ofertaConBanner) {
            $ofertaConBanner->update(['banner' => 0]);
        }
        // Crea la oferta en la base de datos
        $oferta = Oferta::create([
            'nombre' => $r->nombre,
            'descripcion' => $r->descripcion,
            'precio' => $r->precio,
            'fecha_entrada' => $r->fechaEntrada,
            'fecha_salida' => $r->fechaSalida,
            'habitacion_id' => $r->tipoHabitacion,
            'imagen_banner' => $rutaImagen, // Utiliza $rutaImagen como valor para el campo 'imagen'
            'banner' => 1,
        ]);
        
        // Actualiza los artículos asociados a la oferta
        $oferta->articulos()->sync([$r->tipoArticulo]);
        
        return redirect()->route('mostrar_datos');
    }

    public function verOferta($id) {
        $oferta = Oferta::find($id);
        return view('oferta.mostrar', array('oferta' => $oferta));
    }
}
