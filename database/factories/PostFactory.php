<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
      */
    public function definition(): array
    {
      $title = fake()->sentence(6);

        return [
            'title'        => $title,
            'content'      => fake()->paragraphs(4, true),
            'is_published' => fake()->boolean(80), // 80% منشور و 20% مسودة
            'user_id'      => User::inRandomOrder()->value('id') ?? User::factory(),
            'created_at'   => fake()->dateTimeBetween('-6 months', 'now'),
            'updated_at'   => now(),
        ];
    }
}
