<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 1; $i++) {
            $tenants[] = Tenant::factory()->create([
                'email' => "t$i@example.com",
                'name' => "Tenant $i",
                'company' => "Tenant $i",
            ]);

            $tenants[$i]->domains()->create([
                'domain' => "t$i",
                'is_primary' => true,
                'is_fallback' => true,
            ]);
        }
    }
}
