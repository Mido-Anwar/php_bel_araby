<x-app-layout   :title="$title">
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-amber-500/10 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                     {{ $section->technology->name }} :  {{ $section->title }}
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">قسم توثيقي يحتوي على المفاهيم والدوال التابعة له</p>
                </div>
            </div>

            <!-- Header Quick Actions -->
            <div class="flex items-center gap-2">
                <a href="{{ route('section.edit', $section->id) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700/80 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm transition-all duration-200">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>تعديل القسم</span>
                </a>

                <a href="{{ route('concept.create', $section->id) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-amber-600 hover:bg-amber-700 rounded-xl shadow-md shadow-amber-500/20 active:scale-[0.98] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>إضافة مفهوم جديد</span>
                </a>
            </div>
        </div>

        <!-- System Alert Messages -->
        <div class="mt-4 space-y-2">
            <x-message :message="session('success-store-concept')" :color="'green'" />
            <x-message :message="session('success-update-concept')" :color="'blue'" />
            <x-message :message="session('success-delete-concept')" :color="'red'" />
            <x-message :message="session('success-update-section')" :color="'blue'" />
        </div>
    </x-slot>

    <div class="py-8 space-y-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Details Hero Card -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700/60 transition-all">
            <div class="p-6 sm:p-8 bg-gradient-to-r from-amber-500/10 via-teal-500/5 to-transparent border-b border-gray-100 dark:border-gray-700/60">
                <div class="flex items-center justify-between">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300 border border-amber-200 dark:border-amber-700/50">
                        📁 Section Details
                    </span>
                    <span class="text-xs font-mono text-gray-500 dark:text-gray-400">
                        {{ $section->concepts->count() }} {{ Str::plural('Concept', $section->concepts->count()) }}
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white mt-3">
                    {{ $section->title }}
                </h1>
                @if($section->description)
                    <p class="text-gray-600 dark:text-gray-300 mt-2 text-sm sm:text-base leading-relaxed">
                        {{ $section->description }}
                    </p>
                @endif
            </div>
        </div>

        <!-- Concepts Section List -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                    <span>المفاهيم والدوال المندرجة</span>
                    <span class="px-2.5 py-0.5 text-xs rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-mono">
                        {{ $section->concepts->count() }}
                    </span>
                </h3>
            </div>

            @if ($section->concepts->isEmpty())
                <!-- Empty State -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl border border-dashed border-gray-300 dark:border-gray-700 p-12 text-center space-y-4">
                    <div class="w-16 h-16 mx-auto bg-amber-100 dark:bg-amber-950/50 text-amber-600 dark:text-amber-400 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="space-y-1">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white">لا توجد مفاهيم حتى الآن</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">ابدأ بأول إضافة لهذا القسم لتوثيق الدوال والمفاهيم الخاصة به.</p>
                    </div>
                    <a href="{{ route('concept.create', $section->id) }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold shadow-lg shadow-amber-500/20 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>إضافة أول مفهوم</span>
                    </a>
                </div>
            @else
                <!-- Concepts Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($section->concepts as $concept)
                        <div class="group bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700/60 shadow-md hover:shadow-xl hover:border-amber-500/30 dark:hover:border-amber-500/30 transition-all duration-200 flex flex-col justify-between space-y-4">

                            <!-- Card Header -->
                            <div class="space-y-2">
                                <div class="flex items-center justify-between gap-2">
                                    @if($concept->type === 'function')
                                        <span class="px-2.5 py-0.5 text-xs font-semibold rounded-md bg-teal-100 text-teal-800 dark:bg-teal-900/50 dark:text-teal-300 border border-teal-200 dark:border-teal-700/50 font-mono">
                                            ⚡ function
                                        </span>
                                    @else
                                        <span class="px-2.5 py-0.5 text-xs font-semibold rounded-md bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300 border border-amber-200 dark:border-amber-700/50">
                                            💡 concept
                                        </span>
                                    @endif

                                    @if($concept->return_type)
                                        <code class="text-xs bg-gray-100 dark:bg-gray-900/80 px-2 py-0.5 rounded text-amber-600 dark:text-amber-400 font-mono">
                                            : {{ $concept->return_type }}
                                        </code>
                                    @endif
                                </div>

                                <a href="{{ route('concept.show', $concept->id) }}" class="block">
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors font-mono">
                                        {{ $concept->title }}
                                    </h4>
                                </a>

                                @if($concept->syntax)
                                    <div class="p-2 bg-gray-900 text-amber-300 rounded-lg font-mono text-xs overflow-x-auto truncate">
                                        <code>{{ $concept->syntax }}</code>
                                    </div>
                                @endif

                                <p class="text-xs text-gray-600 dark:text-gray-400 line-clamp-2 leading-relaxed">
                                    {{ Str::limit($concept->description, 120) }}
                                </p>
                            </div>

                            <!-- Card Footer Actions -->
                            <div class="pt-3 border-t border-gray-100 dark:border-gray-700/50 flex items-center justify-between">
                                <a href="{{ route('concept.show', $concept->id) }}"
                                   class="inline-flex items-center gap-1 text-xs font-semibold text-amber-600 dark:text-amber-400 hover:underline">
                                    <span>استعراض المفهوم</span>
                                    <svg class="w-3.5 h-3.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>

                                <div class="flex items-center gap-1">
                                    <!-- Edit Button -->
                                    <a href="{{ route('concept.edit', $concept->id) }}"
                                       class="p-1.5 text-gray-500 hover:text-amber-600 dark:text-gray-400 dark:hover:text-amber-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors"
                                       title="تعديل">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('concept.destroy', $concept->id) }}" method="POST"
                                          onsubmit="return confirm('هل أنت تأكد من رغبتك في حذف هذا المفهوم؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="p-1.5 text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30 rounded-lg transition-colors"
                                                title="حذف">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
