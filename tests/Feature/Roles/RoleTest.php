<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * ============================================
 * Roles & Permissions Tests
 * ============================================
 */

beforeEach(function () {
    // إنشاء الأدوار الأساسية
    $this->superAdmin = Role::create(['name' => 'super-admin']);
    $this->admin      = Role::create(['name' => 'admin']);
    $this->writer     = Role::create(['name' => 'writer']);
});

// ============================================
// Roles
// ============================================

test('role can be created', function () {
    expect(Role::where('name', 'super-admin')->exists())->toBeTrue();
});

test('role names must be unique', function () {
    expect(fn () => Role::create(['name' => 'super-admin']))
        ->toThrow(\Spatie\Permission\Exceptions\RoleAlreadyExists::class);
});

test('user can be assigned a role', function () {
    $user = User::factory()->create();
    $user->assignRole('super-admin');

    expect($user->hasRole('super-admin'))->toBeTrue();
});

test('user can have multiple roles', function () {
    $user = User::factory()->create();
    $user->assignRole(['admin', 'writer']);

    expect($user->hasRole('admin'))->toBeTrue()
        ->and($user->hasRole('writer'))->toBeTrue()
        ->and($user->hasAllRoles(['admin', 'writer']))->toBeTrue();
});

test('user can be removed from a role', function () {
    $user = User::factory()->create();
    $user->assignRole('admin');
    $user->removeRole('admin');

    expect($user->hasRole('admin'))->toBeFalse();
});

test('user can get all roles', function () {
    $user = User::factory()->create();
    $user->assignRole(['admin', 'writer']);

    expect($user->getRoleNames())->toHaveCount(2)
        ->and($user->getRoleNames())->toContain('admin')
        ->and($user->getRoleNames())->toContain('writer');
});

// ============================================
// Permissions
// ============================================

test('role can have permissions', function () {
    $permission = Permission::create(['name' => 'edit posts']);
    $this->admin->givePermissionTo($permission);

    expect($this->admin->hasPermissionTo('edit posts'))->toBeTrue();
});

test('user with role gets role permissions', function () {
    $permission = Permission::create(['name' => 'edit posts']);
    $this->admin->givePermissionTo($permission);

    $user = User::factory()->create();
    $user->assignRole('admin');

    expect($user->can('edit posts'))->toBeTrue();
});

test('user without permission cannot access', function () {
    $permission = Permission::create(['name' => 'edit posts']);
    $this->admin->givePermissionTo($permission);

    $user = User::factory()->create(); // بدون دور

    expect($user->can('edit posts'))->toBeFalse();
});

test('user can get all permissions via roles', function () {
    Permission::create(['name' => 'edit posts']);
    Permission::create(['name' => 'delete posts']);

    $this->admin->givePermissionTo(['edit posts', 'delete posts']);

    $user = User::factory()->create();
    $user->assignRole('admin');

    expect($user->getAllPermissions())->toHaveCount(2);
});

// ============================================
// Super Admin (Gate::before)
// ============================================

test('super-admin can do anything', function () {
    $user = User::factory()->create();
    $user->assignRole('super-admin');

    expect($user->can('any-permission'))->toBeTrue()
        ->and($user->can('another-permission'))->toBeTrue();
});
