<?php

namespace Database\Factories;

use App\Models\ChurchService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tithe>
 */
class TitheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'church_service_id' => ChurchService::factory(),
            'amount' => fake()->numberBetween(0, 10000000),
        ];
    }
}
