<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-2xl text-slate-900 tracking-tight">
                    الملف الشخصي
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    إدارة بيانات حسابك الشخصي وإعدادات الأمان بحرية وأمان.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- بطاقة النبذة التعريفية للمستخدم (User Overview Card) -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8 flex flex-col sm:flex-row items-center gap-6 transition-all">
            <div class="w-20 h-20 rounded-2xl bg-slate-900 text-white font-bold text-3xl flex items-center justify-center shadow-lg shadow-slate-900/10 shrink-0">
                {{ mb_substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="text-center sm:text-right space-y-1.5 flex-1">
                <h3 class="text-2xl font-bold text-slate-900 tracking-tight">
                    {{ Auth::user()->name }}
                </h3>
                <p class="text-sm text-slate-500 font-medium">
                    {{ Auth::user()->email }}
                </p>
                <div class="pt-2 flex items-center justify-center sm:justify-start gap-3 text-xs font-mono text-slate-500">
                    <span>تاريخ الانضمام: {{ Auth::user()->created_at->format('Y-m-d') }}</span>
                    <span>•</span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-semibold border border-emerald-100">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        حساب مفعل
                    </span>
                </div>
            </div>
        </div>

        <!-- 1. قسم تحديث معلومات الملف الشخصي -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-10 transition-all">
            <div class="max-w-2xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- 2. قسم تحديث كلمة المرور -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-10 transition-all">
            <div class="max-w-2xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- 3. قسم حذف الحساب (يظهر للمشرفين فقط) -->
        @if(Auth::user()->hasRole('super-admin'))
        <div class="bg-white rounded-3xl border border-rose-200/80 shadow-sm p-6 sm:p-10 transition-all">
            <div class="max-w-2xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
        @endif

    </div>
</x-app-layout>
