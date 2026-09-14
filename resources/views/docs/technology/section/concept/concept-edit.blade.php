<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Concept') }}
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
                        <div class="p-2.5 bg-amber-600 text-white rounded-xl shadow-md shadow-amber-500/20">
                            <!-- Edit Icon -->
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Edit: {{ $concept->title }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Update concept details, syntax, or documentation content.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <form action="{{ route('concept.update', $concept->id) }}" method="POST" class="p-6 sm:p-8 space-y-6">
                    @csrf

                    <input type="hidden" name="section_id" value="{{ $concept->section_id }}"> 
                    <!-- Field: Type Selection -->
                    <div class="space-y-2">
                        <x-input-label for="type" :value="'Concept Type'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <select id="type" name="type"
                            class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200 shadow-sm">
                            <option value="concept" {{ old('type', $concept->type) == 'concept' ? 'selected' : '' }}>Concept (مفهوم عام / شرح)</option>
                            <option value="function" {{ old('type', $concept->type) == 'function' ? 'selected' : '' }}>Built-in Function (دالة جاهزة)</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-1 text-xs" />
                    </div>

                    <!-- Field: Title / Function Name -->
                    <div class="space-y-2">
                        <x-input-label for="title" :value="'Title / Function Name'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <div class="relative">
                            <x-text-input id="title" name="title" type="text"
                                class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200 shadow-sm"
                                placeholder="e.g. array_map() or Dependency Injection"
                                :value="old('title', $concept->title)" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('title')" class="mt-1 text-xs" />
                    </div>

                    <!-- Field: Syntax / Signature -->
                    <div class="space-y-2">
                        <x-input-label for="syntax" :value="'Syntax / Signature'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <x-text-input id="syntax" name="syntax" type="text"
                            class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200 shadow-sm font-mono text-sm"
                            placeholder="e.g. array_map(?callable $callback, array $array1, array ...$arrays)"
                            value="{{ old('syntax', $concept->syntax) }}" />
                        <x-input-error :messages="$errors->get('syntax')" class="mt-1 text-xs" />
                    </div>



                    <!-- Field: Description / Explanation -->
                    <div class="space-y-2">
                        <x-input-label for="description" :value="'Description / Explanation'"
                            class="text-sm font-semibold text-gray-700 dark:text-gray-300" />
                        <textarea id="description" name="description" rows="6"
                            placeholder="Provide a clear description or code examples for this concept..."
                            class="w-full px-4 py-3 rounded-xl border-gray-200 dark:border-gray-700 dark:bg-gray-900/50 dark:text-gray-100 focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all duration-200 shadow-sm resize-y font-mono text-sm leading-relaxed"
                            required>{{ old('description', $concept->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-1 text-xs" />
                    </div>

                    <!-- Action Buttons -->
                    <div
                        class="pt-4 flex items-center justify-end gap-3 border-t border-gray-100 dark:border-gray-700/60">
                        <a href="{{ route('section.show', $concept->section_id) }}"
                            class="px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-all duration-200">
                            Cancel
                        </a>

                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold shadow-lg shadow-amber-500/25 hover:shadow-amber-500/35 active:scale-[0.98] transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Update Concept</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
