<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OfertaArticuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articulo_oferta')->insert([
            'oferta_id' => '1',
            'articulo_id' => '2',
        ]);
        DB::table('articulo_oferta')->insert([
            'oferta_id' => '1',
            'articulo_id' => '1',
        ]);
        DB::table('articulo_oferta')->insert([
            'oferta_id' => '1',
            'articulo_id' => '1',
        ]);
    }
}
