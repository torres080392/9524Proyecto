<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{

    public function run()
    {
        //Sedeer con los tipos de equipos de la compañia
        Tipo::create([
          
            'tipo' => 'Portatil',    
        ]);
        Tipo::create([
         
            'tipo' => 'Escritorio',    
        ]);
        Tipo::create([
            
            'tipo' => 'Servidor',    
        ]);
        Tipo::create([
            
            'tipo' => 'Periferico de impresion',    
        ]);
        Tipo::create([
           
            'tipo' => 'Escaner de mano',    
        ]);
        Tipo::create([
           
            'tipo' => 'Escaner de mesa',    
        ]);
        Tipo::create([
            
            'tipo' => 'Celular',    
        ]);
        Tipo::create([
           
            'tipo' => 'Monitor',    
        ]);
        Tipo::create([
           
            'tipo' => 'Bascula',    
        ]);
        Tipo::create([
            
            'tipo' => 'Pda',    
        ]);
     
        Tipo::create([
           
            'tipo' => 'Anillo',    
        ]);
        

    }
}
