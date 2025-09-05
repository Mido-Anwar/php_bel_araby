<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
        </style>
    @endif
</head>

<body class="">
    <div class="mainContainer">
        <header class="header">
            <nav class="logo-login-nav">
                <div class="login">
                    @if (Route::has('login'))

                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                <div class="logo" dir="rtl">
                    php بالعربي
                </div>
            </nav>

        </header>
        <main class="maincontent">
            <h1>مرحبا بك في موقع PHP بالعربي</h1>
            <p>الموقع مخصص لنشر مقالات ودروس ومعلومات عن لغة PHP باللغة العربية</p>
            <p>يمكنك التسجيل في الموقع لتتمكن من المشاركة في كتابة المقالات والدروس</p>
            <p>يمكنك أيضا متابعة آخر الأخبار والمقالات عن طريق الاشتراك في القائمة البريدية</p>
            <a href="{{ route('register') }}" class="btn">سجل الآن</a>
        </main>
        <footer class="footer">
            <p>جميع الحقوق محفوظة &copy; 2024</p>
        </footer>
    </div>



    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
