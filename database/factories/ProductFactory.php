<?php

namespace Database\Factories;

use App\Models\Category;
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
            'name'=> json_encode([
                'en'=>fake()->name(),
                'ar'=>fake()->name(),
            ],JSON_UNESCAPED_UNICODE),
            'content'=>fake()->paragraph(3,true),
            'image'=>fake()->imageUrl(),
            'salary'=>fake()->randomFloat(2,10,100),
            'sale_price'=>fake()->optional()->randomFloat(2,5,50),
            'quantity' => fake()->numberBetween(1, 100),
        ];
    }
}
