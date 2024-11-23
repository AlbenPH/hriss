<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\HumanResource\Entities\Gender;
use Illuminate\Support\Str;

class GenderSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            'Male',
            'Female',
            'Transgender',
        ];

        foreach ($genders as $gender) {
            Gender::create([
                'uuid' => (string) Str::uuid(),
                'gender_name' => $gender,
                'is_active' => 1
            ]);
        }
    }
}