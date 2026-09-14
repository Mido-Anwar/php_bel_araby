<header class="w-full bg-[#0f172a]/95 backdrop-blur-md border-b border-slate-800/80 sticky top-0 z-50 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 flex flex-col gap-4">

        <!-- الشريط العلوي: اللوجو وأزرار الحساب/الدخول -->
        <div class="flex items-center justify-between">

            <!-- اللوجو -->
            <div class="shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="transition-transform duration-300 hover:scale-105">
                    <x-application-logo class="block h-10 sm:h-12 w-auto" />
                </a>
            </div>

            <!-- أزرار تسجيل الدخول وحساب المستخدم -->
            <div class="login relative" x-data="{ openMobileMenu: false }">
                @auth
                    <!-- أزرار الديسكتوب -->
                    <div class="hidden sm:flex items-center gap-3">
                        <a href="{{ url('/dashboard') }}"
                            class="group relative inline-flex items-center gap-2 px-4.5 py-2 rounded-xl text-sm font-semibold tracking-wide 
                                  bg-[#1e293b] text-[#f3ebeb] border border-slate-700/60 shadow-md 
                                  hover:bg-[#2b384f] hover:border-yellow-500/50 
                                  focus:outline-none focus:ring-2 focus:ring-yellow-500 
                                  transition-all duration-300">
                            <svg class="w-4 h-4 text-yellow-400 group-hover:rotate-12 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span>لوحة التحكم</span>
                        </a>

                        <a href="{{ route('logout') }}"
                            class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-sm font-medium 
                                  bg-red-500/10 text-red-400 border border-red-500/20 
                                  hover:bg-red-500 hover:text-white 
                                  focus:outline-none focus:ring-2 focus:ring-red-500 
                                  transition-all duration-300"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            <span>خروج</span>
                        </a>
                    </div>

                    <!-- قائمة الموبايل -->
                    <div class="sm:hidden relative">
                        <button @click="openMobileMenu = !openMobileMenu"
                            class="inline-flex items-center justify-center p-2.5 rounded-xl bg-[#1e293b] text-[#f3ebeb] border border-slate-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>

                        <div x-show="openMobileMenu" @click.away="openMobileMenu = false" x-transition
                            class="absolute left-0 mt-2 w-48 rounded-2xl bg-[#1e293b] border border-slate-700 shadow-2xl py-2 z-50 text-right"
                            style="display: none;">

                            <a href="{{ url('/dashboard') }}"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm text-[#f3ebeb] hover:bg-[#2b384f] transition">
                                <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path>
                                </svg>
                                <span>لوحة التحكم</span>
                            </a>
                            <div class="border-t border-slate-700/50 my-1"></div>
                            <a href="{{ route('logout') }}"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 transition"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>خروج</span>
                            </a>
                        </div>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
           
                @endauth
            </div>
        </div>

        <!-- الشريط السفلي: الروابط والتقنيات -->
        <div class="site-nav">
            <nav
                class="flex flex-col lg:flex-row items-center justify-between gap-3 px-4 py-3 bg-[#1e293b]/80 backdrop-blur-md border border-slate-700/50 rounded-2xl shadow-inner">

                <!-- الروابط الأساسية -->
                <ul dir="rtl" class="flex flex-wrap items-center justify-center gap-2 m-0 p-0 list-none">
                    @if (!request()->routeIs('home'))
                        <li>
                            <a href="{{ url('/') }}"
                                class="px-3.5 py-1.5 rounded-xl text-xs sm:text-sm font-semibold text-[#f3ebeb] bg-[#2b384f]/60 hover:bg-[#2b384f] hover:text-yellow-400 border border-slate-700/50 transition-all duration-300">الرئيسية</a>
                        </li>
                    @endif
                    @if (!request()->routeIs('blog.main'))
                    <li>
                        <a href="{{ route('blog.main') }}"
                            class="px-3.5 py-1.5 rounded-xl text-xs sm:text-sm font-semibold text-[#f3ebeb] bg-[#2b384f]/60 hover:bg-[#2b384f] hover:text-yellow-400 border border-slate-700/50 transition-all duration-300">مدونة</a>
                    </li>
                        @endif
                </ul>

                <!-- قائمة التقنيات -->
                <ul class="flex flex-wrap items-center justify-center gap-1.5 m-0 p-0 list-none">
                    @if (isset($technologies))
                        @foreach ($technologies as $technology)
                            <li>
                                <a href="{{ route('docs.show', $technology->name) }}"
                                    class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-medium text-yellow-400 bg-yellow-500/10 hover:bg-yellow-500 hover:text-slate-950 border border-yellow-500/20 transition-all duration-300">
                                    {{ $technology->name }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>

            </nav>
        </div>

    </div>
</header>
