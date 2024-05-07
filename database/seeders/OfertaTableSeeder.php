<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class OfertaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $fecha_entrada = Carbon::createFromFormat('d/m/Y', '26/04/2024')->toDateString();
        $fecha_salida = Carbon::createFromFormat('d/m/Y', '29/04/2024')->toDateString();

        DB::table('ofertas')->insert([
            'nombre' => '1',
            'descripcion' => 'Oferta especvial de verano',
            'precio' => '22',
            'fecha_entrada' => $fecha_entrada,
            'fecha_salida' => $fecha_salida,
            'habitacion_id' => '2',
        ]);
    }
}
