<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'code' => fake()->bothify('??###'),
            'specification' => fake()->bs(),
            'price' => fake()->numberBetween(10000, 1000000),
            'additional_note' => fake()->paragraph(),
            'active' => fake()->boolean(),
            'inbound_at' => now()->subMonth(),
        ];
    }
}
