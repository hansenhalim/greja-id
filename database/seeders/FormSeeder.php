<?php

namespace Database\Seeders;

use App\Enums\TagType;
use App\Models\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forms = Form::factory(10)->create();

        foreach ($forms as $form) {
            $form->attachTag(fake()->randomElement([
                'Volunteer',
                'Baptism',
                'Child Dedication',
            ]), TagType::FORM_TYPE->value);
        }
    }
}
