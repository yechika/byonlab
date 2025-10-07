<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample partners using existing logos
        Sponsor::create([
            'image_url' => 'logo_biondi.png',
            'alt' => 'Biondi Partner',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Sponsor::create([
            'image_url' => 'logo_byonlab.png',
            'alt' => 'Byonlab Partner',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Sponsor::create([
            'image_url' => 'inaproc.png',
            'alt' => 'Inaproc Partner',
            'is_active' => true,
            'sort_order' => 3,
        ]);
    }
}
