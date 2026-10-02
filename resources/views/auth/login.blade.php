<x-guest-layout>
    <div dir="rtl" class="relative overflow-hidden bg-[#090d16] text-slate-100 min-h-screen flex items-center justify-center p-4 sm:p-6 font-sans">

        {{-- خلفية شبكية برمجية --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b12_1px,transparent_1px),linear-gradient(to_bottom,#1e293b12_1px,transparent_1px)] bg-[size:3rem_3rem] pointer-events-none"></div>

        {{-- إضاءات خلفية فنية --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[450px] h-[450px] bg-yellow-500/10 rounded-full blur-[130px] pointer-events-none"></div>

        <div class="relative w-full max-w-md mx-auto">

            {{-- شارة الحالة البرمجية فوق الكارت --}}
            <div class="text-center mb-5">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-xl bg-slate-900 border border-slate-700/80 text-yellow-400 text-xs font-mono shadow-xl">
                    <span class="inline-block w-2 h-2 bg-yellow-400 animate-pulse"></span>
                    [ SECURE_LOGIN_MODE ]
                </div>
            </div>

            {{-- نافذة الكونسول الرئيسية (Retro Arcade Terminal Card) --}}
            <div class="rounded-3xl bg-[#0b0f19] border-2 border-yellow-500/30 shadow-[0_0_50px_rgba(234,179,8,0.12)] overflow-hidden">

                {{-- الشريط العلوي للنافذة --}}
                <div class="flex items-center justify-between px-5 py-3.5 bg-[#111827] border-b border-slate-800">
                    <div class="flex items-center gap-2">
                        <span class="w-3.5 h-3.5 rounded-full bg-red-500 inline-block"></span>
                        <span class="w-3.5 h-3.5 rounded-full bg-yellow-500 inline-block"></span>
                        <span class="w-3.5 h-3.5 rounded-full bg-green-500 inline-block"></span>
                    </div>
                    <div class="text-xs font-mono text-yellow-400 font-bold tracking-widest flex items-center gap-2">
                        <span>🔐</span> LOGIN_GATE.php
                    </div>
                    <div class="text-xs font-mono text-slate-400">LVL: AUTH</div>
                </div>

                <div class="p-6 sm:p-8">

                    {{-- العنوان والترحيب --}}
                    <div class="text-center mb-8">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-white mb-2 tracking-tight">
                            مرحبًا بعودتك يا فنان 👋
                        </h1>
                        <p class="text-slate-400 text-xs sm:text-sm font-mono">
                            // سجّل دخولك للوصول إلى لوحة التحكم
                        </p>
                    </div>

                    {{-- Session Status --}}
                    <x-auth-session-status class="mb-4 text-xs font-mono" :status="session('status')" />

                    {{-- Form --}}
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- Email --}}
                        <div class="space-y-2">
                            <label for="email" class="block text-xs font-mono font-semibold text-yellow-400/90">
                                > البريد الإلكتروني
                            </label>
                            <input id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   autocomplete="username"
                                   dir="ltr"
                                   placeholder="you@whiscrashow.com"
                                   class="w-full px-4 py-3 rounded-xl bg-[#070a12] border border-slate-700/80 text-slate-100 placeholder-slate-600 focus:ring-2 focus:ring-yellow-500/20 focus:border-yellow-500 transition-all text-sm font-mono">
                            @error('email')
                                <p class="text-red-400 text-xs font-mono mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="space-y-2">
                            <label for="password" class="block text-xs font-mono font-semibold text-yellow-400/90">
                                > كلمة المرور
                            </label>
                            <input id="password"
                                   type="password"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   dir="ltr"
                                   placeholder="••••••••"
                                   class="w-full px-4 py-3 rounded-xl bg-[#070a12] border border-slate-700/80 text-slate-100 placeholder-slate-600 focus:ring-2 focus:ring-yellow-500/20 focus:border-yellow-500 transition-all text-sm font-mono">
                            @error('password')
                                <p class="text-red-400 text-xs font-mono mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Remember + Forgot --}}
                        <div class="flex items-center justify-between text-xs pt-1">
                            <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                                <input id="remember_me"
                                       type="checkbox"
                                       name="remember"
                                       class="w-4 h-4 rounded border-slate-700 bg-[#070a12] text-yellow-500 focus:ring-yellow-500/30">
                                <span class="text-slate-300 font-mono">تذكرني</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-yellow-400 hover:text-yellow-300 transition-colors font-mono">
                                    نسيت كلمة المرور؟
                                </a>
                            @endif
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit"
                                class="w-full py-3.5 rounded-xl bg-yellow-500 hover:bg-yellow-400 text-slate-950 font-bold transition-all shadow-xl shadow-yellow-500/20 hover:scale-[1.02] active:scale-[0.98] font-mono text-sm tracking-wide mt-2">
                            🚀 // تنفيذ تسجيل الدخول
                        </button>

                    </form>

                </div>

                {{-- الشريط السفلي للكونسول --}}
                <div class="px-6 py-3 bg-[#070a12] border-t border-slate-800 flex items-center justify-between text-xs font-mono text-slate-400">
                    <span>SECURE_SESSION</span>
                    <span class="text-green-400 flex items-center gap-1.5 font-bold">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        ONLINE
                    </span>
                </div>

            </div>

        </div>

    </div>
</x-guest-layout>
