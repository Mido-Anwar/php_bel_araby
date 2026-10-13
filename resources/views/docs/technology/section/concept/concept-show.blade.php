<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $concept->title }}
            </h2>

            <!-- Quick Actions Header Buttons -->
            <div class="flex items-center gap-2">
                <a href="{{ route('section.show', $concept->section) }}"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors">
                    <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>رجوع للمؤشر</span>
                </a>

                <a href="{{ route('concept.edit', $concept) }}"
                    class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-sm font-medium text-amber-600 dark:text-amber-400 bg-amber-50 dark:bg-amber-950/40 hover:bg-amber-100 dark:hover:bg-amber-900/50 rounded-lg border border-amber-200 dark:border-amber-800/50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>تعديل</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 sm:py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

      <main class="lg:col-span-3 space-y-6">

    <!-- Article Card Header & Metadata -->
    <div class="bg-white dark:bg-slate-900 overflow-hidden shadow-xl sm:rounded-2xl border border-slate-200/80 dark:border-slate-800 transition-all">

        <!-- Header Banner -->
        <div class="p-6 sm:p-8 bg-gradient-to-r from-indigo-500/10 via-amber-500/5 to-transparent border-b border-slate-200/80 dark:border-slate-800">
            <div class="flex flex-wrap items-center gap-2 mb-3">
                <!-- Badge Type -->
                @if ($concept->type === 'function')
                    <span class="px-3.5 py-1.5 text-xs font-semibold rounded-full bg-teal-50 text-teal-700 dark:bg-teal-950/60 dark:text-teal-300 border border-teal-200 dark:border-teal-800/60 flex items-center gap-1.5 shadow-sm">
                        ⚡ Built-in Function
                    </span>
                @else
                    <span class="px-3.5 py-1.5 text-xs font-semibold rounded-full bg-amber-50 text-amber-700 dark:bg-amber-950/60 dark:text-amber-300 border border-amber-200 dark:border-amber-800/60 flex items-center gap-1.5 shadow-sm">
                        💡 General Concept
                    </span>
                @endif

                @if ($concept->return_type)
                    <span class="px-3 py-1.5 text-xs font-mono rounded-lg bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-300 border border-slate-200 dark:border-slate-700 shadow-sm" dir="ltr">
                        : {{ $concept->return_type }}
                    </span>
                @endif
            </div>

            <!-- Title with automatic direction handling (Arabic/English) -->
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-tight" dir="auto">
                {{ $concept->title }}
            </h1>
        </div>

        <!-- Syntax Block (Forced LTR for correct code rendering) -->
        @if ($concept->syntax)
            <div class="px-6 py-4 bg-slate-950 text-amber-300 border-b border-slate-800 flex items-center justify-between gap-4 font-mono text-sm sm:text-base overflow-x-auto shadow-inner" dir="ltr">
                <div class="flex items-center gap-3">
                    <span class="text-sm font-bold uppercase tracking-wider text-slate-400 select-none">Syntax</span>
                    <code class="text-amber-400 font-medium">{{ $concept->syntax }}</code>
                </div>
            </div>
        @endif

        <!-- Body Content Article (Auto-direction enabled for multi-language paragraphs) -->
        <div class="p-6 sm:p-8 space-y-6">
            <article class="prose dark:prose-invert max-w-none text-slate-700 dark:text-slate-300 leading-relaxed font-sans" dir="auto">
                {!! $concept->parsed_content !!}
            </article>
        </div>

        <!-- Article Footer Navigation -->
        <div class="px-6 py-4 bg-slate-50 dark:bg-slate-900/50 border-t border-slate-200/80 dark:border-slate-800 flex flex-wrap items-center justify-between gap-3 text-xs sm:text-sm text-slate-500 dark:text-slate-400 font-medium">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>آخر تحديث: {{ $concept->updated_at?->diffForHumans() ?? 'منذ فترة' }}</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                <span>قسم: {{ $concept->section?->name ?? 'عام' }}</span>
            </div>
        </div>
    </div>

</main>

                <!-- Sidebar Meta & Actions (1 Column) -->
                <aside class="space-y-6">

                    <!-- Meta Information Box -->
                    <div
                        class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700/60 space-y-4">
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">
                            تفاصيل المفهوم
                        </h3>

                        <div class="space-y-3 text-sm">
                            <div
                                class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700/40">
                                <span class="text-gray-500 dark:text-gray-400">نوع العنصر</span>
                                <span
                                    class="font-medium text-gray-900 dark:text-white capitalize">{{ $concept->type }}</span>
                            </div>

                            @if ($concept->return_type)
                                <div
                                    class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700/40">
                                    <span class="text-gray-500 dark:text-gray-400">نوع الإرجاع</span>
                                    <code
                                        class="text-xs bg-gray-100 dark:bg-gray-700 px-2 py-0.5 rounded text-amber-600 dark:text-amber-400 font-mono">
                                        {{ $concept->return_type }}
                                    </code>
                                </div>
                            @endif

                            <div
                                class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700/40">
                                <span class="text-gray-500 dark:text-gray-400">تاريخ الإنشاء</span>
                                <span
                                    class="text-gray-700 dark:text-gray-300 text-xs">{{ $concept->created_at?->format('Y-m-d') }}</span>
                            </div>
                        </div>

                        <!-- Management Actions -->
                        <div class="pt-2 space-y-2">
                            <a href="{{ route('concept.edit', $concept) }}"
                                class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-semibold text-sm shadow-lg shadow-amber-500/20 transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>تعديل المفهوم</span>
                            </a>

                            <!-- Delete Option -->
                            <form action="{{ route('concept.destroy', $concept) }}" method="POST"
                                onsubmit="return confirm('هل أنت تأكد من رغبتك في حذف هذا المفهوم؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30 font-medium text-xs transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
