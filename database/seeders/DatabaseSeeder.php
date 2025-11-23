<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call(RolesAndPermissionsSeeder::class);
        $user = User::factory()->create([
            'name' => 'mido anwar',
            'email' => 'mimianwar33@hotmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('super-admin');
      //  $this->call(PostSeeder::class);
//
      //  $this->call([
      //      TechnologySeeder::class,
      //      SectionSeeder::class,
      //      ConceptSeeder::class,
      //      BuiltInFunctionSeeder::class,
       // ]);
    }
}
