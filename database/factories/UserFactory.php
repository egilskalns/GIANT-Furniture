<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'title' => $this->faker->randomElement(['Mr', 'Mrs', 'Ms', 'Mx', 'Prefer not to say']),
            'country_region' => $this->faker->numberBetween(0,50),
            'address_ids' => json_encode([$this->faker->numberBetween(0,500), $this->faker->numberBetween(501,1000)]),
            'email' => $this->faker->unique()->safeEmail,
            'role' => $this->faker->randomElement(['user', 'worker']),
            'email_verified_at' => $this->faker->randomElement([null, now()]),
            'password' => bcrypt('password'),
            'remember_token' => $this->faker->uuid,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
