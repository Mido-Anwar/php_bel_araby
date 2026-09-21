<x-master-layout :title="$title ?? 'من نحن - Whiscrashow'">
    <div dir="rtl"
        class="relative overflow-hidden py-16 lg:py-24 px-4 sm:px-6 lg:px-8">

        {{-- خلفية جمالية --}}
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-4xl mx-auto z-10 w-full">

            {{-- Hero --}}
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-800/80 border border-slate-700/60 text-yellow-400 text-xs sm:text-sm font-medium mb-6 shadow-sm backdrop-blur-md">
                    <span class="flex h-2 w-2 rounded-full bg-yellow-400 animate-pulse"></span>
                    عن الموقع
                </div>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight mb-4">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-200">
                        Whiscrashow
                    </span>
                </h1>

                <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                    منصة عربية لتوثيق لغات البرمجة — بدأت كمشروع شخصي، وبقت مرجع لكل مبرمج عربي.
                </p>
            </div>

            {{-- القصة --}}
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8 mb-6">
                <h2 class="text-2xl font-bold text-yellow-400 mb-4">القصة</h2>
                <div class="text-slate-300 space-y-4 leading-relaxed text-sm sm:text-base">
                    <p>
                        بدأت رحلة البرمجة من الصفر — من غير شهادة، ومن غير وسيط، ومن غير أي ضمان. كانت الرحلة صعبة، خصوصًا في البحث عن مصادر عربية موثوقة.
                    </p>
                    <p>
                        كان فيه محتوى إنجليزي كثير، لكن العربي — نادر. واللي موجود بيكون سطحي أو مترجم بشكل ركيك.
                    </p>
                    <p>
                        فكانت البداية: نعمل المكان اللي كنا نفسنا نلاقيه. منصة توثيق عربية شاملة، بمحتوى أصلي وعميق، لكل مبرمج عربي عايز يفهم — مش بس يحفظ.
                    </p>
                </div>
            </div>

            {{-- الرؤية --}}
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8 mb-6">
                <h2 class="text-2xl font-bold text-yellow-400 mb-4">الرؤية</h2>
                <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                    نؤمن إن المحتوى العربي في البرمجة لازم يكون بعمق وجودة تنافس المحتوى الإنجليزي. مش كفاية إننا نترجم — لازم نأصّل. وكل مقال على الموقع مكتوب بحب، وبمعلومات من واقع التجربة.
                </p>
            </div>

            {{-- المهارات --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                <div class="p-5 rounded-xl bg-slate-900/60 border border-slate-800 backdrop-blur-sm">
                    <h3 class="text-yellow-400 font-semibold text-sm mb-2">الخلفية البرمجية</h3>
                    <p class="text-slate-400 text-xs leading-relaxed">PHP, Laravel, MySQL, REST APIs, C, C#</p>
                </div>
                <div class="p-5 rounded-xl bg-slate-900/60 border border-slate-800 backdrop-blur-sm">
                    <h3 class="text-yellow-400 font-semibold text-sm mb-2">هندسة الأنظمة</h3>
                    <p class="text-slate-400 text-xs leading-relaxed">التخزين المؤقت، تحسين الأداء، الـ Architecture</p>
                </div>
                <div class="p-5 rounded-xl bg-slate-900/60 border border-slate-800 backdrop-blur-sm">
                    <h3 class="text-yellow-400 font-semibold text-sm mb-2">الاهتمامات</h3>
                    <p class="text-slate-400 text-xs leading-relaxed">الزراعة الحديثة، الأنظمة المدمجة، المصادر المفتوحة</p>
                </div>
            </div>

            {{-- التواصل --}}
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8 text-center">
                <p class="text-slate-300 text-sm sm:text-base mb-4">عندك سؤال؟ اقتراح؟ عايز تتعاون؟</p>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-yellow-500 hover:bg-yellow-600 text-slate-950 text-sm font-bold transition-all">
                    تواصل معنا
                </a>
            </div>

        </div>
    </div>
</x-master-layout>
