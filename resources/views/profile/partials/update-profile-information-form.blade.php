<section class="w-full" dir="rtl">
    <div class="w-full bg-white dark:bg-slate-900 overflow-hidden shadow-2xl rounded-3xl border border-slate-200/80 dark:border-slate-800 transition-all text-right">

        <!-- Card Header with Gradient Accent -->
        <div class="relative px-6 py-6 sm:px-8 sm:py-7 bg-gradient-to-l from-emerald-500/10 via-teal-500/5 to-transparent border-b border-slate-100 dark:border-slate-800/80">
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="p-3 bg-emerald-600 text-white rounded-2xl shadow-lg shadow-emerald-500/25 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">معلومات الملف الشخصي</h3>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mt-1">قم بتحديث معلومات حسابك الشخصي والبريد الإلكتروني المعتمد.</p>
                </div>
            </div>
        </div>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <!-- Form Body -->
        <form method="post" action="{{ route('profile.update') }}" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('patch')

            <!-- Field: Name -->
            <div class="space-y-2.5">
                <x-input-label for="name" :value="'الاسم الكامل'" class="text-sm font-bold text-slate-800 dark:text-slate-200 text-right block" />
                <x-text-input id="name" name="name" type="text"
                    class="w-full px-4 py-3.5 rounded-2xl border-slate-300 dark:border-slate-700 dark:bg-slate-950/70 text-slate-900 dark:text-white font-bold text-base placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all duration-200 shadow-sm text-right"
                    :value="old('name', $user->name)" required autofocus autocomplete="name" dir="auto" />
                <x-input-error class="mt-1.5 text-xs font-bold text-rose-500 text-right" :messages="$errors->get('name')" />
            </div>

            <!-- Field: Email -->
            <div class="space-y-2.5">
                <x-input-label for="email" :value="'البريد الإلكتروني'" class="text-sm font-bold text-slate-800 dark:text-slate-200 text-right block" />
                <x-text-input id="email" name="email" type="email"
                    class="w-full px-4 py-3.5 rounded-2xl border-slate-300 dark:border-slate-700 dark:bg-slate-950/70 text-slate-900 dark:text-white font-bold text-base font-mono placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all duration-200 shadow-sm text-left"
                    :value="old('email', $user->email)" required autocomplete="username" dir="ltr" />
                <x-input-error class="mt-1.5 text-xs font-bold text-rose-500 text-right" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="p-4 mt-3 rounded-2xl bg-amber-50 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-800/60 text-right">
                        <p class="text-sm font-bold text-amber-800 dark:text-amber-200 flex items-center gap-2 justify-start">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>عنوان بريدك الإلكتروني غير مفعّل.</span>
                        </p>

                        <button form="send-verification" class="mt-2 text-sm font-bold text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 underline focus:outline-none transition-colors">
                            انقر هنا لإعادة إرسال رابط التحقق.
                        </button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-bold text-xs text-emerald-600 dark:text-emerald-400">
                                تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="pt-5 flex items-center justify-end gap-3 border-t border-slate-100 dark:border-slate-800">
                @if (session('status') === 'profile-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2500)"
                        class="text-sm font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1.5"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>تم الحفظ بنجاح.</span>
                    </p>
                @endif

                <button type="submit"
                    class="inline-flex items-center gap-2 px-7 py-3 rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold shadow-xl shadow-emerald-500/20 hover:shadow-emerald-500/30 active:scale-[0.98] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>حفظ التغييرات</span>
                </button>
            </div>
        </form>

    </div>
</section>
