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
        Category::create(['name' => 'AI']);
        Category::create(['name' => 'AR/VR']);
        Category::create(['name' => 'Devices']);
        Category::create(['name' => 'Gaming']);
        Category::create(['name' => 'General']);
    }
}

