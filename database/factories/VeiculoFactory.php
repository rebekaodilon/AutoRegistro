<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'chassi' => $this->faker->unique()->numerify('###############'),
            'placa' => $this->faker->unique()->numerify('#######'),
            'renavam' => $this->faker->unique()->numerify('###########'),
            'modelo' => $this->faker->name(),
            'marca' => $this->faker->name(),
            'valor_compra' => $this->faker->randomFloat(2, 1000, 100000),
            'empresa_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
