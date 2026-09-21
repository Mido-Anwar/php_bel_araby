<x-master-layout :title="'Whiscrashow - منصة عربية لتوثيق لغات البرمجة'">

    <div dir="rtl" class="relative overflow-hidden">

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 1. Hero Section --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="relative py-16 lg:py-24 px-4 sm:px-6 lg:px-8">

            {{-- خلفية جمالية --}}
            <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative max-w-5xl mx-auto text-center z-10">

                {{-- شارة --}}
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-800/80 border border-slate-700/60 text-yellow-400 text-xs sm:text-sm font-medium mb-6 shadow-sm backdrop-blur-md">
                    <span class="flex h-2 w-2 rounded-full bg-yellow-400 animate-pulse"></span>
                    منصة عربية لتوثيق لغات البرمجة
                </div>

                {{-- العنوان --}}
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6">
                    تعلّم البرمجة
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-200">
                        بالعربي
                    </span>
                </h1>

                {{-- الوصف --}}
                <p class="text-base sm:text-lg lg:text-xl text-slate-300 max-w-2xl mx-auto leading-relaxed mb-10">
                    مقالات عميقة، وشروحات أصلية، وتوثيق شامل للغات البرمجة — كل ده بالعربي، وبجودة تنافس المحتوى الإنجليزي.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('blog.main') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-yellow-500 hover:bg-yellow-600 text-slate-950 text-sm font-bold transition-all shadow-lg shadow-yellow-500/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        تصفّح المقالات
                    </a>
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-slate-800/80 hover:bg-slate-700 border border-slate-700 text-slate-200 text-sm font-bold transition-all">
                        اعرف أكتر
                    </a>
                </div>

            </div>
        </section>

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 2. Stats Section --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="py-12 px-4 sm:px-6 lg:px-8 border-y border-slate-800/60 bg-slate-900/40">
            <div class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6">

                {{-- Stats: Articles --}}
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-extrabold text-yellow-400 mb-1">
                        {{ $stats['posts'] }}+
                    </div>
                    <div class="text-xs sm:text-sm text-slate-400">مقال</div>
                </div>

                {{-- Stats: Technologies --}}
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-extrabold text-yellow-400 mb-1">
                        {{ $stats['technologies'] }}
                    </div>
                    <div class="text-xs sm:text-sm text-slate-400">تقنية</div>
                </div>

                {{-- Stats: Sections --}}
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-extrabold text-yellow-400 mb-1">
                        {{ $stats['sections'] }}
                    </div>
                    <div class="text-xs sm:text-sm text-slate-400">قسم</div>
                </div>

                {{-- Stats: Concepts --}}
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-extrabold text-yellow-400 mb-1">
                        {{ $stats['concepts'] }}
                    </div>
                    <div class="text-xs sm:text-sm text-slate-400">مفهوم</div>
                </div>

            </div>
        </section>

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 3. Latest Posts --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="py-16 lg:py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">

                {{-- Header --}}
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-2">
                            أحدث المقالات
                        </h2>
                        <p class="text-slate-400 text-sm">
                            مقالات تقنية عميقة — بالعربي
                        </p>
                    </div>
                    <a href="{{ route('blog.main') }}"
                        class="hidden sm:inline-flex items-center gap-2 text-sm text-yellow-400 hover:text-yellow-300 transition-colors">
                        عرض الكل
                        <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>

                {{-- Grid --}}
                @if($latestPosts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($latestPosts as $post)
                            <article
                                class="group rounded-2xl bg-slate-900/60 border border-slate-800/80 hover:border-yellow-500/40 transition-all duration-300 backdrop-blur-sm flex flex-col overflow-hidden">

                                {{-- Image --}}
                                <a href="{{ route('blog.show', $post) }}" class="relative block h-48 w-full overflow-hidden bg-slate-800">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image->file_path) }}"
                                            alt="{{ $post->image->alt_text }}"
                                            loading="lazy"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-gradient-to-br from-slate-800 to-slate-900">
                                            <svg class="w-12 h-12 mb-3 text-yellow-500/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                            </svg>
                                            <span class="text-sm font-bold text-slate-400 line-clamp-2">
                                                {{ $post->title }}
                                            </span>
                                        </div>
                                    @endif
                                </a>

                                {{-- Content --}}
                                <div class="p-6 flex flex-col flex-grow">
                                    {{-- Date --}}
                                    <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>

                                    {{-- Title --}}
                                    <h3 class="text-lg font-bold text-white group-hover:text-yellow-400 transition-colors mb-3 line-clamp-2">
                                        <a href="{{ route('blog.show', $post) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    {{-- Excerpt --}}
                                    <p class="text-slate-400 text-sm leading-relaxed mb-4 line-clamp-3 flex-grow">
                                        {{ Str::limit(strip_tags($post->content), 100) }}
                                    </p>

                                    {{-- Read More --}}
                                    <a href="{{ route('blog.show', $post) }}"
                                        class="inline-flex items-center gap-1 text-xs font-semibold text-yellow-400 hover:text-yellow-300 transition-colors pt-4 border-t border-slate-800/60">
                                        اقرأ المقال
                                        <svg class="w-3 h-3 rtl:rotate-180 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>

                            </article>
                        @endforeach
                    </div>

                    {{-- View All (Mobile) --}}
                    <div class="mt-8 text-center sm:hidden">
                        <a href="{{ route('blog.main') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-slate-800/80 hover:bg-slate-700 border border-slate-700 text-slate-200 text-sm font-bold transition-all">
                            عرض كل المقالات
                        </a>
                    </div>
                @else
                    {{-- Empty State --}}
                    <div class="py-16 text-center bg-slate-900/40 rounded-2xl border border-slate-800">
                        <svg class="w-16 h-16 mx-auto mb-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        <h3 class="text-lg font-bold text-white mb-2">لا توجد مقالات بعد</h3>
                        <p class="text-slate-400 text-sm">تابعنا قريبًا — بنجهّز محتوى جديد.</p>
                    </div>
                @endif

            </div>
        </section>

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 4. CTA Section --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="py-16 lg:py-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center bg-gradient-to-br from-slate-900 to-slate-900/50 border border-slate-800 rounded-3xl p-8 sm:p-12 relative overflow-hidden">

                {{-- Background Glow --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative">
                    <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">
                        عايز تتعلم البرمجة صح؟
                    </h2>
                    <p class="text-slate-400 text-sm sm:text-base mb-8 max-w-xl mx-auto leading-relaxed">
                        كل المقالات على الموقع مكتوبة بحب، وبمعلومات من واقع التجربة.
                        ابدأ رحلتك دلوقتي.
                    </p>

                    <a href="{{ route('blog.main') }}"
                        class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-yellow-500 hover:bg-yellow-600 text-slate-950 text-sm font-bold transition-all shadow-lg shadow-yellow-500/20">
                        ابدأ التعلم الآن
                        <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>

            </div>
        </section>

    </div>

</x-master-layout>
