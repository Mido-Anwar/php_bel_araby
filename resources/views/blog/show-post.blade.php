<x-master-layout :title="$post->title">
    <div dir="rtl"
        class="min-h-[calc(100vh-80px)] py-12 px-4 sm:px-6 lg:px-8 bg-slate-950 text-slate-100 flex justify-center">

        <!-- حاوية المقال الرئيسية -->
        <article
            class="max-w-4xl w-full bg-slate-900/80 border border-slate-700/70 rounded-3xl p-6 sm:p-10 shadow-xl backdrop-blur-sm">

            <!-- زر العودة للرئيسية أو المدونة -->
            <div class="mb-8">
                <a href="{{ route('blog.main') }}"
                    class="inline-flex items-center gap-2 text-xs sm:text-sm font-medium text-yellow-400 hover:text-yellow-300 transition-colors bg-slate-800/80 px-4 py-2 rounded-full border border-slate-700">
                    &larr; العودة إلى المدونة
                </a>
            </div>

            <!-- معلومات المقال (التاريخ / التصنيف) -->
            <div
                class="flex items-center justify-between flex-wrap gap-4 mb-6 text-xs sm:text-sm text-slate-400 border-b border-slate-800 pb-4">
                <div class="flex items-center gap-2">
                    <span
                        class="px-3 py-1 rounded-md bg-yellow-500/10 text-yellow-400 font-medium border border-yellow-500/20">
                        {{ $post->category->name ?? 'تقنية' }}
                    </span>
                    <span>•</span>
                    <span>نُشر {{ $post->created_at->diffForHumans() }}</span>
                </div>
                <span>{{ $post->reading_time ?? '5 دقائق للقراءة' }}</span>
            </div>

            <!-- عنوان المقال مع دعم الاتجاه الذكي -->
            <h1 dir="{{ textDir($post->title) }}"
                style="align-self: {{ textDir($post->title) == 'rtl' ? 'flex-start' : 'flex-end' }};"
                class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight mb-8">
                {{ $post->title }}
            </h1>

            <!-- صورة المقال البارزة (Featured Image) -->
            @if ($post->image)
                <div
                    class="mb-10 rounded-2xl overflow-hidden border border-slate-800 shadow-lg bg-slate-800 max-h-[500px] flex items-center justify-center">
                    <img src="{{ asset('storage/' . $post->image->file_path) }}" alt="{{ $post->image->alt_text }}"
                        loading="lazy" class="w-full h-auto rounded-lg object-cover">
                </div>
            @endif
            <div
                class="prose prose-invert prose-yellow max-w-none
    text-slate-300 text-base sm:text-lg leading-loose
    prose-headings:text-yellow-400 prose-headings:font-bold
    prose-h2:text-2xl prose-h2:mt-8 prose-h2:mb-4
    prose-h3:text-xl prose-h3:mt-6 prose-h3:mb-3
    prose-p:my-4
    prose-ul:my-4 prose-ul:pr-6
    prose-ol:my-4 prose-ol:pr-6
    prose-li:my-1
    prose-blockquote:border-r-4 prose-blockquote:border-yellow-400
    prose-blockquote:pr-4 prose-blockquote:italic

    /* تخصيص الأكواد الصغيرة داخل السطر (Inline Code) */
    prose-code:text-yellow-300 prose-code:bg-slate-800 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:before:content-[''] prose-code:after:content-['']

    /* إلغاء خلفية الـ pre الافتراضية لترك المجال لثيم Prism */
    prose-pre:bg-transparent prose-pre:p-0 prose-pre:m-0

    prose-a:text-yellow-400 prose-a:underline
    prose-img:rounded-xl prose-img:my-6
    prose-table:border prose-table:border-slate-700
    prose-th:bg-slate-800 prose-th:p-3
    prose-td:p-3 prose-td:border prose-td:border-slate-700">
                {!! $post->parsed_content !!}
            </div>

            <!-- فاصل سفلي -->
            <div class="mt-12 pt-8 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                <span>منصة Whiscrashow</span>
                <span class="text-yellow-400">جميع الحقوق محفوظة &copy; {{ date('Y') }}</span>
            </div>

        </article>
    </div>
</x-master-layout>
