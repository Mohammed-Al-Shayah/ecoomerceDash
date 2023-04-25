<?php

namespace Database\Factories;

use App\Models\Category;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
        'image' => fake()->imageUrl(),
        'parent_id' =>1,
        ];
    }
}
