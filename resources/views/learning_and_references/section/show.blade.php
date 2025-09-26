<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($section->title) }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Section Card --}}
                    <div
                        class="my-4 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100">
                                {{ Str::upper($section->title) }}
                            </h2>
                            <a href="{{ route('section.edit', $section->id) }}"
                                class="px-4 py-2 bg-green-600 hover:bg-green-700 transition text-white rounded-lg font-semibold shadow">
                                ✎ Edit Section
                            </a>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                            {{ $section->content }}
                        </p>
                    </div>

                    {{-- Add Concept Form --}}
                    <div
                        class="my-6 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100 mb-4">
                            Add Concept to <span class="text-indigo-600">{{ Str::upper($section->name) }}</span>
                        </h2>

                        <x-hidden-form :action-url="route('concept.store')" :open="false">
                            <input type="hidden" name="section_id" value="{{ $section->id }}">

                            <div class="space-y-5">
                                {{-- Concept Title --}}
                                <div>
                                    <label for="name"
                                        class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                                        Concept Title
                                    </label>
                                    <input type="text" id="name" name="name"
                                        placeholder="Enter concept title"
                                        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>

                                {{-- Syntax --}}
                                <div>
                                    <label for="syntax"
                                        class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                                        Syntax
                                    </label>
                                    <textarea id="syntax" name="syntax" placeholder="Enter syntax"
                                        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                </div>

                                {{-- Description --}}
                                <div>
                                    <label for="description"
                                        class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                                        Description
                                    </label>
                                    <textarea id="description" name="description" placeholder="Enter description"
                                        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                </div>

                                {{-- Example --}}
                                <div>
                                    <label for="example"
                                        class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                                        Example Code
                                    </label>
                                    <textarea id="example" name="example" placeholder="Write an example..." rows="5"
                                        class="border rounded-lg p-3 w-full font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                </div>

                            </div>
                        </x-hidden-form>

                        @if (session('success'))
                            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
     <div
                        class="my-6 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100 mb-4">
                            Add builtin function to <span class="text-indigo-600">{{ Str::upper($section->name) }}</span>
                        </h2>

                        <x-hidden-form :action-url="route('concept.store')" :open="false">
                            <input type="hidden" name="section_id" value="{{ $section->id }}">

                            <div class="space-y-5">
                                {{-- Concept Title --}}
                                <div>
                                    <label for="name"
                                        class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                                        Concept Title
                                    </label>
                                    <input type="text" id="name" name="name"
                                        placeholder="Enter concept title"
                                        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>

                                {{-- Syntax --}}
                                <div>
                                    <label for="syntax"
                                        class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                                        Syntax
                                    </label>
                                    <textarea id="syntax" name="syntax" placeholder="Enter syntax"
                                        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                </div>

                                {{-- Description --}}
                                <div>
                                    <label for="description"
                                        class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                                        Description
                                    </label>
                                    <textarea id="description" name="description" placeholder="Enter description"
                                        class="border rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                </div>

                                {{-- Example --}}
                                <div>
                                    <label for="example"
                                        class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                                        Example Code
                                    </label>
                                    <textarea id="example" name="example" placeholder="Write an example..." rows="5"
                                        class="border rounded-lg p-3 w-full font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                                </div>

                            </div>
                        </x-hidden-form>

                        @if (session('success'))
                            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
