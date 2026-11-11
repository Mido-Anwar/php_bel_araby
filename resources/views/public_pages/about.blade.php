<x-master-layout :title="$title ?? 'من أنا - Whiscrashow'">
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
                    من أنا؟
                </div>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight mb-4">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-200">
                        Whiscrashow
                    </span>
                </h1>

                <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                    أؤمن أن الإنسان لا يتوقف عن النمو ما دام لديه فضول يتعلم، وهدف يسعى إليه، وشغف يدفعه إلى الاستمرار.
                </p>
            </div>

            {{-- قصتي --}}
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8 mb-6">
                <h2 class="text-2xl font-bold text-yellow-400 mb-4">رحلتي</h2>

                <div class="text-slate-300 space-y-4 leading-relaxed text-sm sm:text-base">
                    <p>
                        أنا شخص أؤمن بأن قيمة الإنسان ليست فيما يعرفه اليوم، بل في قدرته على التعلم والتطور وصناعة شيء أفضل مما كان عليه بالأمس.
                        لم تكن رحلتي في البرمجة طريقًا ممهدًا، لكنها كانت اختيارًا نابعًا من حب الاستكشاف والرغبة في فهم كيف تُبنى الأشياء.
                    </p>

                    <p>
                        وجدت في البرمجة عالمًا يجمع بين التفكير والإبداع وحل المشكلات. أحب أن أفهم ما يحدث خلف الشاشات، وأن أحوّل الأفكار إلى تطبيقات وأنظمة حقيقية، ولهذا أواصل التعلم والعمل على تطوير مهاراتي في PHP وLaravel وتقنيات الويب.
                    </p>

                    <p>
                        وبعيدًا عن الشاشات والأسطر البرمجية، أجد متعتي في الزراعة والطبيعة. أحب الأرض والأشجار، وأستمتع برحلة نمو النبات من بذرة صغيرة إلى شجرة تمنح الحياة والظل والثمر. الزراعة تعلمني الصبر، والبرمجة تعلمني التفكير، وكلتاهما تذكرني بأن الأشياء العظيمة تحتاج إلى وقت وعمل واستمرار.
                    </p>
                </div>
            </div>

            {{-- الفلسفة --}}
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8 mb-6">
                <h2 class="text-2xl font-bold text-yellow-400 mb-4">ما أؤمن به</h2>

                <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                    أؤمن أن التعلم رحلة لا تنتهي، وأن المعرفة الحقيقية لا تأتي من الحفظ وحده، بل من الفهم والتجربة والخطأ والمحاولة من جديد.
                    لا أبحث عن أن أكون أفضل من الآخرين، بل أسعى لأن أكون أفضل من نفسي بالأمس.
                    وأؤمن أن العمل المتقن، مهما كانت بدايته بسيطة، يمكن أن يترك أثرًا يستحق البقاء.
                </p>
            </div>

            {{-- الاهتمامات --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">

                <div class="p-5 rounded-xl bg-slate-900/60 border border-slate-800 backdrop-blur-sm">
                    <h3 class="text-yellow-400 font-semibold text-sm mb-2">البرمجة والتقنية</h3>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        PHP، Laravel، قواعد البيانات، تطوير الويب، وهندسة البرمجيات.
                    </p>
                </div>

                <div class="p-5 rounded-xl bg-slate-900/60 border border-slate-800 backdrop-blur-sm">
                    <h3 class="text-yellow-400 font-semibold text-sm mb-2">الزراعة والطبيعة</h3>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        زراعة الأشجار، استصلاح الأراضي، الزراعة المستدامة، والتعامل مع الطبيعة.
                    </p>
                </div>

                <div class="p-5 rounded-xl bg-slate-900/60 border border-slate-800 backdrop-blur-sm">
                    <h3 class="text-yellow-400 font-semibold text-sm mb-2">التعلم والتطوير</h3>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        اكتساب المعرفة، تجربة الأفكار الجديدة، وتطوير المهارات باستمرار.
                    </p>
                </div>

            </div>

            {{-- التواصل --}}
            <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8 text-center">
                <p class="text-slate-300 text-sm sm:text-base mb-4">
                    لكل فكرة بداية، ولكل تجربة فرصة للتعلم. يسعدني التواصل وتبادل المعرفة والأفكار.
                </p>

                <a href="{{ route('contact') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-yellow-500 hover:bg-yellow-600 text-slate-950 text-sm font-bold transition-all">
                    تواصل معي
                </a>
            </div>

        </div>
    </div>
</x-master-layout>
