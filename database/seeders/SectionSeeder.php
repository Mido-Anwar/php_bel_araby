<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Concept;
use App\Models\Technology;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // لكل تكنولوجيا نعمل Sections
        Technology::all()->each(function ($technology) {
            Section::factory()->count(10)->create([
                'technology_id' => $technology->id,
            ]);
        });
    }
}
