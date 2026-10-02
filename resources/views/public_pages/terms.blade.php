<x-master-layout :title="$title ?? 'شروط الاستخدام - Whiscrashow'">
    <div dir="rtl"
        class="relative overflow-hidden py-16 lg:py-24 px-4 sm:px-6 lg:px-8">

        {{-- خلفية جمالية --}}
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-4xl mx-auto z-10 w-full">

            {{-- رأس الصفحة --}}
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-800/80 border border-slate-700/60 text-yellow-400 text-xs sm:text-sm font-medium mb-6 shadow-sm backdrop-blur-md">
                    <span class="flex h-2 w-2 rounded-full bg-yellow-400 animate-pulse"></span>
                    اتفاقية قانونية
                </div>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight mb-4">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-200">
                        شروط الاستخدام
                    </span>
                </h1>
                <p class="text-slate-400 text-sm">آخر تحديث: {{ now()->translatedFormat('F Y') }}</p>
            </div>

            <div class="space-y-6">

                {{-- 1. مقدمة --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">1. مقدمة</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        مرحبًا بك في <strong class="text-white">Whiscrashow</strong>. باستخدامك لهذا الموقع، فإنك توافق على الالتزام بالشروط والأحكام الموضحة في هذه الصفحة. نرجو منك قراءتها بعناية قبل استخدام الموقع. إذا كنت لا توافق على أي من هذه الشروط، يُرجى التوقف عن استخدام الموقع فورًا.
                    </p>
                </div>

                {{-- 2. التعريفات --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">2. التعريفات</h2>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm">
                        <li><strong class="text-white">"الموقع":</strong> يُقصد به منصة Whiscrashow وكل ما يتعلق بها من صفحات ومحتوى وخدمات.</li>
                        <li><strong class="text-white">"المستخدم":</strong> أي شخص يقوم بالوصول إلى الموقع أو استخدامه بأي شكل.</li>
                        <li><strong class="text-white">"المحتوى":</strong> جميع المقالات والشروحات والأكواد والصور والملفات المتاحة على الموقع.</li>
                    </ul>
                </div>

                {{-- 3. قبول الشروط --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">3. قبول الشروط</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        باستخدامك للموقع، فإنك تقر بأنك قرأت هذه الشروط وفهمتها ووافقت عليها بالكامل. نحتفظ بالحق في تعديل هذه الشروط في أي وقت دون إشعار مسبق. استمرارك في استخدام الموقع بعد أي تعديل يُعد موافقة ضمنية على الشروط المحدثة.
                    </p>
                </div>

                {{-- 4. استخدام الموقع --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">4. قواعد استخدام الموقع</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base mb-3">عند استخدامك للموقع، تتعهد بعدم القيام بالآتي:</p>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm">
                        <li>نسخ أو إعادة نشر المحتوى بشكل كامل دون إذن كتابي مسبق.</li>
                        <li>استخدام الموقع لأي غرض غير قانوني.</li>
                        <li>محاولة اختراق الموقع أو الوصول لبيانات المستخدمين.</li>
                        <li>نشر أي محتوى ضار أو مسيء أو مخالف للأخلاق العامة.</li>
                        <li>استخدام أدوات آلية (Bots, Scrapers) لسحب المحتوى بشكل مكثف.</li>
                        <li>انتحال شخصية الموقع أو أي جهة أخرى.</li>
                    </ul>
                </div>

                {{-- 5. الملكية الفكرية --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">5. الملكية الفكرية</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        جميع المحتويات المنشورة على الموقع — من مقالات، وأكواد، وتصاميم، وشعارات — هي ملك خاص بـ <strong class="text-white">Whiscrashow</strong>، وتخضع لحقوق النشر والملكية الفكرية. لا يُسمح بإعادة استخدامها أو توزيعها دون إذن كتابي مسبق. يمكنك الاستفادة من المحتوى للأغراض التعليمية والشخصية، مع الإشارة إلى المصدر عند الاقتباس.
                    </p>
                </div>

                {{-- 6. المحتوى الخارجي --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">6. المحتوى الخارجي والروابط</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        قد يحتوي الموقع على روابط لمواقع خارجية. هذه الروابط تُقدَّم للتسهيل فقط، ولا نتحمل أي مسؤولية عن محتواها أو سياساتها. استخدامك لهذه المواقع يكون على مسؤوليتك الشخصية.
                    </p>
                </div>

                {{-- 7. الإعلانات --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">7. الإعلانات</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        قد يعرض الموقع إعلانات من شبكات إعلانية مثل Google AdSense. نحن لا نتحكم في محتوى هذه الإعلانات، ولا نتحمل مسؤولية المنتجات أو الخدمات المعروضة فيها. أي تعامل مع المعلنين يكون على مسؤوليتك الخاصة.
                    </p>
                </div>

                {{-- 8. إخلاء المسؤولية --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">8. إخلاء المسؤولية</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        يُقدَّم المحتوى على الموقع <strong class="text-white">"كما هو"</strong> دون أي ضمانات صريحة أو ضمنية. لا نتحمل أي مسؤولية عن أي أضرار مباشرة أو غير مباشرة ناتجة عن استخدامك للموقع. على الرغم من حرصنا على دقة المعلومات، قد تحدث أخطاء، ونرجو التحقق من المعلومات الهامة من مصادر رسمية.
                    </p>
                </div>

                {{-- 9. حدود المسؤولية --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">9. حدود المسؤولية</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        في حدود ما يسمح به القانون، لا يتحمل الموقع أو صاحبه أي مسؤولية عن أي خسائر أو أضرار — مباشرة أو غير مباشرة — تنشأ عن استخدام الموقع أو عدم القدرة على استخدامه.
                    </p>
                </div>

                {{-- 10. إنهاء الخدمة --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">10. إنهاء الخدمة</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        نحتفظ بالحق في تعليق أو إنهاء وصول أي مستخدم للموقع — بشكل مؤقت أو دائم — دون إشعار مسبق، في حال مخالفة هذه الشروط أو لأي سبب آخر نراه مناسبًا.
                    </p>
                </div>

                {{-- 11. القانون المعمول به --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">11. القانون المعمول به</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        تخضع هذه الشروط وتُفسَّر وفقًا للقوانين المعمول بها في <strong class="text-white">جمهورية مصر العربية</strong>. أي نزاع ينشأ عن استخدام الموقع يكون من اختصاص المحاكم المصرية.
                    </p>
                </div>

                {{-- 12. التواصل --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">12. التواصل معنا</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        لأي سؤال أو استفسار حول هذه الشروط، يمكنك التواصل معنا عبر:
                    </p>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm mt-3">
                        <li>صفحة <a href="{{ route('contact') }}" class="text-yellow-400 hover:text-yellow-300 underline">اتصل بنا</a>.</li>
                        <li>البريد الإلكتروني: <a href="mailto:contact@whiscrashow.com" class="text-yellow-400 hover:text-yellow-300" dir="ltr">contact@whiscrashow.com</a></li>
                    </ul>
                </div>

            </div>

            {{-- روابط سريعة --}}
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <a href="{{ route('privacy') }}"
                    class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 hover:border-yellow-500/50 transition-all text-center group">
                    <div class="text-yellow-400 font-semibold mb-1 group-hover:text-yellow-300">سياسة الخصوصية</div>
                    <div class="text-slate-500 text-xs">اعرف إزاي بنحمي بياناتك</div>
                </a>
                <a href="{{ route('contact') }}"
                    class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 hover:border-yellow-500/50 transition-all text-center group">
                    <div class="text-yellow-400 font-semibold mb-1 group-hover:text-yellow-300">اتصل بنا</div>
                    <div class="text-slate-500 text-xs">تواصل معنا</div>
                </a>
                <a href="{{ route('about') }}"
                    class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 hover:border-yellow-500/50 transition-all text-center group">
                    <div class="text-yellow-400 font-semibold mb-1 group-hover:text-yellow-300">من نحن</div>
                    <div class="text-slate-500 text-xs">اعرف أكتر عن Whiscrashow</div>
                </a>
            </div>

        </div>
    </div>
</x-master-layout>
