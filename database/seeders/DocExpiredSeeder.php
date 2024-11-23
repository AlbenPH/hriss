<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\DocExpiredSetting;
use Illuminate\Support\Str;

class DocExpiredSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DocExpiredSetting::create([
            'primary_expiration_alert' => 1,
            'secondary_expiration_alert' => 1
        ]);
    }
}