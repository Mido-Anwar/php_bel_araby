<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-2.5 bg-amber-500/10 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 rounded-xl">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                        {{ $technology->name }}
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">تقنية برمجية تحتوي على الأقسام والمفاهيم الخاصة بها</p>
                </div>
            </div>

            <!-- Header Quick Actions -->
            <div class="flex items-center gap-2">
                <a href="{{ route('technology.edit', $technology->id) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700/80 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm transition-all duration-200">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>تعديل التقنية</span>
                </a>

                <a href="{{ route('section.create', $technology->id) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-amber-600 hover:bg-amber-700 rounded-xl shadow-md shadow-amber-500/20 active:scale-[0.98] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>إضافة قسم جديد</span>
                </a>
            </div>
        </div>

        <!-- System Alert Messages -->
        <div class="mt-4 space-y-2">
            <x-message :message="session('success-update-technology')" :color="'blue'" />
            <x-message :message="session('success-store-section')" :color="'green'" />
            <x-message :message="session('success-delete-section')" :color="'red'" />
            <x-message :message="session('success-store-builtinFunction')" :color="'green'" />
            <x-message :message="session('success-delete-builtinFunction')" :color="'red'" />
        </div>
    </x-slot>

    <div class="py-8 space-y-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Technology Hero Card -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700/60 transition-all">
            <div class="p-6 sm:p-8 bg-gradient-to-r from-amber-500/10 via-teal-500/5 to-transparent border-b border-gray-100 dark:border-gray-700/60">
                <div class="flex items-center justify-between">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300 border border-amber-200 dark:border-amber-700/50">
                        🚀 Technology Overview
                    </span>
                    <span class="text-xs font-mono text-gray-500 dark:text-gray-400">
                        {{ $technology->sections->count() }} {{ Str::plural('Section', $technology->sections->count()) }}
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white mt-3">
                    {{ $technology->name }}
                </h1>
                @if($technology->description)
                    <p class="text-gray-600 dark:text-gray-300 mt-2 text-sm sm:text-base leading-relaxed">
                        {{ $technology->description }}
                    </p>
                @endif
            </div>
        </div>

        <!-- Sections List Header & Grid -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                    <span dir="rtl">الأقسام التابعة ل ـ {{ $technology->name }}</span>
                    <span class="px-2.5 py-0.5 text-xs rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-mono">
                        {{ $technology->sections->count() }}
                    </span>
                </h3>
            </div>

            @if ($technology->sections->isEmpty())
                <!-- Empty State -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl border border-dashed border-gray-300 dark:border-gray-700 p-12 text-center space-y-4">
                    <div class="w-16 h-16 mx-auto bg-amber-100 dark:bg-amber-950/50 text-amber-600 dark:text-amber-400 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white">لا توجد أقسام مضافة بعد</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">أنشئ أول قسم لهذه التقنية لتتمكن من تنظيم المفاهيم والأكواد بداخله.</p>
                    </div>
                    <a href="{{ route('section.create', $technology->id) }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold shadow-lg shadow-amber-500/20 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>إضافة أول قسم</span>
                    </a>
                </div>
            @else
                <!-- Sections Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($technology->sections as $section)
                        <div class="group bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700/60 shadow-md hover:shadow-xl hover:border-amber-500/30 dark:hover:border-amber-500/30 transition-all duration-200 flex flex-col justify-between space-y-4">

                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="p-2 bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 rounded-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="text-xs font-mono text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700/50 px-2 py-0.5 rounded-md">
                                        {{ $section->concepts_count ?? $section->concepts?->count() ?? 0 }} مفاهيم
                                    </span>
                                </div>

                                <a href="{{ route('section.show', $section->id) }}" class="block">
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">
                                        {{ $section->title }}
                                    </h4>
                                </a>

                                @if($section->description)
                                    <p class="text-xs text-gray-600 dark:text-gray-400 line-clamp-2 leading-relaxed">
                                        {{ $section->description }}
                                    </p>
                                @endif
                            </div>

                            <!-- Card Footer Actions -->
                            <div class="pt-4 border-t border-gray-100 dark:border-gray-700/50 flex items-center justify-between">
                                <a href="{{ route('section.show', $section->id) }}"
                                   class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600 dark:text-amber-400 hover:underline">
                                    <span>تصفح القسم</span>
                                    <svg class="w-3.5 h-3.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>

                                <div class="flex items-center gap-1">
                                    <a href="{{ route('section.edit', $section->id) }}"
                                       class="p-1.5 text-gray-400 hover:text-amber-600 dark:hover:text-amber-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors"
                                       title="تعديل القسم">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    @if (Auth::user()->hasRole('super-admin'))
                                        <x-delete-form :action-url="route('section.destroy', $section->id)" />
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
