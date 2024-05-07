<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('habitaciones')->insert([
            'tipo' => 'litera',
            'precio' => '20',
            'cantidad' => '20',
        ]);
        DB::table('habitaciones')->insert([
            'tipo' => 'individual',
            'precio' => '30',
            'cantidad' => '3',
        ]);
        DB::table('habitaciones')->insert([
            'tipo' => 'doble',
            'precio' => '40',
            'cantidad' => '2',
        ]);
    }
}
