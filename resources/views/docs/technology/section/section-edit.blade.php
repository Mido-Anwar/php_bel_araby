<x-app-layout :title="$title">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('edit Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Form Card Container -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700/60 transition-all">

                <!-- Card Header with Gradient Accent -->
                <div
                    class="relative px-6 py-6 bg-gradient-to-r from-amber-500/10 via-teal-500/5 to-transparent border-b border-gray-100 dark:border-gray-700/60">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        <div class="p-2.5 bg-amber-500 text-white rounded-xl shadow-md shadow-amber-500/20">
                            <!-- Section Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Edit Section:
                                {{ $section->technology->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5"> Edit the information for this
                                section.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <form action="{{ route('section.update', $section->id) }}" method="POST" class="p-6 sm:p-8 space-y-6">
                    @csrf

                    <!-- Hidden Foreign Key -->
                    <input type="hidden" name="technology_id" value="{{ $section->technology->id }}">

                    <!-- Field: Section Title -->
                    <div class="space-y-2">
                        <x-input-label for="title" :value="'Section Title'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <div class="relative">
                            <x-text-input id="title" name="title" type="text"
                                class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200 shadow-sm"
                                placeholder="e.g. Basics, Advanced Concepts, Routing" value="{{ $section->title }}" required
                                autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('title')" class="mt-1 text-xs" />
                    </div>

                    <!-- Field: Description -->
                    <div class="space-y-2">
                        <x-input-label for="description" :value="'Description'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <textarea id="description" name="description" rows="5"
                            placeholder="Provide a short overview of what this section covers..."
                            class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200 shadow-sm resize-y">{{ $section->description }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-1 text-xs" />
                    </div>

                    <!-- Action Buttons -->
                    <div
                        class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100 dark:border-gray-700/60">
                        {{-- استخدام optional() أو التأكد من وجود المتغير --}}
                        <a href="{{ isset($technology) ? route('technology.show', $technology->id) : route('technology.index') }}"
                            class="px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-all duration-200">
                            Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-amber-500  hover:bg-amber-700 text-white text-sm font-semibold shadow-lg shadow-amber-500/25 hover:shadow-amber-500/35 active:scale-[0.98] transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Save Section</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
