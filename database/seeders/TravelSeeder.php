<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alam = \App\Models\Category::create(['name' => 'Alam', 'icon' => '🌲']);
        $budaya = \App\Models\Category::create(['name' => 'Budaya', 'icon' => '🏛️']);
        $rekreasi = \App\Models\Category::create(['name' => 'Rekreasi', 'icon' => '🎡']);

        $bromo = \App\Models\Destination::create([
            'category_id' => $alam->id,
            'name' => 'Gunung Bromo',
            'city' => 'Probolinggo',
            'description' => 'Gunung berapi aktif paling terkenal di Jawa Timur dengan pemandangan sunrise yang spektakuler.',
            'price' => 35000,
            'rating' => 4.8,
            'is_active' => true,
        ]);

        $jatimpark = \App\Models\Destination::create([
            'category_id' => $rekreasi->id,
            'name' => 'Jatim Park 1',
            'city' => 'Batu',
            'description' => 'Taman bermain dan edukasi terbesar di Kota Batu.',
            'price' => 100000,
            'rating' => 4.5,
            'is_active' => true,
        ]);

        \App\Models\Facility::create(['destination_id' => $bromo->id, 'name' => 'Area Parkir Jeep']);
        \App\Models\Facility::create(['destination_id' => $bromo->id, 'name' => 'Toilet Umum']);
        \App\Models\Facility::create(['destination_id' => $jatimpark->id, 'name' => 'Food Court']);
        \App\Models\Facility::create(['destination_id' => $jatimpark->id, 'name' => 'Mushola']);
    }
}
