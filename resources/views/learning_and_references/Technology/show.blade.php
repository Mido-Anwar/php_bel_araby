<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($tech->name) }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="my-2 p-3">
                        <a href="{{ route('tech.edit', $tech->name) }}" class="px-4 py-2  text-white rounded-md "
                            style="background: green;">
                            + Edit Technology
                        </a>
                    </div>
                    <div
                        class="my-4 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                            {{ $tech->name }}
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ $tech->description }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
