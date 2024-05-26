<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reservas';
    protected $fillable = [
        // otros campos aquí...
        'fecha_entrada',
        'fecha_salida',
        'usuario_id',
        'habitacion_id',
        'cantidad',
        'pagado',
        'oferta_id',
    ];
    public function habitacion() { return $this->belongsTo('App\Models\Habitacion'); }

    public function usuario() { return $this->belongsTo('App\Models\Usuario'); }
    
    public function oferta() { return $this->belongsTo('App\Models\Oferta'); }
    
}
