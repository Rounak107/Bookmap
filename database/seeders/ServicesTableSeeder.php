<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
    \App\Models\Service::create([
        'name' => 'Plumbing',
        'description' => 'Professional plumbing services',
        'price' => 500.00,
        'image' => 'images/plumbing.jpg',
    ]);

    \App\Models\Service::create([
        'name' => 'Cleaning',
        'description' => 'Home cleaning services',
        'price' => 300.00,
        'image' => 'images/cleaning.jpg',
    ]);
}
}
