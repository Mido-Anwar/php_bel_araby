<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-2.5 bg-amber-500/10 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 rounded-xl">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                        التقنيات المتاحة
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">استعرض كافة اللغات، أطر العمل، والتقنيات التوثيقية</p>
                </div>
            </div>

            <!-- Header Quick Action -->
            <div>
                <a href="{{ route('technology.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-amber-600 hover:bg-amber-700 rounded-xl shadow-md shadow-amber-500/20 active:scale-[0.98] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>إضافة تقنية جديدة</span>
                </a>
            </div>
        </div>

        <!-- System Alert Messages -->
        <div class="mt-4 space-y-2">
            <x-message :message="session('success-store-technology')" :color="'green'" />
            <x-message :message="session('success-update-technology')" :color="'blue'" />
            <x-message :message="session('success-delete-technology')" :color="'red'" />
        </div>
    </x-slot>

    <div class="py-8 space-y-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if ($technologies->isEmpty())
            <!-- Empty State -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-dashed border-gray-300 dark:border-gray-700 p-12 text-center space-y-4 shadow-sm">
                <div class="w-16 h-16 mx-auto bg-amber-100 dark:bg-amber-950/50 text-amber-600 dark:text-amber-400 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="space-y-1">
                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">لا توجد تقنيات مسجلة بعد</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400">ابدأ بإنشاء أول تقنية لبناء المرجع الخاص بك وتنظيم الأقسام والمفاهيم.</p>
                </div>
                <a href="{{ route('technology.create') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold shadow-lg shadow-amber-500/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>إضافة أول تقنية</span>
                </a>
            </div>
        @else
            <!-- Grid Layout for Technologies -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($technologies as $technology)
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700/60 shadow-md hover:shadow-xl hover:border-amber-500/30 dark:hover:border-amber-500/30 transition-all duration-200 flex flex-col justify-between space-y-4">

                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="p-2.5 bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 rounded-xl">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </span>
                                <span class="text-xs font-mono text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700/50 px-2.5 py-1 rounded-md">
                                    {{ $technology->sections_count ?? $technology->sections?->count() ?? 0 }} أقسام
                                </span>
                            </div>

                            <a href="{{ route('technology.show', $technology->id) }}" class="block">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">
                                    {{ $technology->name }}
                                </h3>
                            </a>

                            @if($technology->description)
                                <p class="text-xs text-gray-600 dark:text-gray-400 line-clamp-3 leading-relaxed">
                                    {{ $technology->description }}
                                </p>
                            @else
                                <p class="text-xs text-gray-400 dark:text-gray-500 italic">
                                    لا يوجد وصف متاح لهذه التقنية.
                                </p>
                            @endif
                        </div>

                        <!-- Card Footer -->
                        <div class="pt-4 border-t border-gray-100 dark:border-gray-700/50 flex items-center justify-between">
                            <a href="{{ route('technology.show', $technology->id) }}"
                               class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600 dark:text-amber-400 hover:underline">
                                <span>تصفح التقنية</span>
                                <svg class="w-3.5 h-3.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>

                            <div class="flex items-center gap-1">
                                <a href="{{ route('technology.edit', $technology->id) }}"
                                   class="p-1.5 text-gray-400 hover:text-amber-600 dark:hover:text-amber-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors"
                                   title="تعديل">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                @if (Auth::user()->hasRole('super-admin'))
                                    <x-delete-form :action-url="route('technology.destroy', $technology->id)" />
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-app-layout>
