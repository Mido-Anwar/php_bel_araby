<x-master-layout>

    <div dir="rtl"
        class="relative overflow-hidden py-16 lg:py-24 px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center min-h-[calc(100vh-80px)]">

        <!-- خلفية جمالية مضيئة (Glow Effects) -->
        <div
            class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl pointer-events-none">
        </div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="relative max-w-5xl mx-auto text-center z-10 w-full">

            <!-- شارة إعلانية ترحيبية -->
            <div
                class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-800/80 border border-slate-700/60 text-yellow-400 text-xs sm:text-sm font-medium mb-6 shadow-sm backdrop-blur-md">
                <span class="flex h-2 w-2 rounded-full bg-yellow-400 animate-pulse"></span>
                مرحباً بك في منصة Whiscrashow
            </div>


            <!-- قسم أحدث المقالات -->
            <div class="w-full text-right mb-16">
                <div class="flex items-center justify-between mb-6 px-2">
                    <h2 class="text-xl sm:text-2xl font-bold text-white border-r-4 border-yellow-400 pr-3">
                        أحدث المقالات
                    </h2>
                    <a href="{{ route('blog.main') }}"
                        class="text-xs sm:text-sm text-yellow-400 hover:text-yellow-300 transition-colors flex items-center gap-1">
                        عرض الكل &larr;
                    </a>
                </div>

                <!-- شبكة عرض المقالات -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse($latestPosts as $post)
                        <div
                            class="group rounded-2xl bg-slate-900/60 border border-slate-800/80 hover:border-yellow-500/40 transition-all duration-300 backdrop-blur-sm flex flex-col justify-between overflow-hidden">

                            <!-- صورة المقال -->
                            <div class="relative h-48 w-full overflow-hidden bg-slate-800">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image->file_path) }}"
                                        alt="{{ $post->image->alt_text }}" loading="lazy"
                                        class="w-full h-auto rounded-lg object-cover">
                                @else
                                    {{-- Placeholder SVG مدمج --}}
                                    <div
                                        class="w-full h-52 flex flex-col items-center justify-center p-6 text-center bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 rounded-xl border border-gray-200/50 dark:border-gray-700/50">
                                        <svg class="w-10 h-10 mb-3 text-emerald-600 dark:text-emerald-400 opacity-80"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 8h16M4 8a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2V8z" />
                                        </svg>
                                        <!-- عرض عنوان المقال هنا كـ Cover افتراضي -->
                                        <span
                                            class="text-sm font-bold text-gray-700 dark:text-gray-300 line-clamp-2 leading-tight">
                                            {{ $post->title }}
                                        </span>
                                    </div>
                                @endif

                            </div>

                            <!-- محتوى الكارد -->
                            <div class="p-6 flex flex-col flex-grow justify-between">
                                <div>
                                    <!-- تاريخ النشر -->
                                    <div class="text-xs text-slate-400 mb-2">
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                    </div>

                                    <!-- عنوان البوست -->
                                    <h3
                                        class="text-lg font-bold text-white group-hover:text-yellow-400 transition-colors mb-2 line-clamp-2">
                                        {{ $post->title }}
                                    </h3>

                                    <!-- مقتطف من المحتوى -->
                                    <p class="text-slate-400 text-sm leading-relaxed mb-6 line-clamp-2">
                                        {{ Str::limit($post->excerpt ?? $post->body, 80) }}
                                    </p>
                                </div>

                                <!-- رابط قراءة المقال -->
                                <div class="pt-4 border-t border-slate-800/60 flex items-center justify-between">
                                    <a href="{{ route('blog.show', $post) }}"
                                        class="text-xs font-semibold text-yellow-400 group-hover:underline flex items-center gap-1">
                                        اقرأ المقال الكامل
                                        <span
                                            class="transform group-hover:-translate-x-1 transition-transform">&larr;</span>
                                    </a>
                                    <span class="text-xs text-slate-500">{{ $post->reading_time ?? '3 دقائق' }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div
                            class="col-span-3 py-10 text-center text-slate-400 bg-slate-900/40 rounded-2xl border border-slate-800">
                            لا توجد مقالات منشورة حالياً، تابعنا قريباً!
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- حقوق التوقيع (Creator Credit) -->
            <div
                class="pt-8 border-t border-slate-800/60 text-xs sm:text-sm text-slate-400 flex items-center justify-center gap-1.5">
                <span>تم الصنع بكل إتقان بواسطة</span>
                <span class="text-yellow-400 font-semibold">أحمد نور</span>
            </div>

        </div>
    </div>
</x-master-layout>
