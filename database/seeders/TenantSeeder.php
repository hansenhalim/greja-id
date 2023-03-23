<?php

namespace Database\Seeders;

use App\Enums\TagType;
use App\Models\ChurchLocation;
use App\Models\ChurchService;
use App\Models\Member;
use App\Models\Tag;
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

        tenancy()->runForMultiple($tenants, function () {
            Member::factory(30)->create();

            $churchLocation = ChurchLocation::factory()->create([
                'name' => 'NDC Central Park',
                'address' => 'NAFIRI CONVENTION HALL (NCH) Central Park Mall, Lt 8 (P13) Jl Letjen S Parman Kav 28 Jakarta Barat',
                'phone' => '(021) 56985388',
            ]);

            for ($i = 1; $i <= 6; $i++) {
                $churchService = ChurchService::factory()
                    ->for($churchLocation)
                    ->create(['name' => "Ibadah NCH $i"]);

                $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);
            }

            $churchLocation = ChurchLocation::factory()->create([
                'name' => 'NDC Living World',
                'address' => 'NAFIRI LIVING WORLD HALL (NLWH) Living World Mall Lt.2 Alam Sutera Boulevard Kav 21 Alam Sutera - Tangerang ',
                'phone' => '(021) 53128557',
            ]);

            for ($i = 1; $i <= 4; $i++) {
                $churchService = ChurchService::factory()
                    ->for($churchLocation)
                    ->create(['name' => "Ibadah NLW $i"]);

                $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);
            }

            $churchLocation = ChurchLocation::factory()->create([
                'name' => 'NDC Baywalk',
                'address' => 'NAFIRI BAY BALLROOM (NBB) Baywalk Mall, Lt 11 (Green Bay Pluit) Jl Pluit Karang Ayu B1 Utara Jakarta Utara',
                'phone' => '(021) 29839077',
            ]);

            for ($i = 1; $i <= 2; $i++) {
                $churchService = ChurchService::factory()
                    ->for($churchLocation)
                    ->create(['name' => "Ibadah NBB $i"]);

                $churchService->attachTag('Ibadah Minggu', TagType::CHURCH_SERVICE->value);
            }

            Tag::findOrCreate('Ibadah Anak', TagType::CHURCH_SERVICE->value);

            Tag::findOrCreate('Tunai', TagType::PAYMENT_METHOD->value);
            Tag::findOrCreate('Credit / Debit', TagType::PAYMENT_METHOD->value);
            Tag::findOrCreate('QRIS', TagType::PAYMENT_METHOD->value);

            Tag::findOrCreate('Persembahan', TagType::TITHE_TYPE->value);
            Tag::findOrCreate('Persepuluhan', TagType::TITHE_TYPE->value);

            Tag::findOrCreate('Alat Musik', TagType::INVENTORY_TYPE->value);

            Tag::findOrCreate('Rusak', TagType::INVENTORY_STATUS->value);
            Tag::findOrCreate('Tersedia', TagType::INVENTORY_STATUS->value);

            Tag::findOrCreate('Volunteer', TagType::FORM_TYPE->value);
            Tag::findOrCreate('Baptism', TagType::FORM_TYPE->value);
            Tag::findOrCreate('Child Dedication', TagType::FORM_TYPE->value);
        });
    }
}
