<header class="header">
    <nav class="logo-login-nav">
        <div class="login">
            @auth
                <a href="{{ url('/dashboard') }}" class="backdrop:blur-sm bg-white/30 dark:bg-gray-800/30 border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-200 rounded-lg px-4 py-2 text-sm font-medium hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  ">
                    Dashboard
                </a>
            @endauth
        </div>

        <div class="logo">

            <a href="{{ route('home') }}"> Whiscrashow</a>
        </div>
    </nav>
    <div class="site-nav">
        <ul dir="rtl" class="nav-list-1">
            <li><a href="{{ url('/') }}">الرئيسية</a></li>
            <li><a href="{{ route('blog.main') }}">مدونة</a></li>

            <li><a href="#">اتصل بنا</a></li>
        </ul>
        <ul class="nav-list-2">
            @foreach ($technologies as $technology)
                <li> <a href="{{ route('docs.show',$technology->name) }}">{{ $technology->name }}</a> </li>
            @endforeach
        </ul>
    </div>
</header>
