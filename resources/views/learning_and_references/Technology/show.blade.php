<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __( $tech->name) }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="my-2 p-3">
                        <a href="{{ route('tech.edit', $tech->name) }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md ">
                            + Show Technology
                        </a>
                    </div>
                    <div class="my-2 p-3">
                        <h2>
                            {{ $tech->name }}

                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
