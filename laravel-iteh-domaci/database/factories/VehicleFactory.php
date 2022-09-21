<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        $v = $this->faker->vehicleArray();
        return [
            'name' => $v['brand'],
            'model' => $v['model'],
            'max_speed' => $this->faker->numberBetween(200, 500),
            'horsepower' => $this->faker->numberBetween(120, 500),
            'fuel' => $this->faker->numberBetween(6, 20),
            'driver_id' => $this->faker->numberBetween(1, 10),
            'manufacturer_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
