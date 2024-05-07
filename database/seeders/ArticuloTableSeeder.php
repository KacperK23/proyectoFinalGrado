<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ArticuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articulos')->insert([
            'nombre' => 'entradas',
            'descripcion' => 'Entradas para ver el museo',
        ]);
        DB::table('articulos')->insert([
            'nombre' => 'entradas',
            'descripcion' => 'Entradas para ver el castillo',
        ]);
        DB::table('articulos')->insert([
            'nombre' => 'bono',
            'descripcion' => 'Elemento unico que te da acesibilidad a cualquier lugar en la fiestas',
        ]);
    }
}
