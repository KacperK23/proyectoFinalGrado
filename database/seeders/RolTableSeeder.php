<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rols')->insert([
            'rol' => 'Administrador',
        ]);
        DB::table('rols')->insert([
            'rol' => 'Usuario',
        ]);
        DB::table('rols')->insert([
            'rol' => 'Visitante',
        ]);
    }
}
