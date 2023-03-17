<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::factory()->create([
            'name' => 'Hansen Halim',
            'email' => 'fpsecond.hh@gmail.com',
        ])->assignRole(\App\Enums\Role::SUPER_ADMIN->value);
    }
}
