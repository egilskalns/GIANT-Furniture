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
        $images = [
            'https://st3.depositphotos.com/20363444/32489/i/450/depositphotos_324894012-stock-photo-comfortable-grey-modern-armchair-blanket.jpg',
            'https://st4.depositphotos.com/38013370/39992/i/450/depositphotos_399921568-stock-photo-modern-comfortable-furniture-white-background.jpg',
            'https://media.istockphoto.com/id/869078270/photo/armchair-isolated-on-white-background-3d-rendering.jpg?s=612x612&w=0&k=20&c=BSBGae3sdyCHLH911Iv3mplZFoCbjq22ryBMqGpC5Rk=',
            'https://st4.depositphotos.com/38013370/41049/i/450/depositphotos_410496136-stock-photo-modern-comfortable-furniture-white-background.jpg',
            'https://static.vecteezy.com/system/resources/previews/029/837/971/non_2x/modern-single-sofa-on-isolated-white-background-ai-generative-photo.jpg'
        ];

        return [
            'category_id' => fake()->numberBetween(8, 35),
            'name' => fake()->text(24),
            'sku' => fake()->unique()->regexify('[A-Z0-9]{8}'),
            'description' => fake()->realText(200),
            'specification' => json_encode([
                'length' => $this->faker->numberBetween(1, 3000),
                'width' => $this->faker->numberBetween(1, 3000),
                'height' => $this->faker->numberBetween(1, 3000),
                'weight' => $this->faker->numberBetween(1, 1000)
            ]),
            'color' => fake()->hexColor(),
            'main_img' => $images[fake()->numberBetween(0,4)],
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
