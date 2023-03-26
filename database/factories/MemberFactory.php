<?php

namespace Database\Factories;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
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
            'gender' => fake()->randomElement(array_column(Gender::cases(), 'value')),
            'phone' => fake()->unique()->e164PhoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'description' => fake()->paragraph(),
            'joined_at' => fake()->dateTimeThisMonth(),
            'active' => fake()->boolean(),
            'created_at' => fake()->dateTimeThisYear(),
        ];
    }
}
