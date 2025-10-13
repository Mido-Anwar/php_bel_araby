<x-app-layout>
    <x-slot name="header">
        <x-dashboard-head :text="'User Management'" />
        <x-dashboard-paragraph :text="'User & Roles'" />
    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <table class="w-full border border-gray-200 dark:border-gray-700 text-sm">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">ID</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Name
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
                <a href="{{ route('tech.create') }}" class="btn-create">
                    + Create Role
                </a>
            </div>

            @foreach ($roles as $role)
                <div class="btn-container">
                    <a href="" class="btn-show">
                        {{ $role->name }}
                    </a>
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
