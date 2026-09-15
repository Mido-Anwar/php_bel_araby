@props(['title' => null])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" lang="ar">

<head>
    <!-- الأساسيات لمحركات البحث -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- العنوان والوصف (SEO) -->
    <meta name="description"
        content="اكتشف أحدث المقالات، التقنيات، والأدوات البرمجية المطورة خصيصاً لتسهيل تجربتك ومتابعة أجدد التقنيات البرمجية." />
    <meta name="keywords" content="برمجة, تطوير الويب, لارافيل, تكنولوجيات, مقالات برمجية, Web Development, Laravel" />
    <meta name="author" content="اسمك أو اسم الفريق" />
    <meta name="robots" content="index, follow" />

    <!-- Open Graph / Facebook / LinkedIn (عند مشاركة الرابط) -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ config('app.name', 'اسم موقعك') }} - المنصة التقنية الحديثة">
    <meta property="og:description"
        content="تابع أحدث التقنيات والمقالات البرمجية المتطورة المصممة بأحدث معايير الويب.">
    <meta property="og:image" content="{{ asset('images/og-cover.jpg') }}"> <!-- ضع رابط صورة بارزة للموقع هنا -->
    <meta property="og:locale" content="ar_AR">

    <!-- Twitter Card (عند مشاركة الرابط على تويتر/X) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ config('app.name', 'اسم موقعك') }} - المنصة التقنية الحديثة">
    <meta name="twitter:description"
        content="تابع أحدث التقنيات والمقالات البرمجية المتطورة المصممة بأحدث معايير الويب.">
    <meta name="twitter:image" content="{{ asset('images/og-cover.jpg') }}">

    <!-- Canonical URL (لمنع محركات البحث من اعتبار المحتوى مكرراً) -->
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @else
        @livewireStyles
        <style>
        </style>
    @endif
</head>

<body class="">
    <div class="">
        <x-master.header />


        <main class=" min-h-[calc(100vh-80px)] bg-slate-950 text-[#f3ebeb] antialiased" lang="ar" dir="rtl">
            {{ $slot }}
        </main>

        <x-master.footer />
        @livewireScripts
    </div>
</body>

</html>
