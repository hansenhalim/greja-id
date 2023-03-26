<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Form>
 */
class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => fake()->randomElement(Member::pluck('id')),
            'content' => ['title' => fake()->catchPhrase(), 'body' => fake()->paragraph()],
            'active' => fake()->boolean(),
            'verified_at' => now(),
        ];
    }
}
