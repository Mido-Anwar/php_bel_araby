<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'User Management'" />

    </x-slot>



        <x-dashboard-container>
            <div class="my-4 p-5">
                <a href="{{ route('register') }}" class="btn-dashboard">
                    + Create New User
                </a>
            </div>










            <x-message :message="session('success-store-user')" :color="'green'" />
            <x-message :message="session('success-update-user')" :color="'blue'" />
            <x-message :message="session('success-delete-user')" :color="'red'" />
        </x-dashboard-container>


        <x-dashboard-container>
            <x-dashboard-head :text="'Roles'" />

            <div class="">
                <a href="{{ route('role.create') }}" class="btn-create">
                    + Create Role
                </a>

            </div>

            @foreach ($roles as $role)
                <div class="btn-container">
                    <a href="" class="btn-show">
                        {{ $role->name }}
                    </a>
                    <a href="{{ route('role.edit', $role->id) }}" class="btn-edit">edit</a>
                    <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this role ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            X
                        </button>
                    </form>
                </div>
            @endforeach
            <x-message :message="session('success-store-role')" :color="'green'" />
            <x-message :message="session('success-update-role')" :color="'blue'" />
            <x-message :message="session('success-delete-role')" :color="'red'" />
        </x-dashboard-container>

        <x-dashboard-container>
            <x-dashboard-head :text="'Permissions'" />
            <div class="my-4 p-5">
                <a href="{{ route('permission.create') }}" class="btn-create">
                    + Create Permission
                </a>

            </div>
            @foreach ($permissions as $permission)
                <div class="btn-container">
                    <a href="" class="btn-show">{{ $permission->name }}</a>
                    <a href="{{ route('permission.edit', $permission->id) }}" class="btn-edit">edit</a>
                    <form action="{{ route('permission.destroy', $permission->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this permission ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            X
                        </button>
                    </form>
                </div>
            @endforeach
            <x-message :message="session('success-store-permission')" :color="'green'" />
            <x-message :message="session('success-update-permission')" :color="'blue'" />
            <x-message :message="session('success-delete-permission')" :color="'red'" />
        </x-dashboard-container>

</x-app-layout>
