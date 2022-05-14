<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyPackagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'package_id' => Package::all()->random()->id,
            'start_date' => $this->faker->dateTimeBetween('-1 year', '-3 month'),
            'end_date' => $this->faker->dateTimeBetween('-3 month', '-5 month'),
        ];
    }
}
