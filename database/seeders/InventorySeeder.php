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
            $inventory->attachTag('Alat Musik', TagType::INVENTORY_TYPE->value);
            $inventory->attachTag('Tersedia', TagType::INVENTORY_STATUS->value);
        }
    }
}
