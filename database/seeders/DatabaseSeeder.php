<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement("DELETE FROM admins");
        DB::table('admins')->insert([
                'name' => 'Admin',
                'email' => 'admin@globalearnmoney.com',
                'password' => bcrypt('11'),
        ]);
        DB::statement("DELETE FROM users");
        DB::table('users')->insert([
                'name' => 'User',
                'email' => 'theahmedsabbir@gmail.com',
                'phone' => '0143435435435',
                'password' => Hash::make('11111111'),
                'avatar' => 'default.jpg',
                'refer_code' => 'USER101',
        ]);
        DB::statement("DELETE FROM videos");
        DB::statement("DELETE FROM user_videos");
        for($i=1; $i<=8; $i++){
            DB::table('videos')->insert([
                    'title' => 'Video Title ' . $i,
                    'video_link' => 'zbWIerzCXic',
            ]);
        }
        DB::statement("DELETE FROM memberships");
        DB::table('memberships')->insert([
                'name' => 'Silver',
                'facilities' => '["Quis exercitation cu","Sint quas necessitat","Porro dolor consecte","Laborum Exercitatio","Provident atque iru","Ratione odio soluta"]',
                'per_month_charge' => 200,
                'per_video_cost' => 2.00,
        ]);
        DB::table('memberships')->insert([
                'name' => 'Gold',
                'facilities' => '["Quis exercitation cu","Sint quas necessitat","Porro dolor consecte","Laborum Exercitatio","Provident atque iru","Ratione odio soluta"]',
                'per_month_charge' => 400,
                'per_video_cost' => 4.00,
        ]);
        DB::table('memberships')->insert([
                'name' => 'Gold-Plus',
                'facilities' => '["Quis exercitation cu","Sint quas necessitat","Porro dolor consecte","Laborum Exercitatio","Provident atque iru","Ratione odio soluta"]',
                'per_month_charge' => 600,
                'per_video_cost' => 6.00,
        ]);
        DB::table('memberships')->insert([
                'name' => 'Platinum',
                'facilities' => '["Quis exercitation cu","Sint quas necessitat","Porro dolor consecte","Laborum Exercitatio","Provident atque iru","Ratione odio soluta"]',
                'per_month_charge' => 800,
                'per_video_cost' => 8.00,
        ]);
    }
}
