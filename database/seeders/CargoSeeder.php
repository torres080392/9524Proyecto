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
         
            'cargo' => 'Consultor SAP',    
        ]);
        Cargo::create([
       
            'cargo' => 'Contador',    
        ]);
        Cargo::create([
        
            'cargo' => 'Gerente ',    
        ]);
        Cargo::create([
       
            'cargo' => 'Aprendiz SENA',    
        ]);
        Cargo::create([
         
            'cargo' => 'Director ',    
        ]);
        Cargo::create([
      
            'cargo' => 'Coordinador',    
        ]);
        Cargo::create([
        
            'cargo' => 'Supervisor',    
        ]);
        Cargo::create([
         
            'cargo' => 'Vendedor',    
        ]);
        Cargo::create([
        
            'cargo' => 'Auxiliar',    
        ]);
        Cargo::create([
          
            'cargo' => 'Operario',    
        ]);
        Cargo::create([
          
            'cargo' => 'Analista',    
        ]);
        Cargo::create([
          
            'cargo' => 'Auditor',    
        ]);
        Cargo::create([
     
            'cargo' => 'Practicante',    
        ]);
        Cargo::create([
       
            'cargo' => 'Jefe de area',    
        ]);
        Cargo::create([
       
            'cargo' => 'Recepcionista',    
        ]);
        Cargo::create([
          
            'cargo' => 'Mensajero',    
        ]);
        Cargo::create([
          
            'cargo' => 'Visitante',    
        ]);
    }
}
