<x-guest-layout>
    {{-- الحاوية الرئيسية الواسعة مع السماح بالتمرير الحر --}}
    <div dir="rtl"
        class="py-12 px-4 sm:px-6 lg:px-12 bg-[#090d16] text-slate-100 flex justify-center items-start selection:bg-yellow-500 selection:text-slate-950 relative min-h-screen">

        {{-- خلفية شبكية برمجية خفيفة --}}
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b12_1px,transparent_1px),linear-gradient(to_bottom,#1e293b12_1px,transparent_1px)] bg-[size:3rem_3rem] pointer-events-none">
        </div>

        {{-- حاوية المقال الرئيسية الواسعة --}}
        <article
            class="relative max-w-6xl w-full bg-[#0b0f19] border border-slate-800/80 rounded-3xl p-6 sm:p-12 lg:p-16 shadow-[0_0_60px_rgba(0,0,0,0.6)] backdrop-blur-sm z-10">

            {{-- ترويسة المقال --}}
            <header
                class="flex items-center justify-between flex-wrap gap-4 mb-8 text-xs sm:text-sm text-slate-400 border-b border-slate-800 pb-6 font-mono">
                <div class="flex items-center gap-3">
                    @if ($post->category)
                        <span class="px-4 py-1.5 rounded-lg bg-yellow-500/10 text-yellow-400 font-semibold border border-yellow-500/20">
                            {{ $post->category->name }}
                        </span>
                    @endif
                    <span class="text-slate-700">•</span>
                    <time datetime="{{ $post->created_at->toIso8601String() }}">
                        نُشر {{ $post->created_at->diffForHumans() }}
                    </time>
                </div>
            </header>

            {{-- عنوان المقال الرئيسي --}}
            <h1 dir="{{ textDir($post->title) }}"
                class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-[1.2] mb-10 font-sans break-words"
                style="text-align: {{ textDir($post->title) == 'rtl' ? 'right' : 'left' }};">
                {{ $post->title }}
            </h1>

            {{-- الصورة البارزة --}}
            @if ($post->image)
                <figure class="mb-12 rounded-2xl overflow-hidden border border-slate-800 shadow-2xl bg-slate-900 aspect-[21/9] flex items-center justify-center">
                    <img src="{{ asset('storage/' . $post->image->file_path) }}"
                        alt="{{ $post->title }}" loading="lazy"
                        class="w-full h-full object-cover">
                </figure>
            @endif

            {{-- محتوى المقال المنسق --}}
            <div
                class="prose prose-invert prose-yellow max-w-none
                text-slate-300 text-lg sm:text-xl leading-loose
                prose-headings:text-white prose-headings:font-extrabold prose-headings:tracking-tight
                prose-h2:text-2xl sm:prose-h2:text-3xl lg:prose-h2:text-4xl prose-h2:mt-14 prose-h2:mb-6 prose-h2:border-b prose-h2:border-slate-800/80 prose-h2:pb-4
                prose-h3:text-xl sm:prose-h3:text-2xl prose-h3:mt-12 prose-h3:mb-4
                prose-p:my-6 prose-p:text-slate-300/95
                prose-strong:text-yellow-300
                prose-ul:my-6 prose-ul:pr-6
                prose-ol:my-6 prose-ol:pr-6
                prose-li:my-2 prose-li:marker:text-yellow-500
                prose-a:text-yellow-400 prose-a:no-underline hover:prose-a:text-yellow-300 hover:prose-a:underline
                prose-blockquote:border-r-4 prose-blockquote:border-yellow-500 prose-blockquote:bg-yellow-500/5 prose-blockquote:py-5 prose-blockquote:pr-6 prose-blockquote:my-8
                prose-blockquote:rounded-r-xl prose-blockquote:text-yellow-200/90 prose-blockquote:font-medium
                prose-img:rounded-2xl prose-img:my-10 prose-img:border prose-img:border-slate-800 prose-img:shadow-xl
                prose-code:text-yellow-300 prose-code:bg-[#111827] prose-code:px-2 prose-code:py-1 prose-code:rounded-md prose-code:font-mono prose-code:text-sm prose-code:border prose-code:border-slate-800
                prose-code:before:content-[''] prose-code:after:content-['']
                prose-pre:bg-[#070a12] prose-pre:border prose-pre:border-slate-800 prose-pre:rounded-2xl prose-pre:p-6 prose-pre:font-mono prose-pre:text-sm prose-pre:shadow-inner
                prose-table:border prose-table:border-slate-800 prose-table:text-sm prose-table:rounded-xl prose-table:overflow-hidden
                prose-th:bg-[#111827] prose-th:p-4 prose-th:border-b prose-th:border-slate-800 prose-th:text-yellow-400
                prose-td:p-4 prose-td:border prose-td:border-slate-800">

                {!! $post->parsed_content !!}
            </div>

        </article>
    </div>
</x-guest-layout>
