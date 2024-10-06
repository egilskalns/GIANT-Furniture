<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1, 35),
            'name' => fake()->text(24),
            'sku' => fake()->unique()->regexify('[A-Z0-9]{8}'),
            'description' => fake()->realText(200),
            'specification' => json_encode([
                'length' => $this->faker->numberBetween(1, 3000),
                'width' => $this->faker->numberBetween(1, 3000),
                'height' => $this->faker->numberBetween(1, 3000),
                'weight' => $this->faker->numberBetween(1, 1000)
            ]),
            'main_img' => fake()->imageUrl(),
            'alt_img' => fake()->imageUrl().';'.fake()->imageUrl(),
            'price' => fake()->numberBetween(100, 1000),
            'stock' => fake()->numberBetween(0, 1000),
            'discount' => fake()->boolean(20) // 20% chance for a discount
                ? $this->faker->randomFloat(2, 0.05, 0.5) // Discount between 5% and 50%
                : 0.0,
            'rating' => fake()->randomFloat(1,3,5)
      ];
    }
}
