<?php

namespace Database\Seeders;

use App\Enums\TagType;
use App\Models\Feed;
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

            $feed->attachTags(fake()->randomElements([
                'Iman',
                'Harapan',
                'Kasih',
                'Hikmat',
                'Doa',
                'Kemenangan',
                'Pertumbuhan Rohani',
                'Pemulihan Diri',
                'Sukacita',
                'Damai',
                'Kepemimpinan',
                'Rasa Syukur',
                'Perbuatan Baik',
                'Bersaksi',
                'Pelayanan',
                'Pergaulan',
                'Keluarga',
                'Pengampunan',
                'Rendah Hati',
                'Integritas',
                'Sabar',
                'Menghormati',
                'Ketekunan',
                'Godaan',
                'Penderitaan',
                'Kecanduan',
                'Kesombongan',
                'Ketakutan',
                'Depresi',
                'Kekhawatiran',
                'Keraguan',
                'Ketamakan',
                'Kemalasan',
                'Kemarahan',
                'Teologi',
                'Okultisme',
                'Roh Kudus',
                'Tujuan',
                'Anugerah',
                'Kekudusan',
                'Penginjilan',
                'Dosa',
            ], fake()->numberBetween(1, 3)), TagType::FEED_TAGS->value);
        }
    }
}
