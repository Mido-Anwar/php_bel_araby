@props(['title' => null])
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- Title --}}
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    {{-- SEO --}}
    <meta name="description" content="اكتشف أحدث المقالات، التقنيات، والأدوات البرمجية." />
    <meta name="keywords" content="برمجة, تطوير الويب, لارافيل, مقالات برمجية" />
    <meta name="author" content="Ahmed Ramadan" />
    <meta name="robots" content="index, follow" />

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}">
    <meta property="og:description" content="تابع أحدث التقنيات والمقالات البرمجية.">
    <meta property="og:image" content="{{ asset('images/og-cover.jpg') }}">
    <meta property="og:locale" content="ar_AR">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}">
    <meta name="twitter:description" content="تابع أحدث التقنيات والمقالات البرمجية.">
    <meta name="twitter:image" content="{{ asset('images/og-cover.jpg') }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">
    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    <div>
        <x-master.header />

        <main class="min-h-[calc(100vh-80px)] bg-slate-950 text-[#f3ebeb] antialiased" dir="rtl">
            {{ $slot }}
        </main>

        <x-master.footer />

        @livewireScripts
    </div>
</body>

</html>
