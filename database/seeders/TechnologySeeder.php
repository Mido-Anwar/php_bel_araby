<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
        $technologies = [
            [
                'name'        => 'PHP',
                'slug'        => 'php',
                'description' => 'A popular general-purpose scripting language that is especially suited to web development.',
            ],
            [
                'name'        => 'JavaScript',
                'slug'        => 'javascript',
                'description' => 'A lightweight, interpreted, or instance-compiled programming language with first-class functions for the web.',
            ],
        ];

        foreach ($technologies as $tech) {
            Technology::updateOrCreate(['slug' => $tech['slug']], $tech);
        }
    }
}
