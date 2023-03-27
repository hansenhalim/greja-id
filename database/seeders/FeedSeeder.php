<?php

namespace Database\Seeders;

use App\Enums\TagType;
use App\Models\Feed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feeds = Feed::factory(10)->create();

        foreach ($feeds as $feed) {
            $feed->attachTag(fake()->randomElement([
                'REVIVE',
                'Bulletin',
                'Devotion',
            ]), TagType::FEED_TYPE->value);
        }
    }
}
