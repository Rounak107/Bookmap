<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('services')->insert([
    [
        'name' => 'Air Conditioner',
        'icon' => 'ac.jpg',
        'description' => 'Air Conditioner installation, maintenance and repair.',
        'price' => 500
    ],
    [
        'name' => 'Washing Machine',
        'icon' => 'washing_machine.jpeg',
        'description' => 'Get your washing machine serviced or repaired quickly.',
        'price' => 400
    ],
    [
        'name' => 'Air Cooler Services',
        'icon' => 'cooler.jpg',
        'description' => 'Cooling solutions for summer at your doorstep.',
        'price' => 300
    ],
    [
        'name' => 'Geyser Services',
        'icon' => 'geyser.jpg',
        'description' => 'Installation and repair of all types of geysers.',
        'price' => 350
    ],
    [
        'name' => 'Inverter & Stabilizer',
        'icon' => 'inverter.jpg',
        'description' => 'Keep your electronics safe and powered with our services.',
        'price' => 450
    ],
    [
        'name' => 'Television',
        'icon' => 'television.jfif',
        'description' => 'Smart TV wall mount, configuration and repair.',
        'price' => 550
    ],
    [
        'name' => 'Laptop',
        'icon' => 'laptop.jfif',
        'description' => 'Laptop formatting, hardware and software repairs.',
        'price' => 600
    ],
    [
        'name' => 'Desktop',
        'icon' => 'desktop.jfif',
        'description' => 'Computer upgrades, antivirus, and troubleshooting.',
        'price' => 500
    ]
]);




    \App\Models\Service::create([
        
    ]);
}
}
