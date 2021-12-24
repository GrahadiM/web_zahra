<?php 

namespace App\Helper;

use App\Models\SettingWebsite;

class SettingHelper
{
    public static function getSetting()
    {
        $settings = SettingWebsite::get()->first();
        return $settings;
    }

}