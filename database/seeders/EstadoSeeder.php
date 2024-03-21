<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Estado::create([
            'id' => 1,
            'Estado' => 'Activo',
        ]);
        Estado::create([
            'id' => 2,
            'Estado' => 'Inactivo',
        ]);
    }
}
