<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2.5 bg-amber-500/10 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 rounded-xl">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                    {{ request()->routeIs('role.create') ? 'إضافة دور جديد (Add Role)' : 'إضافة صلاحية جديدة (Add Permission)' }}
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                    {{ request()->routeIs('role.create') ? 'قم بإنشاء دور جديد وتحديد الصلاحيات المنسوبة له' : 'قم بإنشاء صلاحية جديدة لإضافتها للأدوار لاحقاً' }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-xl overflow-hidden">

            @if (request()->routeIs('role.create'))
                <!-- Form Header -->
                <div class="p-6 border-b border-gray-100 dark:border-gray-700/60 bg-gradient-to-r from-amber-500/10 via-transparent to-transparent">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">بيانات الدور الجديد</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">حدد اسم الدور ثم اختر الصلاحيات المتاحة له.</p>
                </div>

                <form action="{{ route('role.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <!-- Role Name Input -->
                    <div class="space-y-2">
                        <x-input-label for="name" :value="'اسم الدور (Role Name)'" class="font-bold text-gray-700 dark:text-gray-300" />
                        <x-text-input id="name" name="name" type="text"
                            class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-amber-500 focus:ring-amber-500 shadow-sm"
                            placeholder="مثال: editor, admin, writer" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

                    <!-- Permissions Assignment Grid -->
                    <div class="space-y-3 pt-4 border-t border-gray-100 dark:border-gray-700/60">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-bold text-gray-900 dark:text-white">
                                تعيين الصلاحيات لهذا الدور (Assign Permissions)
                            </label>
                            <span class="text-xs text-gray-400 font-mono">{{ $permissions->count() }} صلاحية متاحة</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach ($permissions as $permission)
                                <label for="perm-{{ $permission->id }}"
                                       class="flex items-center gap-3 p-3.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50 hover:bg-amber-50/50 dark:hover:bg-amber-950/20 hover:border-amber-500/40 cursor-pointer transition-all">
                                    <input type="checkbox" name="permissions[]" id="perm-{{ $permission->id }}" value="{{ $permission->name }}"
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
                            <span>إنشاء الدور (Create Role)</span>
                        </button>
                    </div>
                </form>

            @elseif(request()->routeIs('permission.create'))
                <!-- Permission Header -->
                <div class="p-6 border-b border-gray-100 dark:border-gray-700/60 bg-gradient-to-r from-teal-500/10 via-transparent to-transparent">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">بيانات الصلاحية الجديدة</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">أدخل اسم الصلاحية بدقة (يفضّل الاستخدام بالإنجليزية Expressive Names).</p>
                </div>

                <form action="{{ route('permission.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <!-- Permission Name Input -->
                    <div class="space-y-2">
                        <x-input-label for="name" :value="'اسم الصلاحية (Permission Name)'" class="font-bold text-gray-700 dark:text-gray-300" />
                        <x-text-input id="name" name="name" type="text"
                            class="block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-teal-500 focus:ring-teal-500 shadow-sm"
                            placeholder="مثال: edit-posts, delete-users, publish-articles" required autofocus />
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
                            <span>إنشاء الصلاحية (Create Permission)</span>
                        </button>
                    </div>
                </form>
            @endif

        </div>
    </div>
</x-app-layout>
