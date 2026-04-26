<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Personal Blog') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-background-light text-text-light dark:text-text-dark dark:bg-background-dark antialiased transition-colors duration-300">
        <div class="h-14 dark:bg-surface-dark">
            <div class="h-14 flex justify-between items-center max-w-4xl mx-auto">
                <div>
                    <a href="/">
                        <x-application-logo />
                    </a>
                </div>
                <div>
                    contact
                </div>
            </div>
        </div>
        {{$slot}}
        <x-toggle-theme/>
    </body>
</html>
