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
            'email' => config('admin.email'),
            'password' => config('admin.password'),
        ]);

        $user->assignRole('super-admin');
    }
}
