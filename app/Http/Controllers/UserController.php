<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email')->with('roles')->get();
        $roles = Role::select('id', 'name')->get();
        return view('user.index', ['users' => $users , 'roles' => $roles]);
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->delete();

        return redirect()->route('home')->with('status', 'User account deleted successfully.');
    }
}
