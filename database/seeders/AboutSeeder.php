<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $about_us = [
            ['title' => 'Who We Are', 'short_description' => 'Who we are short description...', 'long_description' => 'Who we are long description...'],
            ['title' => 'Why Do We Exist', 'short_description' => 'Why Do We Exist short description...', 'long_description' => 'Why Do We Exist long description...'],
            ['title' => 'What We Do', 'short_description' => 'What We Do short description...', 'long_description' => 'What We Do long description...'],
            ['title' => 'Mission & Vision', 'short_description' => 'Mission & Vision short description...', 'long_description' => 'Mission & Vision long description...'],
            ['title' => 'Advantages', 'short_description' => 'Advantages short description...', 'long_description' => 'Advantages long description...'],
            ['title' => 'Our Team', 'short_description' => 'Our Team short description...', 'long_description' => 'Our Team long description...'],
        ];

        AboutUs::insert($about_us);
    }
}
