<x-master-layout :title="$title ?? 'اتصل بنا - Whiscrashow'">
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
                    تواصل معنا
                </div>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight mb-4">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-amber-200">
                        اتصل بنا
                    </span>
                </h1>
                <p class="text-slate-400 text-sm sm:text-base">عندك سؤال أو اقتراح؟ ابعتلنا وهنرد عليك في أقرب وقت.</p>
            </div>

            {{-- رسالة النجاح --}}
            @if (session('success'))
                <div class="mb-8 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- معلومات التواصل --}}
                <div class="lg:col-span-1 space-y-4">
                    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-yellow-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-white font-bold text-sm">البريد الإلكتروني</h3>
                        </div>
                        <a href="mailto:contact@whiscrashow.com" class="text-slate-400 hover:text-yellow-400 text-sm transition-colors" dir="ltr">
                            contact@whiscrashow.com
                        </a>
                    </div>

                    <div class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-white font-bold text-sm">وقت الرد</h3>
                        </div>
                        <p class="text-slate-400 text-sm">خلال 48 ساعة</p>
                    </div>
                </div>

                {{-- الفورم --}}
                <div class="lg:col-span-2">
                    <form action="{{ route('contact.send') }}" method="POST"
                        class="bg-slate-900/60 border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            {{-- الاسم --}}
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-semibold text-gray-300">الاسم</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-950/50 text-slate-100 focus:ring-2 focus:ring-yellow-500/20 focus:border-yellow-500 transition-all text-sm"
                                    placeholder="اسمك">
                                @error('name')<p class="text-red-400 text-xs">{{ $message }}</p>@enderror
                            </div>

                            {{-- الإيميل --}}
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-semibold text-gray-300">البريد الإلكتروني</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required dir="ltr"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-950/50 text-slate-100 focus:ring-2 focus:ring-yellow-500/20 focus:border-yellow-500 transition-all text-sm"
                                    placeholder="email@example.com">
                                @error('email')<p class="text-red-400 text-xs">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- الموضوع --}}
                        <div class="space-y-2">
                            <label for="subject" class="block text-sm font-semibold text-gray-300">الموضوع</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-950/50 text-slate-100 focus:ring-2 focus:ring-yellow-500/20 focus:border-yellow-500 transition-all text-sm"
                                placeholder="موضوع الرسالة">
                            @error('subject')<p class="text-red-400 text-xs">{{ $message }}</p>@enderror
                        </div>

                        {{-- الرسالة --}}
                        <div class="space-y-2">
                            <label for="message" class="block text-sm font-semibold text-gray-300">الرسالة</label>
                            <textarea id="message" name="message" rows="6" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-950/50 text-slate-100 focus:ring-2 focus:ring-yellow-500/20 focus:border-yellow-500 transition-all resize-y text-sm"
                                placeholder="اكتب رسالتك هنا...">{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-400 text-xs">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit"
                                class="px-6 py-3 rounded-xl bg-yellow-500 hover:bg-yellow-600 text-slate-950 text-sm font-bold transition-all">
                                إرسال الرسالة
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-master-layout>
