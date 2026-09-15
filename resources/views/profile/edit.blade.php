<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                    الملف الشخصي
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                    إدارة بيانات حسابك وإعدادات الأمان
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- User Overview Card -->
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm flex flex-col sm:flex-row items-center gap-5">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-tr from-blue-600 to-indigo-600 text-white font-bold text-3xl flex items-center justify-center shadow-md shadow-blue-500/20 shrink-0">
                {{ mb_substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="text-center sm:text-right space-y-1">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    {{ Auth::user()->name }}
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ Auth::user()->email }}
                </p>
                <div class="pt-2 flex items-center justify-center sm:justify-start gap-2 text-xs text-gray-400">
                    <span>تاريخ الانضمام: {{ Auth::user()->created_at->format('Y-m-d') }}</span>
                    <span>•</span>
                    <span class="px-2 py-0.5 rounded-md bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 font-semibold">
                        حساب مفعل
                    </span>
                </div>
            </div>
        </div>

        <!-- 1. Update Profile Information -->
        <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- 2. Update Password -->
        <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- 3. Delete Account -->
        @if(Auth::user()->hasRole('super-admin'))
        <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 rounded-2xl border border-red-100 dark:border-red-900/30 shadow-sm">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
        @endif
    </div>
</x-app-layout>
