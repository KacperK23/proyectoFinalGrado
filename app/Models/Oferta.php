<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    public function reservas() {
        return $this->hasMany('App\Models\Reserva');
    }
    public function habitacion() { return $this->belongsTo('App\Models\Habitacion'); }

    public function articulos() {
        return $this->belongsToMany('App\Models\Articulo'); // Corregido el nombre del modelo
    } 

    protected $fillable = ['nombre', 'descripcion', 'precio', 'fecha_entrada', 'fecha_salida', 'habitacion_id', 'imagen_banner', 'banner'];
}
