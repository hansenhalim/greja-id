<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            AdminSeeder::class,
            TenantSeeder::class,
        ]);

        \App\Models\Tenant::first()
            ->run(fn () => $this->call([
                TagSeeder::class,
                MemberSeeder::class,
                ChurchServiceSeeder::class,
                InventorySeeder::class,
                FormSeeder::class,
                FeedSeeder::class,
            ]));
    }
}
