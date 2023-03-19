<?php

namespace Database\Factories;

use App\Models\ChurchLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChurchService>
 */
class ChurchServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'church_location_id' => ChurchLocation::factory(),
            'name' => fake()->city(),
            'description' => fake()->paragraph(),
            'started_at' => now()->subHours(2),
            'ended_at' => now(),
        ];
    }
}
