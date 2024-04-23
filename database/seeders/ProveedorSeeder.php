<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'name'=> 'claro'
        ]);
        Proveedor::create([
            'name'=> 'ETB'
        ]);
        Proveedor::create([
            'name'=> 'Disainer Nomina'
        ]);
        Proveedor::create([
            'name'=> 'Facture'
        ]);
        Proveedor::create([
            'name'=> 'Origin'
        ]);
        Proveedor::create([
            'name'=> 'Rio Tecnology'
        ]);
        Proveedor::create([
            'name'=> 'Controles Empresariales'
        ]);
        Proveedor::create([
            'name'=> 'Tecnologia informatica'
        ]);
        Proveedor::create([
            'name'=> 'Ricoh'
        ]);
        Proveedor::create([
            'name'=> 'Ifx'
        ]);
    }
    
}
