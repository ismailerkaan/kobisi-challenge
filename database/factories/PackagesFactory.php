<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PackagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->catchPhrase(),
            'price' => $this->faker->randomFloat(2, 10, 300),
            'period' => $this->faker->randomElement(['monthly', 'yearly']),
        ];
    }
}
