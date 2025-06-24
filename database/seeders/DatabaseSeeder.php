<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       
        Category::insert([
            ['name' => 'Home Cleaning'],
            ['name' => 'Salon at Home'],
            ['name' => 'Appliance Repair'],
        ]);
    }
}
