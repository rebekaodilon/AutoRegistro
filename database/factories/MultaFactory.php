<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Multa>
 */
class MultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->text('20'),
            'orgao' => $this->faker->name(),
            'valor' => $this->faker->randomFloat(2, 1000, 100000),
            'quitacao' => $this->faker->boolean(),
            'quitacao_data_hora' => $this->faker->dateTime(),
            'veiculo_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
