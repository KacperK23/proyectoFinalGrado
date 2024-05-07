<?php

namespace Database\Seeders;

use App\Models\Artículo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
        $this->call(RolTableSeeder::class);
        $this->call(ArticuloTableSeeder::class);
        $this->call(HabitacionTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(OfertaTableSeeder::class);
        $this->call(OfertaArticuloTableSeeder::class);
    }
}
