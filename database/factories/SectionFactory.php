<?php

namespace Database\Factories;

use App\Models\Technology;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => rand(1, 4),
            'title' => $this->faker->words(3, true),  // عنوان قصير
            'content' => $this->faker->text(150),     // نص عشوائي بطول ~150 حرف
            'technology_id' => null,  //
        ];
    }
}
