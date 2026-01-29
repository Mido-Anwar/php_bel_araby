<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new permission.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.roleAndPermissionCreate');
    }

    /**
     * Store a newly created permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('users.index')->with('success-store-permission', 'success permission created');
    }

    /**
     * Display the specified permission.
     *
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return void
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified permission.
     *
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\View\View
     */
    public function edit(Permission $permission)
    {

        return view('user.roleAndPermissionEdit', compact('permission'));
    }

    /**
     * Update the specified permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);
        $permission->update(['name' => $request->name]);
        return redirect()->route('users.index')->with('success-update-permission', 'success permission updated');
    }

    /**
     * Remove the specified permission from storage.
     *
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('users.index')->with('success-delete-permission', 'success permission deleted');
    }
}
