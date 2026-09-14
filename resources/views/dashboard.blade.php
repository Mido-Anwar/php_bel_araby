<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 dark:text-white leading-tight">
                    لوحة التحكم
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                    مرحباً بك مجدداً، {{ Auth::user()->name }} 👋
                </p>
            </div>

            <a href="{{ route('post.create') }}"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold shadow-md shadow-blue-500/20 transition-all active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>منشور جديد</span>
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
<!-- 2. Technologies Section -->
<div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm p-6 space-y-5">
    <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700/60 pb-4">
        <div>
            <h3 class="font-bold text-gray-900 dark:text-white text-lg">
                التقنيات المستخدمة
            </h3>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                قائمة بالتقنيات واللغات المسجلة في النظام
            </p>
        </div>

        <a href="{{ route('technology.index') ?? '#' }}" class="text-xs text-blue-600 hover:text-blue-700 dark:text-blue-400 font-semibold flex items-center gap-1">
            <span>إدارة التقنيات</span>
            <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <!-- Grid of Technologies -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @forelse (\App\Models\Technology::all() as $tech)
            <a href="{{ route('technology.show', $tech->id) }}" class="group relative p-4 rounded-xl border border-gray-100 dark:border-gray-700/50 bg-gray-50/50 dark:bg-gray-900/40 hover:bg-white dark:hover:bg-gray-800 hover:shadow-md hover:border-blue-500/30 dark:hover:border-blue-500/30 transition-all duration-200 flex flex-col items-center text-center">

                <!-- Tech Icon / Logo -->
                <div class="w-12 h-12 rounded-xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-2 flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform">
                        <!-- Default Code Icon -->
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                </div>

                <!-- Tech Name -->
                <h4 class="mt-3 text-sm font-bold text-gray-800 dark:text-gray-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    {{ $tech->name }}
                </h4>
            </a>
        @empty
            <div class="col-span-full py-8 text-center text-gray-400 text-sm">
                لا توجد تقنيات مضافة حتى الآن.
            </div>
        @endforelse
    </div>
</div>
        <!-- 1. Stats Grid Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <!-- Total Posts Card -->
            <div
                class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm flex items-center justify-between">

                <div>
                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">إجمالي المنشورات</p>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-1">
                        {{ \App\Models\Post::count() }}
                    </h3>
                </div>
                <div class="p-3 bg-blue-500/10 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
            </div>

            <!-- Published Posts Card -->
            <div
                class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">المنشورات النشطة</p>
                    <h3 class="text-2xl font-bold text-emerald-600 dark:text-emerald-400 mt-1">
                        {{ \App\Models\Post::where('is_published', true)->count() }}
                    </h3>
                </div>
                <div
                    class="p-3 bg-emerald-500/10 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <!-- Hidden / Draft Posts Card -->
            <div
                class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">المسودات (المخفية)</p>
                    <h3 class="text-2xl font-bold text-amber-600 dark:text-amber-400 mt-1">
                        {{ \App\Models\Post::where('is_published', false)->count() }}
                    </h3>
                </div>
                <div class="p-3 bg-amber-500/10 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24M1 1l22 22" />
                    </svg>
                </div>
            </div>

            <!-- Total Authors Card -->
            <div
                class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">إجمالي الكتاب</p>
                    <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mt-1">
                        {{ \App\Models\User::count() }}
                    </h3>
                </div>
                <div class="p-3 bg-indigo-500/10 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- 2. Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Latest Posts Section (Takes 2 Columns) -->
            <div
                class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-gray-100 dark:border-gray-700/60 flex items-center justify-between">
                    <h3 class="font-bold text-gray-900 dark:text-white text-base">
                        أحدث المنشورات
                    </h3>
                    <a href="{{ route('posts.index') }}"
                        class="text-xs text-blue-600 hover:text-blue-700 dark:text-blue-400 font-semibold">
                        عرض الكل ←
                    </a>
                </div>

                <div class="divide-y divide-gray-100 dark:divide-gray-700/60">
                    @forelse (\App\Models\Post::latest()->take(5)->get() as $latestPost)
                        <div
                            class="p-4 flex items-center justify-between hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-colors">
                            <div class="flex items-center gap-3 min-w-0">
                                <div
                                    class="w-10 h-10 rounded-lg bg-gray-100 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 overflow-hidden shrink-0">
                                    @if ($latestPost->image && ($latestPost->image->url ?? $latestPost->image->path))
                                        <img src="{{ $latestPost->image->url ?? asset('storage/' . $latestPost->image->path) }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center text-gray-400 text-xs font-bold">
                                            {{ mb_substr($latestPost->title, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="truncate">
                                    <h4 class="text-sm font-semibold text-gray-800 dark:text-gray-200 truncate">
                                        {{ $latestPost->title }}
                                    </h4>
                                    <p class="text-xs text-gray-400 mt-0.5">
                                        {{ $latestPost->created_at->diffForHumans() }} • بواسطة
                                        {{ $latestPost->user->name ?? 'مجهول' }}
                                    </p>
                                </div>
                            </div>

                            <div class="shrink-0 mr-3">
                                @if ($latestPost->is_published)
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400">
                                        منشور
                                    </span>
                                @else
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-600 dark:text-amber-400">
                                        مخفي
                                    </span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center text-gray-400 text-sm">
                            لا توجد منشورات حتى الآن.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Actions & System Info (Takes 1 Column) -->
            <div class="space-y-6">
                <!-- Quick Actions Widget -->
                <div
                    class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700/60 shadow-sm">
                    <h3 class="font-bold text-gray-900 dark:text-white text-base mb-4">
                        روابط سريعة
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('posts.index') }}"
                            class="flex items-center justify-between p-3 rounded-xl bg-gray-50 dark:bg-gray-900/50 hover:bg-blue-50 dark:hover:bg-blue-900/20 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors text-sm font-medium">
                            <span>إدارة الجدول والمنشورات</span>
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                        <a href="{{ route('post.create') }}"
                            class="flex items-center justify-between p-3 rounded-xl bg-gray-50 dark:bg-gray-900/50 hover:bg-blue-50 dark:hover:bg-blue-900/20 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors text-sm font-medium">
                            <span>كتابة مقال جديد</span>
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                            class="flex items-center justify-between p-3 rounded-xl bg-gray-50 dark:bg-gray-900/50 hover:bg-blue-50 dark:hover:bg-blue-900/20 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors text-sm font-medium">
                            <span>إعدادات الملف الشخصي</span>
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Account Status Widget -->
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 p-5 rounded-2xl text-white shadow-lg">
                    <h4 class="font-bold text-base mb-1">Whiscrashow Dashboard</h4>
                    <p class="text-xs text-blue-100 leading-relaxed">
                        نظام إدارة المحتوى الخاص بك يعمل بكفاءة وبأعلى أداء.
                    </p>
                    <div
                        class="mt-4 pt-3 border-t border-white/10 flex justify-between items-center text-xs text-blue-100">
                        <span>إصدار Laravel</span>
                        <span class="font-mono bg-white/10 px-2 py-0.5 rounded">v{{ app()->version() }}</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
