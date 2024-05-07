<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;
    protected $table = 'habitaciones';
    public function reservas() {
        return $this->hasMany('App\Models\Reserva');
    }
    public function ofertas() {
        return $this->hasMany('App\Models\Oferta');
    }
    protected $fillable = ['tipo', 'precio', 'cantidad'];
    
}
