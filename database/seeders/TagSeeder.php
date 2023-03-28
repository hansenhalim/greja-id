<?php

namespace Database\Seeders;

use App\Enums\TagType;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::findOrCreate('Ibadah Minggu', TagType::CHURCH_SERVICE->value);
        Tag::findOrCreate('Ibadah Anak', TagType::CHURCH_SERVICE->value);

        Tag::findOrCreate('Tunai', TagType::PAYMENT_METHOD->value);
        Tag::findOrCreate('Credit / Debit', TagType::PAYMENT_METHOD->value);
        Tag::findOrCreate('QRIS', TagType::PAYMENT_METHOD->value);

        Tag::findOrCreate('Persembahan', TagType::TITHE_TYPE->value);
        Tag::findOrCreate('Persepuluhan', TagType::TITHE_TYPE->value);

        Tag::findOrCreate('Alat Musik', TagType::INVENTORY_TYPE->value);
        Tag::findOrCreate('Alat Tulis', TagType::INVENTORY_TYPE->value);
        Tag::findOrCreate('Kendaraan', TagType::INVENTORY_TYPE->value);

        Tag::findOrCreate('Rusak', TagType::INVENTORY_STATUS->value);
        Tag::findOrCreate('Tersedia', TagType::INVENTORY_STATUS->value);

        Tag::findOrCreate('Volunteer', TagType::FORM_TYPE->value);
        Tag::findOrCreate('Baptism', TagType::FORM_TYPE->value);
        Tag::findOrCreate('Child Dedication', TagType::FORM_TYPE->value);

        Tag::findOrCreate('REVIVE', TagType::FEED_TYPE->value);
        Tag::findOrCreate('Bulletin', TagType::FEED_TYPE->value);
        Tag::findOrCreate('Devotion', TagType::FEED_TYPE->value);

        Tag::findOrCreate('Iman', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kasih', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Pengharapan', TagType::FEED_TAGS->value);
    }
}
