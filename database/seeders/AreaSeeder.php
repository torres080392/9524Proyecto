<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{

    public function run()
    {
        Area::create([
           
            'Area' => 'Sistemas',    
        ]);
        Area::create([
          
            'Area' => 'Contabilad',    
        ]);
        Area::create([
      
            'Area' => 'Credito',    
        ]);
        Area::create([
       
            'Area' => 'Administracion',    
        ]);
        Area::create([
          
            'Area' => 'Ventas',    
        ]);
        Area::create([
           
            'Area' => 'Centro de servicio',    
        ]);
        Area::create([
       
            'Area' => 'Talento Humano',    
        ]);
        Area::create([
          
            'Area' => 'Almacen',    
        ]);
        Area::create([
         
            'Area' => 'Seguridad',    
        ]);
        Area::create([
         
            'Area' => 'Auditoria',    
        ]);
        Area::create([
           
            'Area' => 'Sistemas Mexico',    
        ]);
        Area::create([
           
            'Area' => 'Sistemas Colombia Bogota',    
        ]);
        Area::create([
           
            'Area' => 'Sistemas Colombia Barranquilla',    
        ]);
    }
}
