<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BuiltInFunction;

class BuiltInFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Technology::all()->each(function ($technology) {
            BuiltInFunction::factory()->count(10)->create([
                'technology_id' => $technology->id,
            ]);
        });
    }
}
