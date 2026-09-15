<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $concept->title }}
            </h2>

            <!-- Quick Actions Header Buttons -->
            <div class="flex items-center gap-2">
                <a href="{{ route('section.show', $concept->section_id) }}"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                    <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>رجوع للمؤشر</span>
                </a>

                <a href="{{ route('concept.edit', $concept->id) }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-sm font-medium text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-amber-950/40 hover:bg-amber-100 dark:hover:bg-amber-900/50 rounded-lg border border-amber-200 dark:border-amber-800/50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    <span>تعديل</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                <!-- Main Article Content (3 Columns on Large Screens) -->
                <main class="lg:col-span-3 space-y-6">

                    <!-- Article Card Header & Metadata -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700/60 transition-all">

                        <!-- Header Banner -->
                        <div class="p-6 sm:p-8 bg-gradient-to-r from-amber-500/10 via-amber-500/5 to-transparent border-b border-gray-100 dark:border-gray-700/60">
                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <!-- Badge Type -->
                                @if($concept->type === 'function')
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-teal-100 text-teal-800 dark:bg-teal-900/50 dark:text-teal-300 border border-teal-200 dark:border-teal-700/50">
                                        ⚡ Built-in Function
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300 border border-amber-200 dark:border-amber-700/50">
                                        💡 General Concept
                                    </span>
                                @endif

                                @if($concept->return_type)
                                    <span class="px-2.5 py-1 text-xs font-mono rounded-md bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                                        : {{ $concept->return_type }}
                                    </span>
                                @endif
                            </div>

                            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 dark:text-white tracking-tight leading-tight">
                                {{ $concept->title }}
                            </h1>
                        </div>

                        <!-- Syntax Block (Shown if available) -->
                        @if($concept->syntax)
                            <div class="px-6 py-4 bg-gray-900 text-amber-300 border-b border-gray-800 flex items-center justify-between gap-4 font-mono text-sm sm:text-base overflow-x-auto">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs uppercase tracking-wider text-gray-500 select-none">Syntax</span>
                                    <code class="text-amber-400 font-medium">{{ $concept->syntax }}</code>
                                </div>
                            </div>
                        @endif

                        <!-- Body Content Article -->
                        <div class="p-6 sm:p-8 space-y-6">
                            <article class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300 leading-relaxed font-sans">
                                {!! nl2br(e($concept->description)) !!}
                            </article>
                        </div>

                        <!-- Article Footer Navigation -->
                        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-800/50 border-t border-gray-100 dark:border-gray-700/60 flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                            <span>آخر تحديث: {{ $concept->updated_at?->diffForHumans() ?? 'منذ فترة' }}</span>
                            <span>قسم: {{ $concept->section?->name ?? 'عام' }}</span>
                        </div>
                    </div>

                </main>

                <!-- Sidebar Meta & Actions (1 Column) -->
                <aside class="space-y-6">

                    <!-- Meta Information Box -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700/60 space-y-4">
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                            تفاصيل المفهوم
                        </h3>

                        <div class="space-y-3 text-sm">
                            <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700/40">
                                <span class="text-gray-500 dark:text-gray-400">نوع العنصر</span>
                                <span class="font-medium text-gray-900 dark:text-white capitalize">{{ $concept->type }}</span>
                            </div>

                            @if($concept->return_type)
                                <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700/40">
                                    <span class="text-gray-500 dark:text-gray-400">نوع الإرجاع</span>
                                    <code class="text-xs bg-gray-100 dark:bg-gray-700 px-2 py-0.5 rounded text-amber-600 dark:text-amber-400 font-mono">
                                        {{ $concept->return_type }}
                                    </code>
                                </div>
                            @endif

                            <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700/40">
                                <span class="text-gray-500 dark:text-gray-400">تاريخ الإنشاء</span>
                                <span class="text-gray-700 dark:text-gray-300 text-xs">{{ $concept->created_at?->format('Y-m-d') }}</span>
                            </div>
                        </div>

                        <!-- Management Actions -->
                        <div class="pt-2 space-y-2">
                            <a href="{{ route('concept.edit', $concept->id) }}"
                               class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-semibold text-sm shadow-lg shadow-amber-500/20 transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                <span>تعديل المفهوم</span>
                            </a>

                            <!-- Delete Option -->
                            <form action="{{ route('concept.destroy', $concept->id) }}" method="POST" onsubmit="return confirm('هل أنت تأكد من رغبتك في حذف هذا المفهوم؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30 font-medium text-xs transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    <span>حذف المفهوم</span>
                                </button>
                            </form>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</x-app-layout>
