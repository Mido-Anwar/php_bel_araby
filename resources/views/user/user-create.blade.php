<x-app-layout   :title="$title">
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2.5 bg-blue-500/10 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-xl">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                    إضافة مستخدم جديد (Create User)
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                    إنشاء حساب مستخدم جديد وتعيين الصلاحيات والدور الخاص به
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-xl overflow-hidden">

            <!-- Header Banner -->
            <div class="p-6 border-b border-gray-100 dark:border-gray-700/60 bg-gradient-to-r from-blue-500/10 via-transparent to-transparent flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-gray-900 dark:text-white">بيانات الحساب الجديد</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400">يرجى ملء كافة الحقول المطلوبة لإنشاء المستخدم</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('user.store') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <!-- Name Input -->
                <div class="space-y-2">
                    <x-input-label for="name" :value="'اسم المستخدم (Full Name)'" class="font-bold text-gray-700 dark:text-gray-300" />
                    <x-text-input id="name" name="name" type="text" :value="old('name')"
                        class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                        placeholder="أدخل الاسم الكامل" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Email Input -->
                <div class="space-y-2">
                    <x-input-label for="email" :value="'البريد الإلكتروني (Email Address)'" class="font-bold text-gray-700 dark:text-gray-300" />
                    <x-text-input id="email" name="email" type="email" :value="old('email')"
                        class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                        placeholder="example@domain.com" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password Fields Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Password -->
                    <div class="space-y-2">
                        <x-input-label for="password" :value="'كلمة السر (Password)'" class="font-bold text-gray-700 dark:text-gray-300" />
                        <x-text-input id="password" name="password" type="password"
                            class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                            placeholder="••••••••" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Password Confirmation -->
                    <div class="space-y-2">
                        <x-input-label for="password_confirmation" :value="'تأكيد كلمة السر (Confirm Password)'" class="font-bold text-gray-700 dark:text-gray-300" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                            class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                            placeholder="••••••••" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>
                </div>

                <!-- Role Selection (Radio Cards) -->
                <div class="space-y-3 pt-2">
                    <x-input-label for="role" :value="'تعيين الدور (Assign Role)'" class="font-bold text-gray-700 dark:text-gray-300" />

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach ($roles as $role)
                            <label for="role-{{ $role->id }}"
                                   class="flex items-center justify-between p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 hover:border-blue-500 transition-all cursor-pointer has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50/50 dark:has-[:checked]:bg-blue-950/30">
                                <div class="flex items-center gap-3">
                                    <input type="radio" name="role" id="role-{{ $role->id }}" value="{{ $role->name }}"
                                           {{ old('role') == $role->name ? 'checked' : '' }}
                                           class="w-4 h-4 text-blue-600 bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-600 focus:ring-blue-500 focus:ring-2" required>
                                    <span class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                        🛡️ {{ $role->name }}
                                    </span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('role')" class="mt-1" />
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 border-t border-gray-100 dark:border-gray-700/60 flex items-center justify-end gap-3">
                    <a href="{{ route('users.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-sm font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
                        إلغاء (Cancel)
                    </a>
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold shadow-md shadow-blue-500/20 active:scale-[0.98] transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>حفظ المستخدم (Save User)</span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
