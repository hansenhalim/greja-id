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
        $admin = \App\Models\Admin::factory()->create([
            'name' => 'Hansen Halim',
            'email' => 'fpsecond.hh@gmail.com',
        ]);

        $superAdminRole = \Spatie\Permission\Models\Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);
        $admin->assignRole($superAdminRole);

        $tenants[] = \App\Models\Tenant::factory()->create([
            'email' => 't1@example.com',
            'name' => 'Tenant 1',
            'company' => 'Tenant 1',
        ]);

        $tenants[] = \App\Models\Tenant::factory()->create([
            'email' => 't2@example.com',
            'name' => 'Tenant 2',
            'company' => 'Tenant 2',
        ]);

        $tenants[0]->domains()->create([
            'domain' => 't1',
            'is_primary' => true,
            'is_fallback' => true,
        ]);

        $tenants[1]->domains()->create([
            'domain' => 't2',
            'is_primary' => true,
            'is_fallback' => true,
        ]);

        tenancy()->initialize($tenants[0]);
        \App\Models\Member::factory(5)->create();
        tenancy()->initialize($tenants[1]);
        \App\Models\Member::factory(5)->create();
    }
}
