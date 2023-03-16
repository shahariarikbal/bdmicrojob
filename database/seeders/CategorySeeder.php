<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Facebook', 'price' => '40'],
            ['name' => 'Youtube', 'price' => '50']
        ];

        Category::insert($categories);
    }
}
