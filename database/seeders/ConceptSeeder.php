<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Concept;

class ConceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::all()->each(function ($section) {
            Concept::factory()->count(10)->create([
                'section_id' => $section->id,
            ]);
        });
    }
}
