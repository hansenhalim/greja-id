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
        \App\Models\Admin::factory()->create([
            'name' => 'Hansen Halim',
            'email' => 'fpsecond.hh@gmail.com',
        ]);

        $tenant = \App\Models\Tenant::factory()->create([
            'email' => 't1@example.com',
            'name' => 'Tenant 1',
            'company' => 'Tenant 1',
        ]);

        $tenant->domains()->create([
            'domain' => 't1',
            'is_primary' => true,
            'is_fallback' => true,
        ]);

        $tenant = \App\Models\Tenant::factory()->create([
            'email' => 't2@example.com',
            'name' => 'Tenant 2',
            'company' => 'Tenant 2',
        ]);

        $tenant->domains()->create([
            'domain' => 't2',
            'is_primary' => true,
            'is_fallback' => true,
        ]);
    }
}
