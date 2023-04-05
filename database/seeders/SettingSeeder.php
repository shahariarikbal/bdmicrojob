<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            ['logo'=>'logo.png', 'phone'=>'+8801XXXXXXXXX',
            'email'=>'support@microjob.com', 'facebook'=>'https://fb.com',
            'twitter'=>'https://twitter.com', 'instagram'=>'https://www.instagram.com',
            'linkedin'=>'https://www.linkedin.com', 'address'=>'Dhaka, Mohakhali',
            'adsense_code'=>'<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1234567890123456" crossorigin="anonymous"></script>']
        ];

        Setting::insert($setting);
    }
}
