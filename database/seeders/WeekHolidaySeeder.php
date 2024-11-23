<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\HumanResource\Entities\Gender;
use Illuminate\Support\Str;
use Modules\HumanResource\Entities\WeekHoliday;

class WeekHolidaySeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $week_holidays = [
            ['dayname' => 'saturday,sunday'],
            
        ];
        
        foreach ($week_holidays as $week_holiday) {
            WeekHoliday::create([
                'dayname' => $week_holiday['dayname'],
                'uuid' => (string) Str::uuid(),
            ]);
        }
    }
}