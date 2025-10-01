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

                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100">
                            {{ Str::upper($section->title) }}
                        </h2>
                        <a href="{{ route('section.edit', $section->id) }}" class="btn-edit">
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

                    <x-section.concept :section="$section" />
                    <x-section.builtin-function :section="$section" />
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
