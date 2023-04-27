<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'razao_social' => $this->faker->name(),
            'cnpj' => $this->faker->unique()->numerify('###########'),
            'endereco' => $this->faker->address(),
            'cep' => $this->faker->numerify('########'),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => $this->faker->secondaryAddress(),
            'bairro' => $this->faker->streetName(),
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail()
        ];
    }
}
