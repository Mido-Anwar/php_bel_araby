<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'User Management'" />

    </x-slot>



    <x-dashboard-container>

        <x-slot name="div">
            <x-dashboard-head :text="'Users Data Table'" />
            <a href="{{ route('register') }}" class="btn-dashboard">
                + Create New User
            </a>
        </x-slot>
        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name . ' , '. $user->email}}</td>

                        <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn-edit">Edit</a>
                            <x-delete-form :action-url="route('user.destroy', $user->id)" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <x-message :message="session('success-store-user')" :color="'green'" />
        <x-message :message="session('success-update-user')" :color="'blue'" />
        <x-message :message="session('success-delete-user')" :color="'red'" />
    </x-dashboard-container>


    <x-dashboard-container>
        <x-slot name="div">
            <x-dashboard-head :text="'Roles'" />
            <a href="{{ route('role.create') }}" class="btn-create">
                + Create Role
            </a>
            <x-dashboard-paragraph :text="'Manage user roles to control access and permissions within the application.'" />

        </x-slot>

        @foreach ($roles as $role)
            <div class="btn-container">
                <a href="" class="btn-show">
                    {{ $role->name }}
                </a>
                <a href="{{ route('role.edit', $role->id) }}" class="btn-edit">edit</a>
                <x-delete-form :action-url="route('role.destroy', $role->id)" />
            </div>
        @endforeach
        <x-message :message="session('success-store-role')" :color="'green'" />
        <x-message :message="session('success-update-role')" :color="'blue'" />
        <x-message :message="session('success-delete-role')" :color="'red'" />
    </x-dashboard-container>

    <x-dashboard-container>

        <x-slot name="div">
            <x-dashboard-head :text="'Permissions'" />

            <a href="{{ route('permission.create') }}" class="btn-create">
                + Create Permission
            </a>
            <x-dashboard-paragraph :text="'permissions under roles '" />
        </x-slot>

        @foreach ($permissions as $permission)
            <div class="btn-container">
                <a href="" class="btn-show">{{ $permission->name }}</a>
                <a href="{{ route('permission.edit', $permission->id) }}" class="btn-edit">edit</a>
                <x-delete-form :action-url="route('permission.destroy', $permission->id)" />
            </div>
        @endforeach
        <x-message :message="session('success-store-permission')" :color="'green'" />
        <x-message :message="session('success-update-permission')" :color="'blue'" />
        <x-message :message="session('success-delete-permission')" :color="'red'" />
    </x-dashboard-container>

</x-app-layout>
