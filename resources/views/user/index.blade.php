<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'User Management'" />
        <x-dashboard-paragraph :text="'User & Roles'" />
    </x-slot>

    <div class="py-12">

        <x-dashboard-container>
            <div class="my-4 p-5">
                <a href="{{ route('register') }}" class="btn-dashboard">
                    + Create New User
                </a>
            </div>
            <table class="w-full border border-gray-200 dark:border-gray-700 text-sm">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">ID</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Name
                        </th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">
                          email
                        </th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Role
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-4">{{ $user->id }}</td>
                            <td class="px-4 py-4">{{ $user->name }}</td>
                            <td class="px-4 py-4">{{ $user->email }}</td>
                            <td class="px-4 py-4">
                                {{ $user->getRoleNames()->first() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-dashboard-container>


        <x-dashboard-container>
            <div class="my-4 p-5">
                <a href="{{ route('role.create') }}" class="btn-create">
                    + Create Role
                </a>
                <a href="{{ route('permission.create') }}" class="btn-create">
                    + Create Permission
                </a>
            </div>

            @foreach ($roles as $role)
                <div class="btn-container">
                    <a href="{{ route('role.create') }}" class="btn-show">
                        {{ $role->name }}
                    </a>
                    <a href="{{ route('role.edit',$role->id) }}" class="btn-edit">edit</a>
                    <form action="" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this technology?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            X
                        </button>
                    </form>
                </div>
            @endforeach
        </x-dashboard-container>
    </div>
</x-app-layout>
