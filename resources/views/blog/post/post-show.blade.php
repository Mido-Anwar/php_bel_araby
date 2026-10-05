<x-guest-layout>
    {{-- الحاوية الرئيسية للصفحة (Background والـ Padding العام) --}}
    <div dir="rtl"
        class="min-h-[calc(100vh-80px)] py-12 px-4 sm:px-6 lg:px-8 bg-[#090d16] text-slate-100 flex justify-center selection:bg-yellow-500 selection:text-slate-950">

        {{-- خلفية شبكية برمجية خفيفة --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b12_1px,transparent_1px),linear-gradient(to_bottom,#1e293b12_1px,transparent_1px)] bg-[size:3rem_3rem] pointer-events-none"></div>

        {{-- حاوية المقال الرئيسية (Card style) --}}
        <article
            class="relative max-w-4xl w-full bg-slate-900/80 border border-slate-700/70 rounded-3xl p-6 sm:p-10 shadow-xl backdrop-blur-sm">

            {{-- زر العودة للمدونة --}}
            <div class="mb-10">
                <a href="{{ route('blog.main') }}"
                    class="inline-flex items-center gap-2 text-xs sm:text-sm font-medium text-yellow-400 hover:text-yellow-300 transition-colors bg-slate-800/80 px-5 py-2.5 rounded-xl border border-slate-700 shadow-inner group font-mono">
                    <span class="transition-transform group-hover:-translate-x-1">&larr;</span>
                    العودة إلى المدونة
                </a>
            </div>

            {{-- ترويسة المقال (التاريخ، التصنيف، وقت القراءة) --}}
            <header
                class="flex items-center justify-between flex-wrap gap-4 mb-8 text-xs sm:text-sm text-slate-400 border-b border-slate-800/70 pb-6 font-mono">
                <div class="flex items-center gap-3">
                    @if($post->category)
                        <a href="{{ route('blog.category', $post->category->slug) }}"
                            class="px-4 py-1.5 rounded-lg bg-yellow-500/10 text-yellow-400 font-semibold border border-yellow-500/20 hover:bg-yellow-500/20 transition-colors">
                            {{ $post->category->name }}
                        </a>
                    @else
                        <span
                            class="px-4 py-1.5 rounded-lg bg-yellow-500/10 text-yellow-400 font-semibold border border-yellow-500/20">
                            تقنية
                        </span>
                    @endif
                    <span class="text-slate-600">•</span>
                    <time datetime="{{ $post->created_at->toIso8601String() }}">
                        نُشر {{ $post->created_at->diffForHumans() }}
                    </time>
                </div>
                <div class="flex items-center gap-2 text-slate-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $post->reading_time ?? '5 دقائق للقراءة' }}</span>
                </div>
            </header>

            {{-- عنوان المقال الرئيسي --}}
            {{-- تم استخدام دوال مساعدة (helpers) لتحديد اتجاه النص بناءً على محتواه --}}
            <h1 dir="{{ textDir($post->title) }}"
                class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.1] mb-10 font-sans break-words"
                style="text-align: {{ textDir($post->title) == 'rtl' ? 'right' : 'left' }};">
                {{ $post->title }}
            </h1>

            {{-- الصورة البارزة للمقال (Featured Image) --}}
            @if ($post->image)
                <figure
                    class="mb-12 rounded-2xl overflow-hidden border-4 border-slate-800/50 shadow-2xl bg-slate-800/50 aspect-[21/9] flex items-center justify-center group">
                    <img src="{{ asset('storage/' . $post->image->file_path) }}"
                         alt="{{ $post->image->alt_text ?? $post->title }}"
                         loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                </figure>
            @endif

            {{-- محتوى المقال المنسق (باستخدام Tailwind Typography plugin) --}}
            {{-- تم تطبيق التنسيقات المخصصة لهوية Whiscrashow داخل الكلاس prose --}}
            <div
                class="prose prose-invert prose-yellow max-w-none
                text-slate-300 text-base sm:text-lg leading-relaxed
                prose-headings:text-white prose-headings:font-extrabold prose-headings:tracking-tight
                prose-h2:text-3xl prose-h2:mt-12 prose-h2:mb-6
                prose-h3:text-2xl prose-h3:mt-10 prose-h3:mb-5
                prose-p:my-6 prose-p:text-slate-300/90
                prose-strong:text-yellow-300
                prose-ul:my-6 prose-ul:pr-1
                prose-ol:my-6 prose-ol:pr-1
                prose-li:my-2 prose-li:marker:text-yellow-500
                prose-a:text-yellow-400 prose-a:no-underline hover:prose-a:text-yellow-300 hover:prose-a:underline
                prose-blockquote:border-r-4 prose-blockquote:border-yellow-500/70
                prose-blockquote:bg-yellow-500/5 prose-blockquote:py-5 prose-blockquote:pr-6
                prose-blockquote:rounded-r-xl prose-blockquote:text-yellow-200/90 prose-blockquote:font-medium
                prose-img:rounded-2xl prose-img:my-10 prose-img:border-2 prose-img:border-slate-800 prose-img:shadow-xl
                prose-code:text-yellow-300 prose-code:bg-slate-800/70 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded-md prose-code:font-mono prose-code:text-sm
                prose-code:before:content-[''] prose-code:after:content-['']
                prose-pre:bg-[#070a12] prose-pre:border prose-pre:border-slate-800 prose-pre:rounded-2xl prose-pre:p-6 prose-pre:font-mono prose-pre:text-sm
                prose-table:border prose-table:border-slate-700 prose-table:text-sm
                prose-th:bg-slate-800 prose-th:p-4 prose-th:border-b-2 prose-th:border-slate-700
                prose-td:p-4 prose-td:border prose-td:border-slate-800">

                {{-- عرض محتوى المقال المحول من Markdown لـ HTML --}}
                {!! $post->content !!}

            </div>

            {{-- فاصل سفلي وتوقيع المنصة --}}
            <footer
                class="mt-16 pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500 font-mono">
                <span>// تم توثيق هذا المحتوى بواسطة فريق Whiscrashow</span>
                <span class="text-yellow-500/80">جميع الحقوق محفوظة &copy; {{ date('Y') }}</span>
            </footer>

        </article>
    </div>
</x-guest-layout>
