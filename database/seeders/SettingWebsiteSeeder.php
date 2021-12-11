<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SettingWebsite::truncate();
        $user = [
            [
                'id' => '1',
                'logo' => '',
                'favicon' => '',
                'app_name' => 'PT Hana Patria Sejati',
                'footer_name' => 'PT Hana Patria Sejati',
            ],
        ];
        
        foreach ($user as $key => $value) {
           \App\Models\SettingWebsite::create($value);
        }
    }
}
