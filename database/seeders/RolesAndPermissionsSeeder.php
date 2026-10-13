<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create-articles']);
        Permission::create(['name' => 'edit-articles']);
        Permission::create(['name' => 'delete-articles']);
        Permission::create(['name' => 'publish-articles']);
        Permission::create(['name' => 'unpublish-articles']);
        Permission::create(['name' => 'delete-users']);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo([
            'create-articles',
            'edit-articles',
            'delete-articles',]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
