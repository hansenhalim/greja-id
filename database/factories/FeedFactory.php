<?php

namespace Database\Factories;

use App\Enums\FeedStatus;
use App\Enums\VideoSource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feed>
 */
class FeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = [
            "time" => 1679888080762,
            "blocks" => [
                [
                    "id" => "PVFqs8qp1v",
                    "data" => ["text" => fake()->sentence(3), "level" => 2],
                    "type" => "header",
                ],
                [
                    "id" => "M4C7lVC_rO",
                    "data" => [
                        "text" => fake()->paragraph(5),
                    ],
                    "type" => "paragraph",
                ],
                [
                    "id" => "X1-v2mtl24",
                    "data" => [
                        "text" => fake()->paragraph(5),
                    ],
                    "type" => "paragraph",
                ],
                [
                    "id" => "uFPdMApJW5",
                    "data" => [
                        "text" => fake()->paragraph(5),
                    ],
                    "type" => "paragraph",
                ],
                [
                    "id" => "5lobXaweWI",
                    "data" => [
                        "text" => fake()->paragraph(5),
                    ],
                    "type" => "paragraph",
                ],
            ],
            "version" => "2.25.0",
        ];

        return [
            'description' => fake()->paragraph(),
            'title' => fake()->catchPhrase(),
            'content' => $content,
            'status' => fake()->randomElement(array_column(FeedStatus::cases(), 'value')),
            'video_source' => VideoSource::YOUTUBE->value,
            'youtube_video_id' => 'XqZsoesa55w',
        ];
    }
}
