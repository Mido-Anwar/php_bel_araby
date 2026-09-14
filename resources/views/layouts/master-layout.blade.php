<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Master PHP in Arabic with easy-to-follow tutorials, real-world examples,
           and practical tips — covering everything from beginner basics to advanced techniques.">
    <title>{{ config('app.name') }}</title>
    <!-- Styles / Scripts -->
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
