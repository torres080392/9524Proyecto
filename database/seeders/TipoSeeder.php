<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tipo::create([
            'id'=> 1,
            'tipo' => 'Portatil',    
        ]);
        Tipo::create([
            'id'=> 2,
            'tipo' => 'Escritorio',    
        ]);
        Tipo::create([
            'id'=> 3,
            'tipo' => 'Servidor',    
        ]);
    }
}
