<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Estado;
use App\Models\Usuario;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->firstName,
            'apellido' => fake()->lastName,
            'documento' => fake()->unique()->randomNumber(8),
            'telefono' =>fake()->phoneNumber,
            'correo' => fake()->unique()->safeEmail,
            'direccion' => fake()->address,
            'cargo_id' => Cargo::inRandomOrder()->first()->id,
            'estado_id' => Estado::inRandomOrder()->first()->id,
            'area_id' => Area::inRandomOrder()->first()->id,
            
            // Define los valores predeterminados para otros campos aquí
        ];
    }
}
