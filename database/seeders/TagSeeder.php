<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        // Create some tags
        Tag::create(['name' => 'User Experience']);
        Tag::create(['name' => 'Machine Learning']);
        Tag::create(['name' => 'Cyber Security']);
        Tag::create(['name' => 'Web Development']);
    }
}
