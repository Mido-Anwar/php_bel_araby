<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'file_path'  => 'uploads/' . $this->faker->uuid() . '.webp',
            'file_name'  => $this->faker->word() . '.webp',
            'alt_text'   => $this->faker->sentence(),
            'mime_type'  => 'image/webp',
            'file_size'  => $this->faker->numberBetween(10000, 500000),
        ];
    }
}
