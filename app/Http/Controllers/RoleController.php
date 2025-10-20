<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index() {}

    public function create()
    {
        $permissions = Permission::select('id', 'name')->get();
        return view('user.roleAndPermissionCreate', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array',
        ]);
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('users.index')->with('success-store-role', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::select('id', 'name')->get();
        return view('user.roleAndPermissionEdit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array',
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('users.index')->with('success-update-role', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('users.index')->with('success-delete-role', 'Role deleted successfully.');
    }
}
