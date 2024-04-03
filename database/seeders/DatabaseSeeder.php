<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Equipo;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      //  Usuario::factory()->count(0)->create();
      //  Equipo::factory()->count(100)->create();
       // User::factory()->count(20)->create();
      
    }

    public function down()
{
    // Deshacer las operaciones de seeding realizadas en el método up()
    // Por ejemplo:
    Equipo::truncate();
    // Otros comandos de reversión...
}

}
