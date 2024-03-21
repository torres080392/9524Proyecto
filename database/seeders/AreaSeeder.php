<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'id'=> 1,
            'Area' => 'Sistemas',    
        ]);
        Area::create([
            'id'=> 2,
            'Area' => 'Contabilad',    
        ]);
        Area::create([
            'id'=> 3,
            'Area' => 'Credito',    
        ]);
    }
}
