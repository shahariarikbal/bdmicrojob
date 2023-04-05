<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomePage;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homePage = [
            ['slider_title' => 'Get Easy Earning With Lots Of Earning Sources', 'slider_image' => 'slider.png',
            'first_image_title' => 'Get Extra Earning Easy And Secured',
            'first_image_description' => 'First Image Description',
            'first_image' => 'first_image.png', 'second_image_title' => 'Awesome Features With Amazing Bonuses',
            'second_image_description' => 'Too Easy To Use Anytime Anywhere Around
            Amazing Interface For Beginners And Ametures
            Extraa Income Anytime Anywhere
            Watch Videos And Get Rewards Instantly
            Share Links And Get Bonus
            Get Instantly Paid Via Bank Or E-wallet', 'second_image' => 'second_image.png',
            'how_works_title' => 'How BD Micro Jobs Works ? And How You Can Get Paid ?',
            'how_works_description' => 'How it works description',
            'footer_image' => 'footer_image.png', 'footer_title' => 'Sign Up Now & Get Busy With Lots Of Earning Sources',
            'footer_description' => 'Footer description']
        ];

        HomePage::insert($homePage);
    }
}
