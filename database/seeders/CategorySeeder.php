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
            ['name' => 'Facebook', 'price' => '40', 'worker_earning' => '3.50'],
            ['name' => 'Youtube', 'price' => '50', 'worker_earning' => '4.00']
        ];

        Category::insert($categories);
    }
}
