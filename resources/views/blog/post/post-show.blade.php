<x-guest-layout>
    <div class="min-h-screen relative py-12 px-4 sm:px-6 lg:px-12 bg-[#171a1d] text-[#eff1f4] selection:bg-emerald-500 selection:text-slate-950 font-sans">

        {{-- خلفية شبكية برمجية فنية فائقة الخفة --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b0a_1px,transparent_1px),linear-gradient(to_bottom,#1e293b0a_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>

        {{-- حاوية واسعة بالكامل مع الصفحة (max-w-6xl) --}}
        <div class="max-w-6xl mx-auto relative z-10 space-y-8">

            {{-- زر العودة للخلف --}}
            <div>
                <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2.5 px-4.5 py-3 rounded-2xl bg-slate-900/80 hover:bg-slate-800 border border-[#353e43] text-slate-300 hover:text-white transition-all text-sm font-semibold shadow-sm group">
                    <svg class="w-4 h-4 rtl:rotate-180 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span>العودة للمدونة / Back to Blog</span>
                </a>
            </div>

            {{-- المقال الرئيسي الواسع الفخم --}}
            <article class="bg-[#202429] border border-[#353e43] rounded-3xl p-6 sm:p-12 lg:p-16 shadow-2xl shadow-black/80 backdrop-blur-xl overflow-hidden relative">

                {{-- ترويسة المقال الفخمة --}}
                <header class="mb-12 pb-8 border-b border-[#353e43] text-sm sm:text-base text-[#8c99a3]">
                    <div class="flex items-center gap-4 flex-wrap mb-6">
                        @if ($post->category)
                            <span class="px-5 py-2 rounded-xl bg-emerald-500/10 text-emerald-400 font-bold border border-emerald-500/25 shadow-sm">
                                {{ $post->category->name }}
                            </span>
                        @endif
                        <span class="text-slate-700">•</span>
                        <div class="flex items-center gap-2.5 text-[#8c99a3]">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <time datetime="{{ $post->created_at->toIso8601String() }}">
                                نُشر {{ $post->created_at->diffForHumans() }}
                            </time>
                        </div>
                    </div>

                    {{-- عنوان المقال الرئيسي الواسع --}}
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-[1.2] mb-12 font-serif text-[#b59a6c]"
                        dir="auto"
                        style="text-align: {{ textDir($post->title) == 'rtl' ? 'right' : 'left' }};">
                        {{ $post->title }}
                    </h1>

                    {{-- معلومات الكاتب أعلى المقال --}}
                    @if($post->user)
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-amber-500 to-yellow-600 text-slate-950 font-bold flex items-center justify-center text-sm shadow-lg shadow-amber-500/20 shrink-0">
                                {{ mb_substr($post->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-xs text-[#8c99a3] font-medium">كاتب المقال / Author</p>
                                <p class="text-base font-bold text-[#eff1f4]">{{ $post->user->name }}</p>
                            </div>
                        </div>
                    @endif
                </header>

                {{-- الصورة البارزة بعرض واسع وفخم --}}
                @if ($post->image)
                    <figure class="mb-16 rounded-2xl overflow-hidden border border-[#353e43] bg-slate-900 aspect-[21/9] shadow-2xl flex items-center justify-center relative group">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors duration-300"></div>
                        <img src="{{ asset('storage/' . $post->image->file_path) }}"
                            alt="{{ $post->title }}" loading="lazy"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </figure>
                @endif

                {{-- محتوى المقال المنسق الواسع (Prose) --}}
                <div class="prose prose-invert max-w-none text-base sm:text-lg lg:text-xl leading-relaxed
                    prose-headings:text-[#b59a6c] prose-headings:font-serif
                    prose-a:text-[#218a55] hover:prose-a:text-[#218a55]/80
                    prose-strong:text-white
                    prose-code:text-[#b59a6c] prose-code:bg-[#111417] prose-code:px-2 prose-code:py-0.5 prose-code:rounded prose-code:border prose-code:border-[#353e43]
                    prose-pre:bg-[#111417] prose-pre:border prose-pre:border-[#353e43] prose-pre:rounded-2xl
                    prose-blockquote:border-s-4 prose-blockquote:border-[#b59a6c] prose-blockquote:bg-[#b59a6c]/5 prose-blockquote:py-4 prose-blockquote:px-6 prose-blockquote:rounded-r-2xl prose-blockquote:text-slate-200
                    prose-table:border prose-table:border-[#353e43] prose-table:rounded-xl prose-table:overflow-hidden
                    prose-th:bg-[#1a1d21] prose-th:text-[#218a55] prose-th:border-[#353e43] prose-th:p-4
                    prose-td:border prose-td:border-[#353e43] prose-td:p-4
                    prose-ul:my-6 prose-ul:pr-6 prose-ol:my-6 prose-ol:pr-6 prose-li:my-2 prose-li:marker:text-[#218a55]" dir="auto">
                    {!! $post->parsed_content !!}
                </div>

                {{-- بطاقة معلومات الكاتب أسفل المقال --}}
                @if($post->user)
                    <div class="mt-20 pt-10 border-t border-[#353e43] flex items-center gap-5 p-6 sm:p-8 bg-[#1a1d21] rounded-2xl border border-[#353e43] shadow-xl shadow-black/30">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-amber-500 to-yellow-600 text-slate-950 font-extrabold flex items-center justify-center text-2xl shadow-lg shadow-amber-500/20 shrink-0 relative">
                            {{ mb_substr($post->user->name, 0, 1) }}
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-[#218a55] border-4 border-slate-950 flex items-center justify-center text-white text-xs">✔</div>
                        </div>
                        <div>
                            <p class="text-xs text-[#218a55] font-bold uppercase tracking-wider mb-1">الكاتب الرسمي</p>
                            <p class="text-lg sm:text-xl font-extrabold text-white">{{ $post->user->name }}</p>
                            <p class="text-sm text-[#8c99a3] mt-0.5">تم توثيق هذا المقال بواسطة الكاتب لضمان صحة المعلومات.</p>
                        </div>
                    </div>
                @endif

            </article>

        </div>
    </div>
</x-guest-layout>
