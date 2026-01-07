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
        // لازم يكون عندنا Users عشان posts ترتبط بيهم
        $user = User::first() ?? User::factory()->create();

        // توليد 10 بوستات تجريبية
        for ($i = 1; $i <= 20; $i++) {
            Post::create([
                'title'        => "Demo Post $i",
                'content'      => Str::random(200), // نص عشوائي
                'image'        => "posts/sample$i.jpg", // مسار صورة تجريبية
                'user_id'      => $user->id,
                'is_published' => (bool)rand(0, 1), // عشوائي Published or Draft
            ]);
        }
    }
}
