<x-master-layout title="Whiscrashow - منصة عربية لتوثيق لغات البرمجة">



    <div dir="rtl"
        class="relative overflow-hidden bg-[#090d16] text-slate-100 selection:bg-yellow-500 selection:text-slate-950 font-sans">

        {{-- خلفية شبكية --}}
        <div aria-hidden="true"
            class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b12_1px,transparent_1px),linear-gradient(to_bottom,#1e293b12_1px,transparent_1px)] bg-[size:3rem_3rem] pointer-events-none">
        </div>

        {{-- إضاءة خلفية --}}
        <div aria-hidden="true"
            class="absolute top-12 left-1/2 -translate-x-1/2 w-[500px] h-[300px] max-w-full bg-yellow-500/10 rounded-full blur-[120px] pointer-events-none">
        </div>

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 1. Hero --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">

                <div class="text-center max-w-3xl mx-auto mb-10">
                    {{-- h1 واحد في الصفحة، وفيه وصف الموقع (أفضل لمحركات البحث) --}}
                    <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        منصة عربية لتوثيق
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-amber-300 to-yellow-500">
                            لغات البرمجة
                        </span>
                    </h1>

                    <p class="mt-5 text-slate-300 text-base sm:text-lg leading-relaxed">
                        شروحات ومقالات تقنية مكتوبة بالعربي، بأمثلة كود جاهزة للتجربة.
                    </p>

                    <blockquote class="mt-8 text-sm sm:text-base text-slate-400 leading-loose">
                        <p>قف دون رأيك في الحياة مجاهداً،</p>
                        <p class="text-yellow-400/90 font-semibold">إن الحياة عقيدة وجهاد.</p>
                    </blockquote>
                </div>

                {{-- شاشة الـ Retro Terminal --}}
                <div
                    class="relative rounded-3xl bg-[#0b0f19] border-2 border-yellow-500/30 shadow-[0_0_50px_rgba(234,179,8,0.15)] overflow-hidden">

                    {{-- الشريط العلوي --}}
                    <div class="flex items-center justify-between px-5 py-3.5 bg-[#111827] border-b border-slate-800"
                        dir="ltr">
                        <div class="flex items-center gap-2" aria-hidden="true">
                            <span class="w-3.5 h-3.5 rounded-full bg-red-500 inline-block"></span>
                            <span class="w-3.5 h-3.5 rounded-full bg-yellow-500 inline-block"></span>
                            <span class="w-3.5 h-3.5 rounded-full bg-green-500 inline-block"></span>
                        </div>
                        <div class="text-xs font-mono text-yellow-400 font-bold tracking-widest flex items-center gap-2">
                            <span aria-hidden="true">🎮</span> WHISCRASHOW_CONSOLE.php
                        </div>
                        <div class="text-xs font-mono text-slate-400 hidden sm:block">FPS: 60 | LVL: PHP</div>
                    </div>



                    {{-- فقرة تعريفية بنفس تنسيق شاشة التيرمنال --}}
                    <div class="p-6 sm:p-10 bg-[#090d16]" dir="rtl">
                        <p class="text-base sm:text-lg leading-loose text-slate-300 max-w-3xl">
                            أهلاً بك في <span class="text-yellow-400 font-bold">Whiscrashow</span>،
                            مكان عربي بسيط لتوثيق لغات البرمجة. هنا بنشرح
                            <span class="text-purple-400 font-semibold">PHP</span> و<span
                                class="text-blue-400 font-semibold">Laravel</span> و<span
                                class="text-purple-400 font-semibold">JavaScript</span> خطوة بخطوة،
                            بـ<span class="text-green-300">أمثلة كود واضحة</span> تقدر تنسخها وتجربها بنفسك.<span
                                class="whis-cursor inline-block w-2.5 h-5 bg-yellow-400 animate-pulse align-middle mr-1"></span>
                        </p>
                    </div>


                    {{-- الشريط السفلي --}}
                    <div
                        class="px-6 py-4 bg-[#070a12] border-t border-slate-800 flex flex-wrap items-center justify-between gap-4">

                        <div class="text-xs font-mono text-green-400 font-bold flex items-center gap-2" dir="ltr">
                            <span class="relative flex w-2 h-2" aria-hidden="true">
                                <span
                                    class="whis-ping absolute inline-flex w-full h-full rounded-full bg-green-500 opacity-75 animate-ping"></span>
                                <span class="relative inline-flex w-2 h-2 rounded-full bg-green-500"></span>
                            </span>
                            STATUS: RUNNING
                        </div>

                        <a href="{{ route('blog.main') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-yellow-500 hover:bg-yellow-400 text-slate-950 text-sm font-bold transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-yellow-300 focus-visible:ring-offset-2 focus-visible:ring-offset-[#070a12]">
                            ابدأ بتصفح المقالات
                        </a>
                    </div>

                </div>
            </div>
        </section>

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 2. أحدث المقالات --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="relative py-20 px-4 sm:px-6 lg:px-8 border-t border-slate-800/60 bg-slate-900/10">
            <div class="max-w-6xl mx-auto">

                <div class="flex items-end justify-between mb-12">
                    <div>
                        <span class="text-yellow-400 font-mono text-xs tracking-widest block mb-2" dir="ltr">//
                            LATEST_ARTICLES</span>
                        <h2 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                            أحدث المقالات المضافة
                        </h2>
                    </div>

                    <a href="{{ route('blog.main') }}"
                        class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-yellow-400 hover:text-yellow-300 transition-colors group focus:outline-none focus-visible:ring-2 focus-visible:ring-yellow-400 rounded">
                        عرض الكل
                        <svg class="w-4 h-4 rtl:rotate-180 transform group-hover:-translate-x-1 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>

                @forelse ($latestPosts as $post)
                    @if ($loop->first)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @endif

                    <article
                        class="group rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-yellow-500/50 transition-all duration-300 flex flex-col overflow-hidden shadow-xl hover:-translate-y-1.5">

                        {{-- الصورة --}}
                        <a href="{{ route('blog.show', $post) }}" tabindex="-1" aria-hidden="true"
                            class="relative block h-52 w-full overflow-hidden bg-slate-950">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image->file_path) }}"
                                    alt="{{ $post->image->alt_text ?: $post->title }}" loading="lazy" width="640"
                                    height="416"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90 group-hover:opacity-100">
                            @else
                                <div
                                    class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-gradient-to-br from-slate-900 to-slate-950">
                                    <svg class="w-10 h-10 mb-3 text-yellow-500/60" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                    <span class="text-xs text-slate-400 line-clamp-1">{{ $post->title }}</span>
                                </div>
                            @endif

                            <span
                                class="absolute top-3 right-3 bg-slate-950/80 border border-slate-700/60 px-2.5 py-1 rounded-lg text-[10px] text-yellow-400 backdrop-blur-md">
                                توثيق برمجي
                            </span>
                        </a>

                        {{-- المحتوى --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                                <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <time datetime="{{ $post->created_at->toIso8601String() }}">
                                    {{ $post->created_at->diffForHumans() }}
                                </time>
                            </div>

                            <h3
                                class="text-lg font-bold text-white group-hover:text-yellow-400 transition-colors mb-3 line-clamp-2 leading-snug">
                                <a href="{{ route('blog.show', $post) }}"
                                    class="focus:outline-none focus-visible:underline">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <p class="text-slate-300 text-sm leading-relaxed mb-6 line-clamp-3 flex-grow">
                                {{ Str::limit(strip_tags($post->content), 110) }}
                            </p>

                            <a href="{{ route('blog.show', $post) }}"
                                class="inline-flex items-center gap-2 text-xs font-bold text-yellow-400 hover:text-yellow-300 transition-colors pt-4 border-t border-slate-800 focus:outline-none focus-visible:underline">
                                <span>اقرأ المقال</span>
                                <svg class="w-3.5 h-3.5 rtl:rotate-180 transform group-hover:-translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </article>

                    @if ($loop->last)
                        </div>

                        <div class="mt-10 text-center sm:hidden">
                            <a href="{{ route('blog.main') }}"
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-200 text-sm font-bold">
                                عرض كل المقالات
                            </a>
                        </div>
                    @endif
                @empty
                    <div class="py-20 text-center bg-slate-900/30 rounded-2xl border border-slate-800">
                        <h3 class="text-lg font-bold text-white mb-2">لا توجد مقالات منشورة بعد</h3>
                        <p class="text-slate-400 text-sm">أول الشروحات والأكواد جاية قريب.</p>
                    </div>
                @endforelse

            </div>
        </section>

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 3. دعوة للتصفح --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="relative py-16 lg:py-24 px-4 sm:px-6 lg:px-8">
            <div
                class="max-w-4xl mx-auto text-center bg-gradient-to-br from-slate-900 via-slate-900/90 to-slate-950 border border-slate-800 rounded-3xl p-8 sm:p-14 relative overflow-hidden shadow-2xl">
                <div aria-hidden="true"
                    class="absolute top-0 right-0 w-64 h-64 bg-yellow-500/10 rounded-full blur-[100px] pointer-events-none">
                </div>

                <div class="relative z-10">
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-white mb-4 tracking-tight">
                        استكشف المزيد من الأكواد والمقالات
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base mb-8 max-w-xl mx-auto leading-relaxed">
                        تصفح الأرشيف كامل، وشوف الشروحات البرمجية المكتوبة بعناية لمطوري الباك إند.
                    </p>

                    <a href="{{ route('blog.main') }}"
                        class="inline-flex items-center gap-2.5 px-8 py-4 rounded-xl bg-yellow-500 hover:bg-yellow-400 text-slate-950 text-sm font-bold transition-all shadow-xl shadow-yellow-500/20 hover:scale-105 focus:outline-none focus-visible:ring-2 focus-visible:ring-yellow-300 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                        تصفّح الأرشيف كاملاً
                    </a>
                </div>
            </div>
        </section>

    </div>

</x-master-layout>
