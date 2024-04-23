<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        //
        User::create([
            'name' => 'Administrador',
            'email' => 'admin1234@9524colombia.com',
            'password' => bcrypt('Truper2124**'),
        ]);
    }
}
