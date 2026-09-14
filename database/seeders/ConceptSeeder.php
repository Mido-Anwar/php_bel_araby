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
        $basics  = Section::where('slug', 'php-basics-and-syntax')->first();
        $oop     = Section::where('slug', 'php-object-oriented-programming')->first();
        $arrays  = Section::where('slug', 'php-array-manipulation')->first();

        $concepts = [
            // --- Section: Basics ---
            [
                'section_id'  => $basics?->id,
                'title'       => 'Type Juggling & Strict Types',
                'slug'        => 'type-juggling-and-strict-types',
                'type'        => 'concept',
                'syntax'      => null,
                'return_type' => null,
                'description' => 'PHP is a dynamically typed language. Type juggling occurs when a value is converted automatically to another type depending on context. Enabling declare(strict_types=1) forces strict type checking.',
            ],

            // --- Section: OOP ---
            [
                'section_id'  => $oop?->id,
                'title'       => 'Inheritance & Polymorphism',
                'slug'        => 'inheritance-and-polymorphism',
                'type'        => 'concept',
                'syntax'      => null,
                'return_type' => null,
                'description' => 'Inheritance allows a class to inherit properties and methods from a parent class using the extends keyword. Polymorphism allows objects of different classes to be treated as objects of a common superclass.',
            ],

            // --- Section: Array Functions (Built-in Functions) ---
            [
                'section_id'  => $arrays?->id,
                'title'       => 'array_map',
                'slug'        => 'array-map',
                'type'        => 'function',
                'syntax'      => 'array_map(?callable $callback, array $array, array ...$arrays): array',
                'return_type' => 'array',
                'description' => 'Applies the callback function to the elements of the given arrays and returns an array containing all the modified elements.',
            ],
            [
                'section_id'  => $arrays?->id,
                'title'       => 'array_filter',
                'slug'        => 'array-filter',
                'type'        => 'function',
                'syntax'      => 'array_filter(array $array, ?callable $callback = null, int $mode = 0): array',
                'return_type' => 'array',
                'description' => 'Filters elements of an array using a callback function, passing only values where the callback returns true.',
            ],
            [
                'section_id'  => $arrays?->id,
                'title'       => 'array_reduce',
                'slug'        => 'array-reduce',
                'type'        => 'function',
                'syntax'      => 'array_reduce(array $array, callable $callback, mixed $initial = null): mixed',
                'return_type' => 'mixed',
                'description' => 'Iteratively reduces the array to a single value using a callback function.',
            ],
        ];

        foreach ($concepts as $concept) {
            if ($concept['section_id']) {
                Concept::updateOrCreate(['slug' => $concept['slug']], $concept);
            }
        }
    }
}
