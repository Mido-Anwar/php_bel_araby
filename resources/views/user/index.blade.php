<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 max-w-2xl">
            role & permissions management.
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full overflow-x-auto">
                   <table class="w-full border border-gray-200 dark:border-gray-700 text-sm">
    <thead class="bg-gray-100 dark:bg-gray-800">
        <tr>
            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">ID</th>
            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Name</th>
            <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Role</th>
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


                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
