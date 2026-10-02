<x-master-layout :title="'Whiscrashow - منصة عربية لتوثيق لغات البرمجة'">

    <div dir="rtl" class="relative overflow-hidden bg-[#090d16] text-slate-100 selection:bg-yellow-500 selection:text-slate-950 font-sans">

        {{-- خلفية شبكية برمجية --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b12_1px,transparent_1px),linear-gradient(to_bottom,#1e293b12_1px,transparent_1px)] bg-[size:3rem_3rem] pointer-events-none"></div>

        {{-- إضاءات خلفية فنية --}}
        <div class="absolute top-12 left-1/2 -translate-x-1/2 w-[500px] h-[300px] bg-yellow-500/10 rounded-full blur-[120px] pointer-events-none"></div>

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 1. Hero Section & Mario/Pixel Retro Arcade --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">

                {{-- عنوان رئيسي بسيط فوق الشاشة الكبيرة --}}
                <div class="text-center max-w-3xl mx-auto mb-10">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-xl bg-slate-900 border border-slate-700/80 text-yellow-400 text-xs sm:text-sm font-mono mb-4 shadow-xl">
                        <span class="inline-block w-2 h-2 bg-yellow-400 animate-pulse"></span>
                        [ ARCADE_MODE: PHP_BACKEND ]
                    </div>
                    <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        أكواد ومستندات برمجية
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-amber-300 to-yellow-500">
                            بروح المطورين الكلاسيكية
                        </span>
                    </h1>
                </div>

                {{-- الشاشة الكبيرة الضخمة (Retro Arcade Terminal) --}}
                <div class="relative rounded-3xl bg-[#0b0f19] border-2 border-yellow-500/30 shadow-[0_0_50px_rgba(234,179,8,0.15)] overflow-hidden">

                    {{-- شريط العلوي للنافذة --}}
                    <div class="flex items-center justify-between px-5 py-3.5 bg-[#111827] border-b border-slate-800">
                        <div class="flex items-center gap-2">
                            <span class="w-3.5 h-3.5 rounded-full bg-red-500 inline-block"></span>
                            <span class="w-3.5 h-3.5 rounded-full bg-yellow-500 inline-block"></span>
                            <span class="w-3.5 h-3.5 rounded-full bg-green-500 inline-block"></span>
                        </div>
                        <div class="text-xs font-mono text-yellow-400 font-bold tracking-widest flex items-center gap-2">
                            <span>🎮</span> WHISCRASHOW_CONSOLE.php
                        </div>
                        <div class="text-xs font-mono text-slate-400 hidden sm:block">FPS: 60 | LVL: PHP</div>
                    </div>

                    {{-- مسار الجري لشخصية البكسل آرت (Animation Track) --}}
                    <div class="relative h-12 bg-[#070a12] border-b border-slate-800/80 overflow-hidden flex items-center">
                        <div class="absolute inset-0 bg-[linear-gradient(90deg,#1e293b33_1px,transparent_1px)] bg-[size:2rem_100%] opacity-30"></div>

                        {{-- شخصية البكسل المتحركة بالجافا سكريبت --}}
                        <div id="pixel-character" class="absolute left-0 text-xl select-none transition-transform duration-75" style="will-change: transform;">
                            🏃‍♂️<span class="text-[10px] font-mono text-yellow-400 bg-slate-950/80 px-1.5 py-0.5 rounded ml-1 border border-slate-800">RUN.PHP</span>
                        </div>
                    </div>

                    {{-- محتوى كود PHP الكبير والواضح --}}
                    <div class="p-6 sm:p-10 font-mono text-xs sm:text-sm leading-relaxed text-slate-300 text-left overflow-x-auto space-y-2 bg-[#090d16]" dir="ltr">
                        <p class="text-slate-500">&lt;?php</p>
                        <p class="text-purple-400">namespace <span class="text-blue-300">App\Core</span>;</p>
                        <br>
                        <p class="text-purple-400">class <span class="text-yellow-400">BackendEngine</span> &#123;</p>
                        <p class="pl-6"><span class="text-purple-400">private</span> <span class="text-yellow-300">$framework</span> = <span class="text-green-300">'Laravel & Custom MVC'</span>;</p>
                        <p class="pl-6"><span class="text-purple-400">private</span> <span class="text-yellow-300">$database</span> = <span class="text-green-300">'MySQL & Eloquent'</span>;</p>
                        <br>
                        <p class="pl-6"><span class="text-purple-400">public function</span> <span class="text-blue-400">compileArticles</span>() &#123;</p>
                        <p class="pl-12"><span class="text-yellow-300">return</span> Post::<span class="text-blue-400">latest</span>()-&gt;<span class="text-blue-400">get</span>();</p>
                        <p class="pl-6">&#125;</p>
                        <p>&#125;</p>
                        <br>
                        <p class="text-yellow-400">$engine = <span class="text-purple-400">new</span> BackendEngine();</p>
                        <p class="text-yellow-400">echo $engine-&gt;compileArticles(); <span class="inline-block w-2.5 h-4 bg-yellow-400 animate-pulse align-middle ml-1"></span></p>
                    </div>

                    {{-- شريط سفلي للأزرار السريعة داخل الشاشة --}}
                    <div class="px-6 py-4 bg-[#070a12] border-t border-slate-800 flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('blog.main') }}"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-yellow-500 hover:bg-yellow-400 text-slate-950 text-xs font-bold transition-all shadow-md font-mono">
                                <span>> تصفّح المقالات</span>
                            </a>
                            <a href="{{ route('blog.main') }}"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 border border-slate-700 text-slate-200 text-xs font-semibold transition-all font-mono">
                                الأرشيف البرمجي
                            </a>
                        </div>
                        <div class="text-xs font-mono text-green-400 font-bold flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-green-500 animate-ping"></span>
                            STATUS: RUNNING
                        </div>
                    </div>

                </div>

            </div>
        </section>

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 2. Latest Posts (مباشرة بدون إحصائيات) --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 border-t border-slate-800/60 bg-slate-900/10">
            <div class="max-w-6xl mx-auto">

                {{-- Header --}}
                <div class="flex items-end justify-between mb-12">
                    <div>
                        <span class="text-yellow-400 font-mono text-xs uppercase tracking-widest block mb-2">// LATEST_ARTICLES</span>
                        <h2 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                            أحدث المقالات المضافة
                        </h2>
                    </div>
                    <a href="{{ route('blog.main') }}"
                        class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-yellow-400 hover:text-yellow-300 transition-colors group font-mono">
                        عرض الكل
                        <svg class="w-4 h-4 rtl:rotate-180 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>

                {{-- Grid --}}
                @if($latestPosts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($latestPosts as $post)
                            <article
                                class="group rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-yellow-500/50 transition-all duration-300 backdrop-blur-md flex flex-col overflow-hidden shadow-xl hover:-translate-y-1.5">

                                {{-- Image --}}
                                <a href="{{ route('blog.show', $post) }}" class="relative block h-52 w-full overflow-hidden bg-slate-950">
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image->file_path) }}"
                                            alt="{{ $post->image->alt_text }}"
                                            loading="lazy"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90 group-hover:opacity-100">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-gradient-to-br from-slate-900 to-slate-950">
                                            <svg class="w-10 h-10 mb-3 text-yellow-500/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                            </svg>
                                            <span class="text-xs font-mono text-slate-400 line-clamp-1">
                                                {{ $post->title }}
                                            </span>
                                        </div>
                                    @endif

                                    <div class="absolute top-3 right-3 bg-slate-950/80 border border-slate-700/60 px-2.5 py-1 rounded-lg text-[10px] font-mono text-yellow-400 backdrop-blur-md">
                                        توثيق برمجي
                                    </div>
                                </a>

                                {{-- Content --}}
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center gap-2 text-xs text-slate-400 mb-3 font-mono">
                                        <svg class="w-3.5 h-3.5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>

                                    <h3 class="text-lg font-bold text-white group-hover:text-yellow-400 transition-colors mb-3 line-clamp-2 leading-snug">
                                        <a href="{{ route('blog.show', $post) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    <p class="text-slate-300 text-sm leading-relaxed mb-6 line-clamp-3 flex-grow font-normal opacity-85">
                                        {{ Str::limit(strip_tags($post->content), 110) }}
                                    </p>

                                    <a href="{{ route('blog.show', $post) }}"
                                        class="inline-flex items-center gap-2 text-xs font-bold text-yellow-400 hover:text-yellow-300 transition-colors pt-4 border-t border-slate-800 font-mono">
                                        <span>اقرأ التفاصيل</span>
                                        <svg class="w-3.5 h-3.5 rtl:rotate-180 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </div>

                            </article>
                        @endforeach
                    </div>

                    <div class="mt-10 text-center sm:hidden">
                        <a href="{{ route('blog.main') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-slate-900 border border-slate-700 text-slate-200 text-sm font-bold font-mono">
                            عرض كل المقالات
                        </a>
                    </div>
                @else
                    <div class="py-20 text-center bg-slate-900/30 rounded-2xl border border-slate-800">
                        <h3 class="text-lg font-bold text-white mb-2 font-mono">لا توجد مقالات منشورة بعد</h3>
                        <p class="text-slate-400 text-sm">انتظرونا قريباً بأحدث الشروحات والأكواد.</p>
                    </div>
                @endif

            </div>
        </section>

        {{-- ═══════════════════════════════════════════ --}}
        {{-- 3. Call To Action --}}
        {{-- ═══════════════════════════════════════════ --}}
        <section class="py-16 lg:py-24 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center bg-gradient-to-br from-slate-900 via-slate-900/90 to-slate-950 border border-slate-800 rounded-3xl p-8 sm:p-14 relative overflow-hidden shadow-2xl">
                <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-500/10 rounded-full blur-[100px] pointer-events-none"></div>

                <div class="relative z-10">
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-white mb-4 tracking-tight">
                        استكشف المزيد من الأكواد والمقالات
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base mb-8 max-w-xl mx-auto leading-relaxed">
                        تصفح الأرشيف الكامل واطلع على الشروحات البرمجية المصممة بعناية لمطوري الباك إند.
                    </p>

                    <a href="{{ route('blog.main') }}"
                        class="inline-flex items-center gap-2.5 px-8 py-4 rounded-xl bg-yellow-500 hover:bg-yellow-400 text-slate-950 text-sm font-bold transition-all shadow-xl shadow-yellow-500/20 hover:scale-105 font-mono">
                        <span>// تصفّح الأرشيف كاملاً</span>
                    </a>
                </div>
            </div>
        </section>

    </div>

    {{-- جافا سكريبت لتحريك شخصية البكسل آرت في مسار الجري --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const runner = document.getElementById("pixel-character");
            if (!runner) return;

            let position = -50;
            let speed = 2.5;

            function animateRunner() {
                const parentWidth = runner.parentElement.clientWidth;
                position += speed;

                if (position > parentWidth + 50) {
                    position = -50;
                }

                runner.style.transform = `translateX(${position}px)`;
                requestAnimationFrame(animateRunner);
            }

            requestAnimationFrame(animateRunner);
        });
    </script>

</x-master-layout>
