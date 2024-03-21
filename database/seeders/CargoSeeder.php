<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create([
            'id'=> 1,
            'cargo' => 'Consultor SAP',    
        ]);
        Cargo::create([
            'id'=> 2,
            'cargo' => 'Contador',    
        ]);
        Cargo::create([
            'id'=> 3,
            'cargo' => 'Gerente Administrativo',    
        ]);
    }
}
