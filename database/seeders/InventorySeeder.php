<?php

namespace Database\Seeders;

use App\Enums\TagType;
use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventories = Inventory::factory(10)->create();

        foreach ($inventories as $inventory) {
            $inventory->attachTag(fake()->randomElement([
                'Alat Musik',
                'Alat Tulis',
                'Kendaraan',
            ]), TagType::INVENTORY_TYPE->value);

            $inventory->attachTag(fake()->randomElement([
                'Tersedia',
                'Rusak',
            ]), TagType::INVENTORY_STATUS->value);
        }
    }
}
