<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Setting\Entities\Application;

class ApplicationsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Application::create([
            'language_id' => 1,
            'currency_id' => 1,
            'title' => 'HRIS',
            'phone' => '09192024444',
            'email' => 'albenruel@gmail.com',
            'website' => 'https://www.hresource.pro',
            'address' => 'B-25, City Plaza, 4th Floor pasay, Borongan-1229, Eastern samar',
            'tax_no' => '123123',
            'rtl_ltr' => 1,
            'prefix' => 'BT',
            'footer_text' => 'HRIS Namon © 2024. All Rights Reserved.',
            'logo' => null,
            'created_at' => '2024-10-13 04:46:42',
            'updated_at' => '2024-10-14 11:10:42',
            'deleted_at' => NULL,
        ]);
    }
}
