<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function editarArticulo($id) {
        $articulo = Articulo::find($id);
        return view('articulo.formulario', array('articulo' => $articulo));
    }
    public function actualizarDatos($id, Request $r) {
        $articulo = Articulo::find($id);
        $articulo->nombre = $r->nombre;
        $articulo->descripcion = $r->descripcion;
        $articulo->save();
        
        return redirect()->route('mostrar_datos')->with('success', 'Artículo actualizado correctamente');
    }

    public function eliminarArticulo($id) {
        $p = Articulo::find($id);
        $p->delete();
        return redirect()->route('mostrar_datos')->with('success', 'Artículo eliminado correctamente');
    }

    public function insertarArticulo(Request $r){
        $articulo = Articulo::create([  
        'nombre' => $r->nombre,
        'descripcion' => $r->descripcion,
        ]);
        
        return redirect()->route('mostrar_datos')->with('success', 'Artículo insertado correctamente');
    }
}
