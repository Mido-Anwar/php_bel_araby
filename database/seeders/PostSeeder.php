<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post, App\Models\User, Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(10)->create([
            'title'        => fake()->sentence(6),
            'content'      => fake()->paragraphs(4, true),
            'is_published' => fake()->boolean(80), // 80% منشور و 20% مسودة
            'user_id'      => User::query()->inRandomOrder()->value('id') ?? User::factory()->create()->id,
            'created_at'   => fake()->dateTimeBetween('-6 months', 'now'),
            'updated_at'   => now(),
        ]);
    }
}
