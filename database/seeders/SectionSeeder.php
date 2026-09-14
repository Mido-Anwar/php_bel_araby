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
        $php = Technology::where('slug', 'php')->first();

        if (!$php) {
            return;
        }

        $sections = [
            [
                'technology_id' => $php->id,
                'title'         => 'Basics & Syntax',
                'slug'          => 'php-basics-and-syntax',
                'description'   => 'Core PHP fundamentals including data types, variables, and control structures.',
            ],
            [
                'technology_id' => $php->id,
                'title'         => 'Object-Oriented Programming (OOP)',
                'slug'          => 'php-object-oriented-programming',
                'description'   => 'Classes, objects, inheritance, interfaces, and design principles in PHP.',
            ],
            [
                'technology_id' => $php->id,
                'title'         => 'Array Manipulation',
                'slug'          => 'php-array-manipulation',
                'description'   => 'Handling arrays, built-in functions, and iteration methods.',
            ],
        ];

        foreach ($sections as $section) {
            Section::updateOrCreate(['slug' => $section['slug']], $section);
        }
    }
}
