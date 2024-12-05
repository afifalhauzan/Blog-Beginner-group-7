<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a few users
        User::create([
            'name' => 'Afif',
            'email' => 'afif@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        User::create([
            'name' => 'Ucup',
            'email' => 'yusufw@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        User::create([
            'name' => 'Sasa',
            'email' => 'zahwan@gmail.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
