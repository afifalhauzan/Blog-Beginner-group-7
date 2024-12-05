<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Create some categories
        Category::create(['name' => 'Technology']);
        Category::create(['name' => 'Lifestyle']);
        Category::create(['name' => 'Health']);
        Category::create(['name' => 'Education']);
    }
}

