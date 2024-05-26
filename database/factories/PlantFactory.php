<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plant>
 */
class PlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => fake()->unique()->sentence(),
            'price' => fake()->randomDigit,
            'imageUrl' => $this->faker->imageUrl(250, 150, 'plants', true, 'type'),
        ];
    }
}
