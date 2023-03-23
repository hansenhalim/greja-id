<?php

namespace Database\Seeders;

use App\Enums\TagType;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 1; $i++) {
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

        tenancy()->runForMultiple($tenants, function () {
            \App\Models\Member::factory(30)->create();

            $churchLocation = \App\Models\ChurchLocation::factory()->create([
                'name' => 'NDC Central Park',
                'address' => 'NAFIRI CONVENTION HALL (NCH) Central Park Mall, Lt 8 (P13) Jl Letjen S Parman Kav 28 Jakarta Barat',
                'phone' => '(021) 56985388',
            ]);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NCH 1']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NCH 2']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NCH 3']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NCH 4']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NCH 5']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NCH 6']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchLocation = \App\Models\ChurchLocation::factory()->create([
                'name' => 'NDC Living World',
                'address' => 'NAFIRI LIVING WORLD HALL (NLWH) Living World Mall Lt.2 Alam Sutera Boulevard Kav 21 Alam Sutera - Tangerang ',
                'phone' => '(021) 53128557',
            ]);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NLW 1']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NLW 2']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NLW 3']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NLW 4']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchLocation = \App\Models\ChurchLocation::factory()->create([
                'name' => 'NDC Baywalk',
                'address' => 'NAFIRI BAY BALLROOM (NBB) Baywalk Mall, Lt 11 (Green Bay Pluit) Jl Pluit Karang Ayu B1 Utara Jakarta Utara',
                'phone' => '(021) 29839077',
            ]);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NBB 1']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);

            $churchService = \App\Models\ChurchService::factory()
                ->for($churchLocation)
                ->create(['name' => 'Ibadah NBB 2']);

            $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);
        });
    }
}
