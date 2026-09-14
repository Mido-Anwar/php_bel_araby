<nav x-data="{ open: false }" class="bg-[#1e293b]/95 dark:bg-slate-900/95 backdrop-blur-md border-b border-slate-700/50 sticky top-0 z-50 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 sm:h-20">
            <!-- Left Side: Logo & Links -->
            <div class="flex items-center gap-4 lg:gap-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center py-2">
                    <a href="{{ route('dashboard') }}" class="transition-transform duration-300 hover:scale-105">
                        <x-application-logo class="block h-9 sm:h-11 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links (Desktop & Tablet) -->
                <div class="hidden md:flex items-center space-x-1 lg:space-x-2 rtl:space-x-reverse">
                    @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('writer'))
                        
                        <!-- Dashboard Link -->
                        <a href="{{ route('dashboard') }}" 
                           class="px-3 lg:px-4 py-2 rounded-xl text-xs lg:text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-[#2b384f] text-yellow-400 shadow-sm border border-yellow-500/30' : 'text-[#f3ebeb]/80 hover:text-white hover:bg-[#2b384f]/50' }}">
                            {{ __('Dashboard') }}
                        </a>

                        @if (Auth::user()->hasRole('super-admin'))
                            <!-- Users Link -->
                            <a href="{{ route('users.index') }}" 
                               class="px-3 lg:px-4 py-2 rounded-xl text-xs lg:text-sm font-medium transition-all duration-200 {{ request()->routeIs('users.index') ? 'bg-[#2b384f] text-yellow-400 shadow-sm border border-yellow-500/30' : 'text-[#f3ebeb]/80 hover:text-white hover:bg-[#2b384f]/50' }}">
                                {{ __('Users') }}
                            </a>

                            <!-- Technologies Link -->
                            <a href="{{ route('technology.index') }}" 
                               class="px-3 lg:px-4 py-2 rounded-xl text-xs lg:text-sm font-medium transition-all duration-200 {{ request()->routeIs('technology.index') ? 'bg-[#2b384f] text-yellow-400 shadow-sm border border-yellow-500/30' : 'text-[#f3ebeb]/80 hover:text-white hover:bg-[#2b384f]/50' }}">
                                {{ __('Technologies') }}
                            </a>
                        @endif

                        <!-- Blog Link -->
                        <a href="{{ route('posts.index') }}" 
                           class="px-3 lg:px-4 py-2 rounded-xl text-xs lg:text-sm font-medium transition-all duration-200 {{ request()->routeIs('posts.index') ? 'bg-[#2b384f] text-yellow-400 shadow-sm border border-yellow-500/30' : 'text-[#f3ebeb]/80 hover:text-white hover:bg-[#2b384f]/50' }}">
                            {{ __('Blog') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown (Desktop) -->
            <div class="hidden md:flex md:items-center md:ms-4">
                <x-dropdown align="right" width="48" contentClasses="py-1 bg-slate-800 dark:bg-slate-800 border border-slate-700 rounded-xl shadow-xl overflow-hidden">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3.5 py-2 border border-slate-700/60 text-sm font-medium rounded-xl text-[#f3ebeb] bg-[#2b384f]/80 hover:bg-[#2b384f] hover:border-yellow-500/45 focus:outline-none transition ease-in-out duration-200 shadow-sm">
                            <div class="font-semibold truncate max-w-[130px]">{{ Auth::user()->name }}</div>

                            <div class="ms-2 shrink-0">
                                <svg class="fill-current h-4 w-4 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="block w-full px-4 py-2 text-start text-sm text-white hover:bg-slate-700/50 hover:text-yellow-400 transition">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                class="block w-full px-4 py-2 text-start text-sm text-red-400 hover:bg-red-500/10 hover:text-red-300 transition"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile & Tablet Menu Button) -->
            <div class="flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl text-gray-300 hover:text-white bg-[#2b384f]/50 hover:bg-[#2b384f] border border-slate-700/60 focus:outline-none transition duration-200">
                    <svg class="h-6 w-6 text-yellow-400" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile & Tablet Dropdown) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden bg-[#1e293b] border-t border-slate-700/50 px-4 pt-3 pb-5 space-y-2 shadow-2xl transition-all">
        @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('writer'))
            <a href="{{ route('dashboard') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm sm:text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-[#2b384f] text-yellow-400 border border-yellow-500/30' : 'text-[#f3ebeb] hover:bg-[#2b384f]/60' }}">
                {{ __('Dashboard') }}
            </a>
            
            @if (Auth::user()->hasRole('super-admin'))
                <a href="{{ route('users.index') }}" 
                   class="block px-4 py-2.5 rounded-xl text-sm sm:text-base font-medium {{ request()->routeIs('users.index') ? 'bg-[#2b384f] text-yellow-400 border border-yellow-500/30' : 'text-[#f3ebeb] hover:bg-[#2b384f]/60' }}">
                    {{ __('Users') }}
                </a>
                <a href="{{ route('technology.index') }}" 
                   class="block px-4 py-2.5 rounded-xl text-sm sm:text-base font-medium {{ request()->routeIs('technology.index') ? 'bg-[#2b384f] text-yellow-400 border border-yellow-500/30' : 'text-[#f3ebeb] hover:bg-[#2b384f]/60' }}">
                    {{ __('Technologies') }}
                </a>
            @endif
            
            <a href="{{ route('posts.index') }}" 
               class="block px-4 py-2.5 rounded-xl text-sm sm:text-base font-medium {{ request()->routeIs('posts.index') ? 'bg-[#2b384f] text-yellow-400 border border-yellow-500/30' : 'text-[#f3ebeb] hover:bg-[#2b384f]/60' }}">
                {{ __('Blog') }}
            </a>
        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-2 border-t border-slate-700/60 mt-3 space-y-1">
            <div class="px-4 mb-3">
                <div class="font-bold text-sm sm:text-base text-[#f3ebeb] truncate">{{ Auth::user()->name }}</div>
                <div class="font-medium text-xs text-gray-400 truncate">{{ Auth::user()->email }}</div>
            </div>

            <a href="{{ route('profile.edit') }}" class="block px-4 py-2.5 rounded-xl text-sm text-gray-200 hover:bg-[#2b384f]/60">
                {{ __('Profile') }}
            </a>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    class="block px-4 py-2.5 rounded-xl text-sm text-red-400 hover:bg-red-500/10"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</nav>