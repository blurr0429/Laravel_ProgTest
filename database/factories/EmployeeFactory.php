<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'companyId' => $this->faker->numberBetween(1, Listing::count()),
            'email' => $this->faker->companyEmail(),
            'phone' => $this->faker->phoneNumber()
        ];
    }
}