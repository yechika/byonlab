<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@biondi.com',
        ]);

        // Create sample articles
        \App\Models\Article::factory(12)->create();
        
    // Seed sponsors
    $this->call(\Database\Seeders\SponsorSeeder::class);
    }
}
