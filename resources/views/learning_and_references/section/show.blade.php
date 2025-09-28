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
                                class="btn-edit">
                                ✎ Edit Section
                            </a>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                            {{ $section->content }}
                        </p>

                        {{-- Success Message --}}
                        @if (session('success_section-update'))
                            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                                {{ session('success_section-update') }}
                            </div>
                        @endif
                    </div>
                    {{-- Concepts List --}}
                    <div
                        class="my-4 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="block mb-4">

                            <h2 class="font-bold text-xl mb-4 text-gray-800 dark:text-gray-100">
                                {{ Str::upper($section->title) . ' Concepts' }}
                            </h2>

                            @foreach ($section->concepts as $concept)
                                <div class="btn-container">
                                    <a href="{{ route('concept.show', $concept->id) }}" class="btn-show">
                                        {{ $concept->name }}
                                    </a>
                                    <a href="{{ route('concept.edit', $concept->id) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('concept.destroy', $concept->id) }}" method="POST"
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

                    {{-- BuiltinFunctions List --}}
                             <div
                        class="my-4 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <div class="block mb-4">

                            <h2 class="font-bold text-xl mb-4 text-gray-800 dark:text-gray-100">
                                {{ Str::upper($section->title) . ' Builtin Functions' }}
                            </h2>

                            @foreach ($section->builtinFunctions as $function)
                                <div class="btn-container">
                                    <a href="{{ route('builtin.show', $function->id) }}" class="btn-show">
                                        {{ $function->name }}
                                    </a>
                                    <a href="{{ route('builtin.edit', $function->id) }}" class="btn-edit">Edit</a>
                                    <form action="{{ route('builtin.destroy', $function->id) }}" method="POST"
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
                    {{-- Add concept Form --}}
                    <div
                        class="my-6 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100 mb-4">
                            Add Concept to <span class="">{{ Str::upper($section->title) }}</span>
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

                        @if (session('success_concept'))
                            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                                {{ session('success_concept') }}
                            </div>
                        @endif
                    </div>
                    <div
                        class="my-6 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-200 dark:border-gray-700">
                        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100 mb-4">
                            Add builtin function to <span class="">{{ Str::upper($section->title) }}</span>
                        </h2>

                        <x-hidden-form :action-url="route('builtin.store')" :open="false">
                            <input type="hidden" name="section_id" value="{{ $section->id }}">

                            <div class="space-y-5">
                                {{-- builtinFunction Title --}}
                                <div>
                                    <label for="name"
                                        class="block text-sm font-semibold mb-2 text-gray-700 dark:text-gray-300">
                                        builtinFunction Title
                                    </label>
                                    <input type="text" id="name" name="name"
                                        placeholder="Enter builtinFunction title"
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

                        @if (session('success_builtin'))
                            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-300">
                                {{ session('success_builtin') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
