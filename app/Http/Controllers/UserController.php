<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email')->with('roles')->get();
        return view('user.index', ['users' => $users]);
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->delete();

        return redirect()->route('home')->with('status', 'User account deleted successfully.');
    }
}
