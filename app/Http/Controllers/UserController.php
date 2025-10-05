<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->delete();

        return redirect()->route('home')->with('status', 'User account deleted successfully.');
    }
}
