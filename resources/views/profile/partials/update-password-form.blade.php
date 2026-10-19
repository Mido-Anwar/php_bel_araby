<section class="w-full" dir="rtl">
    <div class="w-full bg-white dark:bg-slate-900 overflow-hidden shadow-2xl rounded-3xl border border-slate-200/80 dark:border-slate-800 transition-all text-right">

        <!-- Card Header with Amber/Orange Gradient Accent -->
        <div class="relative px-6 py-6 sm:px-8 sm:py-7 bg-gradient-to-l from-amber-500/10 via-orange-500/5 to-transparent border-b border-slate-100 dark:border-slate-800/80">
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="p-3 bg-amber-500 text-white rounded-2xl shadow-lg shadow-amber-500/25 shrink-0">
                    <!-- Lock Icon -->
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">تحديث كلمة المرور</h3>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mt-1">تأكد من استخدام كلمة مرور طويلة وعشوائية لضمان أمان حسابك.</p>
                </div>
            </div>
        </div>

        <!-- Form Body -->
        <form method="post" action="{{ route('password.update') }}" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('put')

            <!-- Field: Current Password -->
            <div class="space-y-2.5">
                <x-input-label for="update_password_current_password" :value="'كلمة المرور الحالية'" class="text-sm font-bold text-slate-800 dark:text-slate-200 text-right block" />
                <x-text-input id="update_password_current_password" name="current_password" type="password"
                    class="w-full px-4 py-3.5 rounded-2xl border-slate-300 dark:border-slate-700 dark:bg-slate-950/70 text-slate-900 dark:text-white font-bold text-base placeholder-slate-400 focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 transition-all duration-200 shadow-sm text-left"
                    autocomplete="current-password" dir="ltr" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1.5 text-xs font-bold text-rose-500 text-right" />
            </div>

            <!-- Field: New Password -->
            <div class="space-y-2.5">
                <x-input-label for="update_password_password" :value="'كلمة المرور الجديدة'" class="text-sm font-bold text-slate-800 dark:text-slate-200 text-right block" />
                <x-text-input id="update_password_password" name="password" type="password"
                    class="w-full px-4 py-3.5 rounded-2xl border-slate-300 dark:border-slate-700 dark:bg-slate-950/70 text-slate-900 dark:text-white font-bold text-base placeholder-slate-400 focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 transition-all duration-200 shadow-sm text-left"
                    autocomplete="new-password" dir="ltr" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1.5 text-xs font-bold text-rose-500 text-right" />
            </div>

            <!-- Field: Confirm Password -->
            <div class="space-y-2.5">
                <x-input-label for="update_password_password_confirmation" :value="'تأكيد كلمة المرور الجديدة'" class="text-sm font-bold text-slate-800 dark:text-slate-200 text-right block" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="w-full px-4 py-3.5 rounded-2xl border-slate-300 dark:border-slate-700 dark:bg-slate-950/70 text-slate-900 dark:text-white font-bold text-base placeholder-slate-400 focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 transition-all duration-200 shadow-sm text-left"
                    autocomplete="new-password" dir="ltr" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1.5 text-xs font-bold text-rose-500 text-right" />
            </div>

            <!-- Action Buttons -->
            <div class="pt-5 flex items-center justify-end gap-3 border-t border-slate-100 dark:border-slate-800">
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2500)"
                        class="text-sm font-bold text-amber-600 dark:text-amber-400 flex items-center gap-1.5"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>تم تحديث كلمة المرور بنجاح.</span>
                    </p>
                @endif

                <button type="submit"
                    class="inline-flex items-center gap-2 px-7 py-3 rounded-2xl bg-amber-500 hover:bg-amber-600 text-white text-sm font-bold shadow-xl shadow-amber-500/20 hover:shadow-amber-500/30 active:scale-[0.98] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>تحديث كلمة المرور</span>
                </button>
            </div>
        </form>

    </div>
</section>
