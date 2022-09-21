<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'country' => $this->faker->country(),
            'age' => $this->faker->numberBetween(18, 45),
            'height' => $this->faker->numberBetween(160, 210),
            'weight' => $this->faker->numberBetween(65, 100),
        ];
    }
}
