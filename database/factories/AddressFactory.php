<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country' => $this->faker->numberBetween(0,50),
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'apartment' => $this->faker->numberBetween(10,100),
            'postal_code' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
