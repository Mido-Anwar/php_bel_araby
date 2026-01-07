<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BuiltInFunction>
 */
class BuiltInFunctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'tag_name' => $this->faker->word(),
            'description' => $this->faker->sentence(12),
            'technology_id' => \App\Models\Technology::factory(),
        ];
    }
}
