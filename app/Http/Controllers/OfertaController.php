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
        if ($r->hasFile('imagen') && $r->hasFile('imagenOferta')) {
            // Obtiene el archivo de la solicitud
            $imagen = $r->file('imagen');
            $imagenOferta = $r->file('imagenOferta');
    
            // Genera un nombre único para la imagen
            $nombreImagen = uniqid('imagen_') . '.' . $imagen->getClientOriginalExtension();
            $nombreImagenOferta = uniqid('imagen_') . '.' . $imagenOferta->getClientOriginalExtension();
    
            // Mueve la imagen a la carpeta public/imagenes
            $imagen->move(public_path('imagenes'), $nombreImagen);
            $imagenOferta->move(public_path('imagenes'), $nombreImagenOferta);
    
            // Almacena la ruta de la imagen en la variable $rutaImagen
            $rutaImagen = 'imagenes/' . $nombreImagen;
            $rutaImagenOferta = 'imagenes/' . $nombreImagenOferta;
        } else {
            $rutaImagen = $oferta->imagen_banner;
            $rutaImagenOferta = $oferta->imagen_oferta;
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
        $oferta->imagen_oferta = $rutaImagenOferta;
        $oferta->banner = $r->banner;
        $oferta->save();
        
         // Actualizar los artículos asociados a la oferta
        $oferta->articulos()->sync([$r->tipoArticulo]);

        return redirect()->route('mostrar_datos')->with('success', 'Oferta actualizada correctamente');;
    }

    public function eliminarOferta($id) {
        $p = Oferta::find($id);
        $p->delete();
        return redirect()->route('mostrar_datos')->with('success', 'Oferta eliminada correctamente');;
    }

    public function insertarOferta(Request $r) {
        // Inicializa la variable $rutaImagen como nula
        $rutaImagen = "";
    
        // Verifica si se ha enviado una imagen
        if ($r->hasFile('imagen') && $r->hasFile('imagenOferta')) {
            // Obtiene el archivo de la solicitud
            $imagen = $r->file('imagen');
            $imagenOferta = $r->file('imagenOferta');
    
            // Genera un nombre único para la imagen
            $nombreImagen = uniqid('imagen_') . '.' . $imagen->getClientOriginalExtension();
            $nombreImagenOferta = uniqid('imagen_') . '.' . $imagenOferta->getClientOriginalExtension();
    
            // Mueve la imagen a la carpeta public/imagenes
            $imagen->move(public_path('imagenes'), $nombreImagen);
            $imagenOferta->move(public_path('imagenes'), $nombreImagenOferta);
    
            // Almacena la ruta de la imagen en la variable $rutaImagen
            $rutaImagen = 'imagenes/' . $nombreImagen;
            $rutaImagenOferta = 'imagenes/' . $nombreImagenOferta;
        }
    
        if($r->eleccionBanner == 1){
            // Busca si hay alguna oferta con banner establecido como 1
        $ofertaConBanner = Oferta::where('banner', 1)->first();

        // Si se encuentra alguna oferta con banner establecido como 1, actualiza el campo banner a 0
        if ($ofertaConBanner) {
            $ofertaConBanner->update(['banner' => 0]);
        }
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
            'imagen_oferta' => $rutaImagenOferta, // Utiliza $rutaImagen como valor para el campo 'imagen'
            'banner' => $r->eleccionBanner,
        ]);
        
        // Actualiza los artículos asociados a la oferta
        $oferta->articulos()->sync([$r->tipoArticulo]);
        
        return redirect()->route('mostrar_datos')->with('success', 'Oferta insertada correctamente');
    }

    public function verOferta($id) {
        $oferta = Oferta::find($id);
        return view('oferta.mostrar', array('oferta' => $oferta));
    }
}
