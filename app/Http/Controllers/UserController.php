<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "المستخدمون والصلاحيات";
        $users = User::select("id", "name", "email")->with("roles")->get();
        $roles = Role::select("id", "name")->get();
        $permissions = Permission::select("id", "name")->get();
        return view("user.index", [
            "users" => $users,
            "roles" => $roles,
            "permissions" => $permissions,
            "title" => $title,
        ]);
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $title = "إضافة مستخدم جديد";
        $roles = Role::select("id", "name")->get();
        return view("user.user-create", ["roles" => $roles, "title" => $title]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => [
                "required",
                "string",
                "lowercase",
                "email",
                "max:255",
                "unique:" . User::class,
            ],
            "password" => ["required", "confirmed", Rules\Password::defaults()],
            "role" => ["required", "string", "exists:roles,name"],
        ]);

        // تنفيذ العملية ككتلة واحدة آمنة
        $user = DB::transaction(function () use ($validated, $request) {
            $user = User::create([
                "name" => $validated["name"],
                "email" => $validated["email"],
                "password" => Hash::make($request->password),
            ]);

            $user->assignRole($validated["role"]);

            return $user;
        });

        event(new Registered($user));

        return redirect()
            ->route("users.index")
            ->with("success-store-user", "User registered successfully.");
    }
    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $title = "تعديل المستخدم للادمن";
        $roles = Role::select("id", "name")->get();
        return view("user.user-edit", [
            "user" => $user,
            "roles" => $roles,
            "title" => $title,
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \App\Models\User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'exists:roles,name'],
        ]);

        DB::transaction(function () use ($validated, $user) {
            $user->update(['name' => $validated['name']]);
            $user->syncRoles([$validated['role']]);
        });

        return redirect()
            ->route('users.index')
            ->with('success-update-user', 'تم تحديث المستخدم بنجاح.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Models\User  $user
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        // loged user cant delete him self
        if ($user->id === auth()->id()) {
            return back()->with('error', 'لا يمكنك حذف حسابك الخاص.');
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success-delete-user', 'تم حذف المستخدم بنجاح.');
    }
}
