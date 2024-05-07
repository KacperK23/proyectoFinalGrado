<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'dni' => '12345612A',
            'name' => 'Kacper',
            'apellido' => 'Konarzewski',
            'email' => 'admin@admin.com',
            'telefono' => '123456789',
            'password' => '$2y$12$iT8T5UNs1FChAcOAc8sRzuh00Tl5UDrWB3cHW6dUEF7gHVMnTJWR.',
            'rol_id' => '1',
        ]);
    }
}
