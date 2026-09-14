<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2.5 bg-amber-500/10 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 rounded-xl">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                    {{ isset($role) && request()->routeIs('role.edit', $role->id) ? 'تعديل الدور (Edit Role)' : 'تعديل الصلاحية (Edit Permission)' }}
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                    {{ isset($role) && request()->routeIs('role.edit', $role->id) ? 'تحديث بيانات الدور الحالي والصلاحيات المرتبطة به' : 'تحديث اسم الصلاحية الحالية' }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-xl overflow-hidden">

            @if (isset($role) && request()->routeIs('role.edit', $role->id))
                <!-- Role Header -->
                <div class="p-6 border-b border-gray-100 dark:border-gray-700/60 bg-gradient-to-r from-amber-500/10 via-transparent to-transparent flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">تعديل بيانات الدور: {{ $role->name }}</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">عدّل اسم الدور أو قم بإضافة/إزالة الصلاحيات المنسوبة له.</p>
                    </div>
                    <span class="px-3 py-1 rounded-lg text-xs font-mono font-semibold bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20">
                        ID: #{{ $role->id }}
                    </span>
                </div>

                <form action="{{ route('role.update', $role->id) }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <!-- Role Name Input -->
                    <div class="space-y-2">
                        <x-input-label for="name" :value="'اسم الدور (Role Name)'" class="font-bold text-gray-700 dark:text-gray-300" />
                        <x-text-input id="name" name="name" type="text" value="{{ $role->name }}"
                            class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-amber-500 focus:ring-amber-500 shadow-sm"
                            required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Update Permissions Section -->
                    <div class="space-y-3 pt-4 border-t border-gray-100 dark:border-gray-700/60">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-bold text-gray-900 dark:text-white">
                                تحديث صلاحيات الدور (Update Role Permissions)
                            </label>
                            <span class="text-xs text-gray-400 font-mono">{{ $permissions->count() }} صلاحية متوفرة</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach ($permissions as $permission)
                                @php
                                    $hasPerm = $role->hasPermissionTo($permission->name);
                                @endphp
                                <label for="perm-{{ $permission->id }}"
                                       class="flex items-center gap-3 p-3.5 rounded-xl border transition-all cursor-pointer {{ $hasPerm ? 'border-amber-500/50 bg-amber-50/40 dark:bg-amber-950/20' : 'border-gray-200 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50' }} hover:bg-amber-50/50 dark:hover:bg-amber-950/30 hover:border-amber-500/40">
                                    <input type="checkbox" name="permissions[]" id="perm-{{ $permission->id }}" value="{{ $permission->name }}"
                                           {{ $hasPerm ? 'checked' : '' }}
                                           class="w-4 h-4 text-amber-600 bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-600 rounded focus:ring-amber-500 focus:ring-2">
                                    <span class="text-xs font-mono font-medium text-gray-700 dark:text-gray-300">
                                        🔑 {{ $permission->name }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="pt-6 border-t border-gray-100 dark:border-gray-700/60 flex items-center justify-end gap-3">
                        <a href="{{ route('users.index') }}"
                           class="px-5 py-2.5 rounded-xl border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-sm font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
                            إلغاء (Cancel)
                        </a>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold shadow-md shadow-amber-500/20 active:scale-[0.98] transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>حفظ التعديلات (Update Role)</span>
                        </button>
                    </div>
                </form>

            @elseif (isset($permission) && request()->routeIs('permission.edit', $permission->id))
                <!-- Permission Header -->
                <div class="p-6 border-b border-gray-100 dark:border-gray-700/60 bg-gradient-to-r from-teal-500/10 via-transparent to-transparent flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">تعديل الصلاحية: {{ $permission->name }}</h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">قم بتحديث اسم الصلاحية الحالية.</p>
                    </div>
                    <span class="px-3 py-1 rounded-lg text-xs font-mono font-semibold bg-teal-500/10 text-teal-600 dark:text-teal-400 border border-teal-500/20">
                        ID: #{{ $permission->id }}
                    </span>
                </div>

                <form action="{{ route('permission.update', $permission->id) }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <!-- Permission Name Input -->
                    <div class="space-y-2">
                        <x-input-label for="name" :value="'اسم الصلاحية (Permission Name)'" class="font-bold text-gray-700 dark:text-gray-300" />
                        <x-text-input id="name" name="name" type="text" value="{{ $permission->name }}"
                            class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-teal-500 focus:ring-teal-500 shadow-sm"
                            required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Actions -->
                    <div class="pt-6 border-t border-gray-100 dark:border-gray-700/60 flex items-center justify-end gap-3">
                        <a href="{{ route('users.index') }}"
                           class="px-5 py-2.5 rounded-xl border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-sm font-semibold hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
                            إلغاء (Cancel)
                        </a>
                        <button type="submit"
                                class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white text-sm font-semibold shadow-md shadow-teal-500/20 active:scale-[0.98] transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>حفظ التعديلات (Update Permission)</span>
                        </button>
                    </div>
                </form>
            @endif

        </div>
    </div>
</x-app-layout>
