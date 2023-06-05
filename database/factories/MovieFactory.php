<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $classification = \App\Models\Classification::factory()->create();
        
        return [
            'name' => fake()->name(),
            'year' => fake()->numberBetween(1900, 2023),
            'duration' => fake()->numberBetween(40, 9999),
            'rating' => fake()->numberBetween(1, 5),
            'cover' => fake()->imageUrl(640, 480, 'movie', true),
            'trailer' => 'https://youtu.be/hesv-etwK_o', // YouTube viedo: Dolby Presents: "Universe" | Trailer | Dolby
            'synopsis' => fake()->paragraph(),
            'classification_id' => $classification->id,
        ];
    }
}
