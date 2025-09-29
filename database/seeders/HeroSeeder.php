<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroes = [
            [
                'title' => 'Distributor Resmi Thermo Fisher Scientific',
                'image_url' => 'high-angle-blue-chemical-substances-arrangement.jpg',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Solusi Laboratorium Modern',
                'image_url' => 'researcher-working-laboratory.jpg',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Inovasi Teknologi Analitik',
                'image_url' => 'scientist-working-lab-side-view.jpg',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($heroes as $hero) {
            Hero::create($hero);
        }
    }
}