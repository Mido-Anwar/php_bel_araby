<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email')->with('roles')->get();
        $roles = Role::select('id', 'name')->get();
        $permissions = Permission::select('id','name')->get();
        return view('user.index', ['users' => $users , 'roles' => $roles,'permissions'=>$permissions]);
    }

    public function edit(User $user)
    {
        $roles = Role::select('id', 'name')->get();
        return view('user.userEdit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(User $user, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|exists:roles,name',
        ]);

        $user->name = $validatedData['name'];
        $user->save();

        // Sync user roles
        $user->syncRoles([$validatedData['role']]);

        return redirect()->route('users.index')->with('success-update-user', 'User information updated successfully.');
    }

    public function destroy(User $user, Request $request)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success-delete-user', 'User account deleted successfully.');
    }
}
