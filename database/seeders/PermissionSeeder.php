<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (\App\Enums\Role::cases() as $role) {
            \Spatie\Permission\Models\Role::create([
                'guard_name' => 'admin',
                'name' => $role->value,
            ]);
        }

        foreach (\App\Enums\Permission::cases() as $permission) {
            \Spatie\Permission\Models\Permission::create([
                'guard_name' => 'admin',
                'name' => $permission->value,
            ]);
        }
    }
}
