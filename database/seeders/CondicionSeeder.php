<?php

namespace Database\Seeders;

use App\Models\Condicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CondicionSeeder extends Seeder
{
  
    public function run()
    {
        Condicion::create([
            'id'=> 1,
            'condicion' => 'Nuevo',    
        ]);
        Condicion::create([
            'id'=> 2,
            'condicion' => 'Usado',    
        ]);
      
    }
}
