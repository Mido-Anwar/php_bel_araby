<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2.5 bg-blue-500/10 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-xl">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                    تعديل بيانات المستخدم (Edit User)
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                    تحديث المعلومات الشخصية والدور المنسوب للمستخدم
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-xl overflow-hidden">

            <!-- User Header -->
            <div class="p-6 border-b border-gray-100 dark:border-gray-700/60 bg-gradient-to-r from-blue-500/10 via-transparent to-transparent flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-300 font-bold flex items-center justify-center text-lg shadow-inner">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $user->name }}</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 font-mono">{{ $user->email }}</p>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-lg text-xs font-mono font-semibold bg-blue-500/10 text-blue-600 dark:text-blue-400 border border-blue-500/20">
                    ID: #{{ $user->id }}
                </span>
            </div>

            <!-- Form -->
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="p-6 space-y-6">
                @csrf

                <!-- Name Input -->
                <div class="space-y-2">
                    <x-input-label for="name" :value="'اسم المستخدم (Full Name)'" class="font-bold text-gray-700 dark:text-gray-300" />
                    <x-text-input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                        class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                        required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Email Input -->
                <div class="space-y-2">
                    <x-input-label for="email" :value="'البريد الإلكتروني (Email Address)'" class="font-bold text-gray-700 dark:text-gray-300" />
                    <x-text-input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                        class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                        required />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Role Selection -->
                <div class="space-y-3 pt-2">
                    <x-input-label for="role" :value="'تعيين الدور (Assign Role)'" class="font-bold text-gray-700 dark:text-gray-300" />

                    <div class="relative">
                        <select name="role" id="role"
                                class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 shadow-sm py-2.5 px-3 appearance-none">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    🛡️ {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center px-4 text-gray-500">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                            </svg>
                        </div>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>تحديث البيانات (Update User)</span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
