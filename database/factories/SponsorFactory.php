<?php

namespace Database\Factories;

use App\Models\Sponsor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sponsor>
 */
class SponsorFactory extends Factory
{
    protected $model = Sponsor::class;

    public function definition()
    {
        return [
            'image_url' => 'sponsors/' . $this->faker->image('public/storage/sponsors', 200, 80, null, false),
            'alt' => $this->faker->company(),
            'is_active' => true,
            'sort_order' => 0,
        ];
    }
}
