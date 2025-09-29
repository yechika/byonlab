<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'title' => 'Hero Image 1',
            'image_url' => 'heroes/hero1.jpg',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Hero::create([
            'title' => 'Hero Image 2',
            'image_url' => 'heroes/hero2.jpg',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Hero::create([
            'title' => 'Hero Image 3',
            'image_url' => 'heroes/hero3.jpg',
            'is_active' => true,
            'sort_order' => 3,
        ]);
    }
}