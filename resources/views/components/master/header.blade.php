<header class="header">
    <nav class="logo-login-nav">
        <div class="login">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-dashboard">
                    Dashboard
                </a>
            @endauth
        </div>

        <div class="logo" dir="rtl">

            <a href="{{ url('/') }}"> php بالعربي</a>
        </div>
    </nav>
    <div class="site-nav">
        <ul dir="rtl" class="nav-list-1">
            <li><a href="{{ url('/') }}">الرئيسية</a></li>
            <li><a href="{{ route('blog.main') }}">مدونة</a></li>

            <li><a href="#">اتصل بنا</a></li>
        </ul>
        <ul class="nav-list-2">
            <li><a href="{{ route('learn.main') }} ">php</a></li>
            <li><a href="{{ route('learn.main') }} ">Javascript</a></li>
            <li><a href="{{ route('learn.main') }} ">HTML</a></li>
            <li><a href="{{ route('learn.main') }} ">Css</a></li>
        </ul>
    </div>
</header>
