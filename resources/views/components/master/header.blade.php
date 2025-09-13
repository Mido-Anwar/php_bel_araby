<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

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
