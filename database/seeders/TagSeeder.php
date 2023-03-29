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
        Tag::findOrCreate('Harapan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kasih', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Hikmat', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Doa', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kemenangan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Pertumbuhan Rohani', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Pemulihan Diri', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Sukacita', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Damai', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kepemimpinan', TagType::FEED_TAGS->value);

        Tag::findOrCreate('Rasa Syukur', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Perbuatan Baik', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Bersaksi', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Pelayanan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Pergaulan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Keluarga', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Pengampunan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Rendah Hati', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Integritas', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Sabar', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Menghormati', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Ketekunan', TagType::FEED_TAGS->value);

        Tag::findOrCreate('Godaan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Penderitaan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kecanduan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kesombongan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Ketakutan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Depresi', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kekhawatiran', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Keraguan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Ketamakan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kemalasan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kemarahan', TagType::FEED_TAGS->value);

        Tag::findOrCreate('Teologi', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Okultisme', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Roh Kudus', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Tujuan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Anugerah', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Kekudusan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Penginjilan', TagType::FEED_TAGS->value);
        Tag::findOrCreate('Dosa', TagType::FEED_TAGS->value);
    }
}
