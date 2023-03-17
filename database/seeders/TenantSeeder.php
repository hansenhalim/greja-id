<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 2; $i++) {
            $tenants[] = \App\Models\Tenant::factory()->create([
                'email' => 't'.$i.'@example.com',
                'name' => 'Tenant '.$i,
                'company' => 'Tenant '.$i,
            ]);

            $tenants[$i]->domains()->create([
                'domain' => 't'.$i,
                'is_primary' => true,
                'is_fallback' => true,
            ]);
        }

        tenancy()->runForMultiple($tenants, fn () => \App\Models\Member::factory(30)->create());
    }
}
