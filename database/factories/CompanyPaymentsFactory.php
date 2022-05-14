<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyPaymentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['active', 'passive']),
            'created_at' => $this->faker->dateTimeBetween('-2 year', '-4 day'),
        ];
    }
}
