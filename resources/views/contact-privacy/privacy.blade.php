<x-master-layout :title="$title ?? 'سياسة الخصوصية - Whiscrashow'">
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
                    خصوصيتك تهمنا
                </div>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight mb-4">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-200">
                        سياسة الخصوصية
                    </span>
                </h1>
                <p class="text-slate-400 text-sm">آخر تحديث: {{ now()->translatedFormat('F Y') }}</p>
            </div>

            <div class="space-y-6">

                {{-- 1. مقدمة --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">1. مقدمة</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        مرحبًا بك في <strong class="text-white">Whiscrashow</strong> — منصة عربية لتوثيق لغات البرمجة. نحن نأخذ خصوصيتك على محمل الجد. توضح هذه السياسة كيف نجمع ونستخدم ونحمي معلوماتك عند زيارتك لموقعنا. باستخدامك للموقع، فإنك توافق على الممارسات الموضحة في هذه السياسة. إذا كنت لا توافق، يُرجى التوقف عن استخدام الموقع.
                    </p>
                </div>

                {{-- 2. المعلومات اللي بنجمعها --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">2. المعلومات التي نجمعها</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base mb-3">نجمع نوعين من المعلومات:</p>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base mb-2">
                        <strong class="text-white">أ) معلومات تقدمها بنفسك:</strong>
                    </p>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm mb-3">
                        <li>الاسم (عند التواصل معنا).</li>
                        <li>البريد الإلكتروني (للرد على استفساراتك).</li>
                        <li>محتوى الرسالة (عبر نموذج "اتصل بنا").</li>
                    </ul>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base mb-2">
                        <strong class="text-white">ب) معلومات تُجمع تلقائيًا:</strong>
                    </p>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm">
                        <li>عنوان IP.</li>
                        <li>نوع المتصفح ونظام التشغيل.</li>
                        <li>الصفحات التي تزورها ومدة الزيارة.</li>
                        <li>الموقع الجغرافي التقريبي (على مستوى الدولة).</li>
                    </ul>
                </div>

                {{-- 3. استخدام المعلومات --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">3. كيف نستخدم معلوماتك؟</h2>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm">
                        <li>الرد على استفساراتك ورسائلك.</li>
                        <li>تحسين محتوى المنصة وتطوير تجربة التصفح.</li>
                        <li>تحليل استخدام الموقع (إحصائيات مجهولة الهوية).</li>
                        <li>إرسال تحديثات (لو اشتركت في النشرة البريدية).</li>
                        <li>عرض إعلانات ملائمة للزوار (عبر Google AdSense).</li>
                        <li>حماية الموقع من إساءة الاستخدام.</li>
                    </ul>
                </div>

                {{-- 4. الكوكيز --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">4. ملفات تعريف الارتباط (Cookies)</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base mb-3">
                        نستخدم الكوكيز في موقعنا لتحسين تجربتك. وهي ملفات صغيرة تُخزَّن على جهازك. أنواع الكوكيز التي نستخدمها:
                    </p>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm mb-3">
                        <li><strong class="text-white">كوكيز ضرورية:</strong> لجلسة المستخدم وحماية النماذج (CSRF).</li>
                        <li><strong class="text-white">كوكيز تحليلية:</strong> Google Analytics لفهم سلوك الزوار.</li>
                        <li><strong class="text-white">كوكيز إعلانية:</strong> Google AdSense لعرض إعلانات ملائمة.</li>
                    </ul>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        يمكنك تعطيل الكوكيز من إعدادات المتصفح. لكن قد يؤثر ذلك على بعض وظائف الموقع.
                    </p>
                </div>

                {{-- 5. Google AdSense --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">5. إعلانات Google AdSense</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base mb-3">
                        نستخدم خدمة Google AdSense لعرض الإعلانات. تستخدم Google ملف تعريف ارتباط DART لعرض إعلانات ملائمة لك بناءً على زياراتك لموقعنا ومواقع أخرى. يمكنك إلغاء الاشتراك في DART من خلال زيارة:
                        <a href="https://policies.google.com/technologies/ads" target="_blank" rel="noopener"
                            class="text-yellow-400 hover:text-yellow-300 underline" dir="ltr">
                            https://policies.google.com/technologies/ads
                        </a>
                    </p>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        نحن لا نتحكم في محتوى هذه الإعلانات، ولا نتحمل مسؤولية المنتجات أو الخدمات المعروضة فيها.
                    </p>
                </div>

                {{-- 6. مشاركة البيانات --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">6. مشاركة البيانات مع أطراف ثالثة</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base mb-3">
                        <strong class="text-white">لا نبيع أو نؤجر بياناتك الشخصية لأي جهة.</strong>
                        قد نشارك بعض البيانات مع:
                    </p>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm">
                        <li>Google Analytics (إحصائيات مجهولة).</li>
                        <li>Google AdSense (لعرض الإعلانات).</li>
                        <li>الجهات القانونية (عند الطلب الرسمي).</li>
                    </ul>
                </div>

                {{-- 7. الأمان --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">7. أمان البيانات</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        نتخذ إجراءات أمنية تقنية وإدارية مناسبة لحماية بياناتك من الوصول غير المصرح به أو التعديل أو الإفشاء. ومع ذلك، لا يمكن ضمان أمان أي نقل للبيانات عبر الإنترنت بنسبة 100%. ننصحك بعدم مشاركة معلومات حساسة عبر الموقع.
                    </p>
                </div>

                {{-- 8. حقوقك --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">8. حقوقك</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base mb-3">
                        وفقًا للقوانين المعمول بها (مثل GDPR)، لديك الحقوق التالية:
                    </p>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm">
                        <li><strong class="text-white">الحق في الوصول:</strong> معرفة البيانات التي نحتفظ بها عنك.</li>
                        <li><strong class="text-white">الحق في التصحيح:</strong> تعديل البيانات غير الدقيقة.</li>
                        <li><strong class="text-white">الحق في الحذف:</strong> طلب حذف بياناتك.</li>
                        <li><strong class="text-white">الحق في الاعتراض:</strong> على معالجة بياناتك.</li>
                    </ul>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base mt-3">
                        لتطبيق أي من هذه الحقوق، تواصل معنا عبر <a href="{{ route('contact') }}"
                            class="text-yellow-400 hover:text-yellow-300 underline">صفحة اتصل بنا</a>.
                    </p>
                </div>

                {{-- 9. الروابط الخارجية --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">9. الروابط الخارجية</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        قد يحتوي الموقع على روابط لمواقع خارجية. هذه الروابط تُقدَّم للتسهيل فقط. لا نتحمل مسؤولية محتوى أو سياسات هذه المواقع. ننصحك بمراجعة سياسة الخصوصية الخاصة بكل موقع تزوره.
                    </p>
                </div>

                {{-- 10. خصوصية الأطفال --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">10. خصوصية الأطفال</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        موقعنا غير موجه للأطفال تحت 13 عامًا. لا نجمع عن قصد أي معلومات شخصية من الأطفال. إذا اكتشفنا أن طفلاً قدم معلومات شخصية، سنحذفها فورًا.
                    </p>
                </div>

                {{-- 11. التعديلات --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">11. التعديلات على السياسة</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        نحتفظ بالحق في تحديث هذه السياسة في أي وقت. سيتم نشر أي تغييرات على هذه الصفحة مع تحديث تاريخ "آخر تحديث". استمرارك في استخدام الموقع بعد أي تعديل يُعد موافقة ضمنية على السياسة المحدثة.
                    </p>
                </div>

                {{-- 12. التواصل --}}
                <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8">
                    <h2 class="text-xl font-bold text-yellow-400 mb-3">12. التواصل معنا</h2>
                    <p class="text-slate-300 leading-relaxed text-sm sm:text-base">
                        لأي سؤال أو استفسار حول سياسة الخصوصية، يمكنك التواصل معنا عبر:
                    </p>
                    <ul class="list-disc list-inside text-slate-300 space-y-2 text-sm mt-3">
                        <li>صفحة <a href="{{ route('contact') }}" class="text-yellow-400 hover:text-yellow-300 underline">اتصل بنا</a>.</li>
                        <li>البريد الإلكتروني: <a href="mailto:contact@whiscrashow.com" class="text-yellow-400 hover:text-yellow-300" dir="ltr">contact@whiscrashow.com</a></li>
                    </ul>
                </div>

            </div>

            {{-- روابط سريعة --}}
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <a href="{{ route('terms') }}"
                    class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 hover:border-yellow-500/50 transition-all text-center group">
                    <div class="text-yellow-400 font-semibold mb-1 group-hover:text-yellow-300">شروط الاستخدام</div>
                    <div class="text-slate-500 text-xs">اتفاقية استخدام الموقع</div>
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
