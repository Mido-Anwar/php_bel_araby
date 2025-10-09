<x-app-layout>
    <x-slot name="header">
        <h2 dir="rtl" class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('تعديل الاسم') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <x-dashboard-container>
            <form action="{{ route('tech.update', $tech->name) }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class=" block text-sm font-medium text-gray-700 dark:text-gray-300">Technology
                        Name</label>
                    <input type="" name="name" id="name" value="{{ $tech->name }}"
                        class="my-3 p-4 block w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Technology Description
                    </label>
                    <textarea name="description" id="description" rows="5"
                        class="mt-1 block w-1/2 rounded-md border-gray-300 shadow-sm
               focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm
               dark:bg-gray-700 dark:border-gray-600 dark:text-white">
{{ $tech->description }}
            </textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </form>
        </x-dashboard-container>
    </div>
</x-app-layout>
