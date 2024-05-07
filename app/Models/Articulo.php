<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    public function ofertas() {
        return $this->belongsToMany('App\Models\Oferta');
    }
    protected $fillable = ['nombre', 'descripcion'];

    
}
