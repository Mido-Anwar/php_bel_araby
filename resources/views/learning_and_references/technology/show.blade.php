<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($technology->name) }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div
                        class="my-4 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="my-2 flex justify-end">
                            <a href="{{ route('tech.edit', $technology->name) }}"
                                class="px-4 py-2  text-white rounded-md font-bold" style="background: green;">
                                + Edit Technology
                            </a>
                        </div>
                        <h2 class="font-bold text-gray-800 dark:text-gray-100 mb-2">
                            {{ Str::upper($tech->name) }}
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-bold text-lg">
                            {{ $technology->description }}
                        </p>
                    </div>
                    <div
                        class="my-4 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <h2 class="font-bold text-gray-800 dark:text-gray-100 mb-2">
                            {{ Str::upper($technology->name) }} Sections
                        </h2>
                        <div class="w-1/2">
                            <label for="tech" class="block text-sm font-medium text-gray-700 mb-1">
                            </label>
                            @foreach ($technology->sections as $section)
                                <div class="btn-container">
                                    <a href="{{ route('section.show', $section->id) }}" class="btn-show">
                                        {{ $section->title }}
                                    </a>
                                    <form action="{{ route('section.destroy', $section->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this technology?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            X
                                        </button>
                                    </form>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div style="height: 30rem"
                        class=" h-40 my-4 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">

                        <h2 class="font-bold text-gray-800 dark:text-gray-100 mb-2">
                            Add Sections To {{ Str::upper($technology->name) }}
                        </h2>

                        <x-hidden-form :action-url="route('section.store')" :open="false" >
                            <input type="hidden" name="technology_id" id="" value="{{ $technology->id }}" hidden>
                            <input type="text" name="title" placeholder="Section title"
                                class="border rounded p-2 w-full mb-2">
                            <textarea name="content" placeholder="content" class="border rounded p-2 w-full mb-2"></textarea>
                        </x-hidden-form>

                        @if (session('success-section'))
                            <div class="mt-3 text-green-600">
                                {{ session('success-section') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
