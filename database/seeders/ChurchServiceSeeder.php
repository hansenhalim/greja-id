<?php

namespace Database\Seeders;

use App\Enums\TagType;
use App\Models\ChurchLocation;
use App\Models\ChurchService;
use Illuminate\Database\Seeder;

class ChurchServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
