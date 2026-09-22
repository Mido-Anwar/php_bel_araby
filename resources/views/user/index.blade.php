<x-app-layout :title="$title">
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="p-2.5 bg-amber-500/10 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 rounded-xl">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                        إدارة المستخدمين والصلاحيات
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">التحكم في حسابات المستخدمين، الأدوار (Roles)، والصلاحيات (Permissions)</p>
                </div>
            </div>

            <!-- Header Quick Action -->
            <div>
                <a href="{{ route('user.create') }}"
                   class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-amber-600 hover:bg-amber-700 rounded-xl shadow-md shadow-amber-500/20 active:scale-[0.98] transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span>إضافة مستخدم جديد</span>
                </a>
            </div>
        </div>

        <!-- System Alert Messages -->
        <div class="mt-4 space-y-2">
            <x-message :message="session('success-store-user')" :color="'green'" />
            <x-message :message="session('success-update-user')" :color="'blue'" />
            <x-message :message="session('success-delete-user')" :color="'red'" />
            <x-message :message="session('error')" :color="'red'" />

        </div>
    </x-slot>

    <div class="py-8 space-y-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- 1. Users Section -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-xl overflow-hidden transition-all">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700/60 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gradient-to-r from-amber-500/5 via-transparent to-transparent">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <span>جدول المستخدمين</span>
                        <span class="px-2.5 py-0.5 text-xs rounded-full bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300 font-mono">
                            {{ $users->count() }}
                        </span>
                    </h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">إدارة حسابات المستخدمين وتعيين الأدوار الخاصة بكل حساب.</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-right text-sm text-gray-600 dark:text-gray-300">
                    <thead class="bg-gray-50 dark:bg-gray-900/50 text-xs text-gray-500 dark:text-gray-400 uppercase border-b border-gray-100 dark:border-gray-700/60">
                        <tr>
                            <th class="px-6 py-4 font-semibold"># ID</th>
                            <th class="px-6 py-4 font-semibold">المستخدم والبريد</th>
                            <th class="px-6 py-4 font-semibold">الأدوار المنسوبة</th>
                            <th class="px-6 py-4 font-semibold text-center">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700/60">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition-colors">
                                <td class="px-6 py-4 font-mono text-xs text-gray-400">#{{ $user->id }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-amber-500/10 text-amber-600 dark:text-amber-400 font-bold flex items-center justify-center text-sm border border-amber-500/20">
                                            {{ mb_substr($user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900 dark:text-white">{{ $user->name }}</div>
                                            <div class="text-xs text-gray-400 font-mono">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-1.5">
                                        @forelse($user->getRoleNames() as $roleName)
                                            <span class="px-2.5 py-0.5 text-xs font-semibold rounded-md bg-amber-100 text-amber-800 dark:bg-amber-900/50 dark:text-amber-300 border border-amber-200 dark:border-amber-700/50">
                                                {{ $roleName }}
                                            </span>
                                        @empty
                                            <span class="text-xs text-gray-400 italic">بدون دور</span>
                                        @endforelse
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}"
                                           class="p-1.5 text-gray-500 hover:text-amber-600 dark:text-gray-400 dark:hover:text-amber-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors"
                                           title="تعديل">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <x-delete-form :action-url="route('user.destroy', $user->id)" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 2. Roles Section -->
        <div class="space-y-4">
            <!-- Messages -->
            <x-message :message="session('success-store-role')" :color="'green'" />
            <x-message :message="session('success-update-role')" :color="'blue'" />
            <x-message :message="session('success-delete-role')" :color="'red'" />

            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <span>الأدوار (Roles)</span>
                        <span class="px-2.5 py-0.5 text-xs rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-mono">
                            {{ $roles->count() }}
                        </span>
                    </h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">التحكم في أدوار المستخدمين لتحديد مستوى الصلاحيات والنفاذ.</p>
                </div>
                <a href="{{ route('role.create') }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-semibold text-white bg-amber-600 hover:bg-amber-700 rounded-xl shadow-md shadow-amber-500/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>إضافة دور</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($roles as $role)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 border border-gray-100 dark:border-gray-700/60 shadow-md hover:border-amber-500/30 transition-all flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="p-2 bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 rounded-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </span>
                            <span class="font-bold text-gray-900 dark:text-white font-mono text-sm">
                                {{ $role->name }}
                            </span>
                        </div>

                        <div class="flex items-center gap-1">
                            <a href="{{ route('role.edit', $role->id) }}"
                               class="p-1.5 text-gray-400 hover:text-amber-600 dark:hover:text-amber-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors"
                               title="تعديل">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <x-delete-form :action-url="route('role.destroy', $role->id)" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 3. Permissions Section -->
        <div class="space-y-4">
            <!-- Messages -->
            <x-message :message="session('success-store-permission')" :color="'green'" />
            <x-message :message="session('success-update-permission')" :color="'blue'" />
            <x-message :message="session('success-delete-permission')" :color="'red'" />

            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                        <span>الصلاحيات (Permissions)</span>
                        <span class="px-2.5 py-0.5 text-xs rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 font-mono">
                            {{ $permissions->count() }}
                        </span>
                    </h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">الصلاحيات المحددة المندرجة تحت الأدوار.</p>
                </div>
                <a href="{{ route('permission.create') }}"
                   class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-semibold text-white bg-amber-600 hover:bg-amber-700 rounded-xl shadow-md shadow-amber-500/20 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>إضافة صلاحية</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach ($permissions as $permission)
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-3.5 border border-gray-100 dark:border-gray-700/60 shadow-sm hover:border-teal-500/30 transition-all flex items-center justify-between">
                        <span class="text-xs font-mono font-medium text-teal-700 dark:text-teal-400 bg-teal-50 dark:bg-teal-950/40 px-2 py-1 rounded-md">
                            🔑 {{ $permission->name }}
                        </span>

                        <div class="flex items-center gap-1">
                            <a href="{{ route('permission.edit', $permission->id) }}"
                               class="p-1 text-gray-400 hover:text-amber-600 dark:hover:text-amber-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors"
                               title="تعديل">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <x-delete-form :action-url="route('permission.destroy', $permission->id)" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>
