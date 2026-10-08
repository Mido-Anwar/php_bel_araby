<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- يمكنك وضع عنوان ديناميكي للصفحة هنا --}}
    <title>{{ config('app.name', 'Whiscrashow') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- تم تعديل h-screen إلى min-h-screen وإزالة overflow-hidden للسماح بالتمرير --}}
<body class="font-sans antialiased bg-[#0b0f19] text-slate-100 selection:bg-yellow-500 selection:text-slate-950 m-0 p-0 min-h-screen">

    {{-- المحتوى الرئيسي --}}
    <main class="w-full min-h-screen">
        {{ $slot }}
    </main>

</body>

</html>
