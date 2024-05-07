<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    
    public function usuarios() {
        return $this->hasMany('App\Models\Usuario');
    }
    public function artículos() {
        return $this->belongsToMany('App\Models\Artículo');
    }
    

}
