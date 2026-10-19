@auth
<nav x-data="{ open: false }" class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200/80 dark:border-slate-800 sticky top-0 z-50 shadow-sm transition-colors duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 sm:h-22">
            <!-- Left Side: Logo & Links -->
            <div class="flex items-center gap-4 lg:gap-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center py-2">
                    <a href="{{ route('dashboard') }}" class="transition-transform duration-300 hover:scale-105">
                        <x-application-logo class="block h-10 sm:h-12 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links (Desktop & Tablet) -->
                <div class="hidden md:flex items-center space-x-1 lg:space-x-2 rtl:space-x-reverse">
                    @if (Auth::user()->hasAnyRole(['super-admin', 'writer']))

                        <!-- Dashboard Link -->
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                           class="px-4 lg:px-5 py-2.5 rounded-xl text-sm lg:text-base font-semibold transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600 shadow-sm border border-indigo-200/60 dark:bg-indigo-950/50 dark:text-indigo-400 dark:border-indigo-800/60' : 'text-slate-700 dark:text-slate-200 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/80 dark:hover:bg-slate-800/60' }}">
                            {{ __('لوحة التحكم') }}
                        </x-nav-link>

                        @role('super-admin')
                            <!-- Users Link -->
                            <a href="{{ route('users.index') }}"
                               class="px-4 lg:px-5 py-2.5 rounded-xl text-sm lg:text-base font-semibold transition-all duration-200 {{ request()->routeIs('users.index') ? 'bg-indigo-50 text-indigo-600 shadow-sm border border-indigo-200/60 dark:bg-indigo-950/50 dark:text-indigo-400 dark:border-indigo-800/60' : 'text-slate-700 dark:text-slate-200 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/80 dark:hover:bg-slate-800/60' }}">
                                {{ __('المستخدمين') }}
                            </a>

                            <!-- Technologies Link -->
                            <a href="{{ route('technology.index') }}"
                               class="px-4 lg:px-5 py-2.5 rounded-xl text-sm lg:text-base font-semibold transition-all duration-200 {{ request()->routeIs('technology.index') ? 'bg-indigo-50 text-indigo-600 shadow-sm border border-indigo-200/60 dark:bg-indigo-950/50 dark:text-indigo-400 dark:border-indigo-800/60' : 'text-slate-700 dark:text-slate-200 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/80 dark:hover:bg-slate-800/60' }}">
                                {{ __('التقنيات') }}
                            </a>
                        @endrole

                        <!-- Blog Link -->
                        <a href="{{ route('posts.index') }}"
                           class="px-4 lg:px-5 py-2.5 rounded-xl text-sm lg:text-base font-semibold transition-all duration-200 {{ request()->routeIs('posts.index') ? 'bg-indigo-50 text-indigo-600 shadow-sm border border-indigo-200/60 dark:bg-indigo-950/50 dark:text-indigo-400 dark:border-indigo-800/60' : 'text-slate-700 dark:text-slate-200 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100/80 dark:hover:bg-slate-800/60' }}">
                            {{ __('المدونة') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown (Desktop) - width="80" لتكون واسعة وفخمة -->
            <div class="hidden md:flex md:items-center md:ms-4">
                <x-dropdown align="right" width="80" contentClasses="py-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-3xl shadow-2xl shadow-indigo-500/10 dark:shadow-black/80 overflow-hidden">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2.5 border border-slate-200 dark:border-slate-700/60 text-base font-semibold rounded-2xl text-slate-800 dark:text-slate-100 bg-slate-50/80 dark:bg-slate-800/80 hover:bg-white dark:hover:bg-slate-800 hover:shadow-md hover:border-indigo-200 dark:hover:border-indigo-500/40 focus:outline-none transition ease-in-out duration-200 group">
                            <!-- Avatar circle -->
                            <div class="w-9 h-9 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold text-sm me-3 shadow-sm group-hover:scale-105 transition-transform">
                                {{ mb_substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="font-bold truncate max-w-[160px]">{{ Auth::user()->name }}</div>

                            <div class="ms-2.5 shrink-0">
                                <svg class="fill-current h-4 w-4 text-indigo-500 dark:text-indigo-400 group-hover:translate-y-0.5 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- User Info Header (Card Style) -->
                        <div class="px-5 py-4 mx-2 mb-2 bg-slate-50 dark:bg-slate-950/80 rounded-2xl border border-slate-100 dark:border-slate-800 flex items-center gap-3.5">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-indigo-600 to-violet-600 text-white flex items-center justify-center font-bold text-lg shadow-md shadow-indigo-500/20 shrink-0">
                                {{ mb_substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 mb-0.5">الحساب الشخصي</p>
                                <p class="text-base font-bold text-slate-900 dark:text-white truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs font-medium text-slate-400 truncate">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <!-- Menu Links -->
                        <div class="px-2 space-y-1">
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-base font-semibold text-slate-700 dark:text-slate-200 hover:bg-indigo-50 hover:text-indigo-600 dark:hover:bg-slate-800 dark:hover:text-indigo-400 transition-all">
                                <div class="w-9 h-9 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <span>{{ __('الملف الشخصي') }}</span>
                            </x-dropdown-link>
                        </div>

                        <!-- Authentication Logout -->
                        <div class="px-2 pt-2 mt-2 border-t border-slate-100 dark:border-slate-800">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-base font-semibold text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-500/10 transition-all"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <div class="w-9 h-9 rounded-xl bg-rose-50 dark:bg-rose-950/60 flex items-center justify-center text-rose-500 dark:text-rose-400 shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    </div>
                                    <span>{{ __('تسجيل الخروج') }}</span>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile & Tablet Menu Button) -->
            <div class="flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2.5 rounded-2xl text-slate-700 dark:text-slate-200 hover:text-slate-900 dark:hover:text-white bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:outline-none transition duration-200">
                    <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-400" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile & Tablet Dropdown) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden bg-white dark:bg-slate-900 border-t border-slate-200/80 dark:border-slate-800 px-4 pt-4 pb-6 space-y-3 shadow-lg transition-all">
        @if (Auth::user()->hasAnyRole(['super-admin', 'writer']))
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-3 rounded-xl text-base sm:text-lg font-semibold {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600 border border-indigo-200/60 dark:bg-indigo-950/50 dark:text-indigo-400 dark:border-indigo-800/60' : 'text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                {{ __('لوحة التحكم') }}
            </a>

            @role('super-admin')
                <a href="{{ route('users.index') }}"
                   class="block px-4 py-3 rounded-xl text-base sm:text-lg font-semibold {{ request()->routeIs('users.index') ? 'bg-indigo-50 text-indigo-600 border border-indigo-200/60 dark:bg-indigo-950/50 dark:text-indigo-400 dark:border-indigo-800/60' : 'text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    {{ __('المستخدمين') }}
                </a>
                <a href="{{ route('technology.index') }}"
                   class="block px-4 py-3 rounded-xl text-base sm:text-lg font-semibold {{ request()->routeIs('technology.index') ? 'bg-indigo-50 text-indigo-600 border border-indigo-200/60 dark:bg-indigo-950/50 dark:text-indigo-400 dark:border-indigo-800/60' : 'text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                    {{ __('التقنيات') }}
                </a>
            @endrole

            <a href="{{ route('posts.index') }}"
               class="block px-4 py-3 rounded-xl text-base sm:text-lg font-semibold {{ request()->routeIs('posts.index') ? 'bg-indigo-50 text-indigo-600 border border-indigo-200/60 dark:bg-indigo-950/50 dark:text-indigo-400 dark:border-indigo-800/60' : 'text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                {{ __('المدونة') }}
            </a>
        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-5 pb-2 border-t border-slate-200 dark:border-slate-800 mt-4 space-y-2">
            <div class="px-4 py-3.5 bg-slate-50 dark:bg-slate-950 rounded-2xl flex items-center gap-3.5 mb-3">
                <div class="w-11 h-11 rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-bold text-base shadow-sm shrink-0">
                    {{ mb_substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <div class="font-bold text-base text-slate-900 dark:text-white truncate">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-slate-400 truncate">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-base font-semibold text-slate-800 dark:text-slate-200 hover:bg-indigo-50 hover:text-indigo-600 dark:hover:bg-slate-800 dark:hover:text-indigo-400">
                <svg class="w-5 h-5 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span>{{ __('الملف الشخصي') }}</span>
            </a>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    class="flex items-center gap-3.5 px-4 py-3 rounded-xl text-base font-semibold text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-500/10 transition"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <svg class="w-5 h-5 text-rose-500 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>{{ __('تسجيل الخروج') }}</span>
                </a>
            </form>
        </div>
    </div>
</nav>
@endauth
