<?php

namespace Database\Factories;

use App\Models\Condicion;
use App\Models\Tipo;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipo>
 */
class EquipoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'usuario_id' => Usuario::inRandomOrder()->first()->id,
            'condicion_id' => Condicion::inRandomOrder()->first()->id,
            'tipo_id' => Tipo::inRandomOrder()->first()->id,
            'nombre' => fake()->firstName(), // Genera un nombre aleatorio
            'serial' => fake()->unique()->uuid, // Genera un serial único
            'compra' => fake()->dateTimeBetween('-5 years', 'now'), // Fecha de compra aleatoria en los últimos 5 años
            'garatiaInicial' => fake()->dateTimeBetween('-5 years', 'now'), // Fecha de garantía inicial aleatoria en los últimos 5 años
            'garatiaFinal' => fake()->dateTimeBetween('now', '+5 years'), // Fecha de garantía final aleatoria en los próximos 5 años
        ];
    }
}
