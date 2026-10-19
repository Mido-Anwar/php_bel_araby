<section class="w-full" dir="rtl">
    <div class="w-full bg-white dark:bg-slate-900 overflow-hidden shadow-2xl rounded-3xl border border-slate-200/80 dark:border-slate-800 transition-all text-right">

        <!-- Card Header with Gradient Accent -->
        <div class="relative px-6 py-6 sm:px-8 sm:py-7 bg-gradient-to-l from-rose-500/10 via-red-500/5 to-transparent border-b border-slate-100 dark:border-slate-800/80">
            <div class="flex items-center space-x-4 space-x-reverse">
                <div class="p-3 bg-rose-600 text-white rounded-2xl shadow-lg shadow-rose-500/25 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">حذف الحساب</h3>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mt-1">بمجرد حذف حسابك، سيتم حذف جميع موارد البيانات الخاصة بك نهائياً.</p>
                </div>
            </div>
        </div>

        <div class="p-6 sm:p-8 space-y-6">
            <p class="text-sm font-medium text-slate-600 dark:text-slate-300 leading-relaxed">
                قبل حذف حسابك، يرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها للرجوع إليها لاحقاً.
            </p>

            <div>
                <x-danger-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="px-7 py-3 rounded-2xl bg-rose-600 hover:bg-rose-700 text-white text-sm font-bold shadow-xl shadow-rose-500/20 hover:shadow-rose-500/30 active:scale-[0.98] transition-all duration-200"
                >
                    حذف الحساب
                </x-danger-button>
            </div>
        </div>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6 sm:p-8 space-y-6 bg-white dark:bg-slate-900 rounded-3xl text-right" dir="rtl">
                @csrf
                @method('delete')

                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="p-3 bg-rose-100 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 rounded-2xl shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-black text-slate-900 dark:text-white">
                            هل أنت متأكد تماماً من رغبتك في حذف حسابك؟
                        </h2>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400 mt-1">
                            هذا الإجراء لا يمكن التراجع عنه.
                        </p>
                    </div>
                </div>

                <p class="text-sm font-medium text-slate-600 dark:text-slate-300">
                    بمجرد حذف حسابك، سيتم حذف كافة البيانات والموارد المرتبطة به نهائياً. يرجى إدخال كلمة المرور الخاصة بك لتأكيد رغبتك في حذف الحساب نهائياً.
                </p>

                <div class="space-y-2.5">
                    <x-input-label for="password" value="{{ __('كلمة المرور') }}" class="text-sm font-bold text-slate-800 dark:text-slate-200 text-right block" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full px-4 py-3.5 rounded-2xl border-slate-300 dark:border-slate-700 dark:bg-slate-950/70 text-slate-900 dark:text-white font-bold text-base placeholder-slate-400 focus:ring-2 focus:ring-rose-500/30 focus:border-rose-500 transition-all duration-200 shadow-sm text-left"
                        placeholder="أدخل كلمة المرور لتأكيد الحذف"
                        dir="ltr"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1.5 text-xs font-bold text-rose-500 text-right" />
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <x-secondary-button x-on:click="$dispatch('close')" class="px-5 py-2.5 rounded-xl font-bold text-slate-700 dark:text-slate-300 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                        إلغاء
                    </x-secondary-button>

                    <x-danger-button class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-bold shadow-lg shadow-rose-500/25 transition">
                        حذف الحساب نهائياً
                    </x-danger-button>
                </div>
            </form>
        </x-modal>

    </div>
</section>
