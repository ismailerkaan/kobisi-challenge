<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompaniesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'site_url' => $this->faker->domainName(),
            'company_name' => $this->faker->company(),
            'status' => $this->faker->randomElement(['active', 'passive'])
        ];
    }
}
