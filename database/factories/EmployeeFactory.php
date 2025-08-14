<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'cep' => '63585000',
            'cpf' => '123456789',
            'registration' => '1234567',
            'birthday' => fake()->date(),
            'street' => fake()->name(),
            'gender' => 'm',
            'number' => rand(1, 999),
            'linguee' => 'Sao pedro do norte',
        ];
    }
}
