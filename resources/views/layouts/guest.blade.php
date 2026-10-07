<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Whiscrashow') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#090d16] text-slate-100 selection:bg-yellow-500 selection:text-slate-950">

    <div class="min-h-screen relative overflow-hidden flex flex-col">

        {{-- خلفية شبكية برمجية — تغطي الصفحة كلها --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b12_1px,transparent_1px),linear-gradient(to_bottom,#1e293b12_1px,transparent_1px)] bg-[size:3rem_3rem] pointer-events-none"></div>

        {{-- إضاءات خلفية فنية --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-[140px] pointer-events-none"></div>

        {{-- المحتوى — ياخد الصفحة كلها --}}
        <div class="relative flex-1 flex flex-col items-center justify-center p-4 sm:p-6 w-full">

            {{-- شعار --}}
            <div class="text-center mb-6">
                <a href="/" class="inline-block group">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-[#0b0f19] border-2 border-yellow-500/40 flex items-center justify-center shadow-[0_0_20px_rgba(234,179,8,0.15)] group-hover:border-yellow-400 transition-all">
                        <span class="text-2xl font-mono text-yellow-400 font-extrabold">&lt;/&gt;</span>
                    </div>
                </a>
            </div>

            {{-- النافذة الرئيسية --}}
            <div class="rounded-3xl w-full max-w-md bg-[#0b0f19] border-2 border-yellow-500/30 shadow-[0_0_50px_rgba(234,179,8,0.12)] overflow-hidden">

                {{-- شريط علوي --}}
                <div class="flex items-center justify-between px-5 py-3.5 bg-[#111827] border-b border-slate-800">
                    <div class="flex items-center gap-2">
                        <span class="w-3.5 h-3.5 rounded-full bg-red-500 inline-block"></span>
                        <span class="w-3.5 h-3.5 rounded-full bg-yellow-500 inline-block"></span>
                        <span class="w-3.5 h-3.5 rounded-full bg-green-500 inline-block"></span>
                    </div>
                    <div class="text-xs font-mono text-yellow-400 font-bold tracking-widest flex items-center gap-2">
                        <span>⚡</span> WHISCRASHOW_AUTH
                    </div>
                    <div class="text-xs font-mono text-slate-400">SECURE</div>
                </div>

                {{-- المحتوى الديناميكي --}}
                <div class="p-6 sm:p-8">
                    {{ $slot }}
                </div>

                {{-- شريط سفلي --}}
                <div class="px-6 py-3 bg-[#070a12] border-t border-slate-800 flex items-center justify-between text-xs font-mono text-slate-400">
                    <span>LARAVEL BACKEND</span>
                    <span class="text-green-400 flex items-center gap-1.5 font-bold">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        ONLINE
                    </span>
                </div>

            </div>

        </div>
    </div>

</body>

</html>
