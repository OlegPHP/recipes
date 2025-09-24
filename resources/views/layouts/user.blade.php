<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
<div class="flex-1">
    <!-- Header / навигация -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-lg font-semibold text-gray-900 dark:text-gray-100"><a href="{{ route('home') }}">Главная</a></h1>

            <div class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="text-gray-800 dark:text-gray-100 hover:underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-gray-800 dark:text-gray-100 hover:underline">Вход</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="text-gray-800 dark:text-gray-100 hover:underline">Регистрация</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @yield('content')
    </main>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-gray-200 py-4 mt-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm">
        Projects by Oleg Vlasov 2025 © All rights reserved
    </div>
</footer>
</body>
</html>
