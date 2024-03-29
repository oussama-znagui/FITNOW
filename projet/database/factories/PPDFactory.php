<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PPD>
 */
class PPDFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'weight' => fake()->numberBetween(40,200),
            'size' => fake()->numberBetween(1,2),
            'user_id' => 1,
         
        ];
    }
}
