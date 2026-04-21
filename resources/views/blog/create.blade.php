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
    <body class="font-sans bg-white text-text-light dark:text-text-primary-dark dark:bg-background-dark antialiased transition-colors duration-300">
        <div class="max-w-5xl mx-auto mt-10 p-6 sm:pt-0 space-y-4 bg-background-light dark:bg-background-dark">
            <form method="POST" action="/blog" class="dark:text-text-primary-dark">
                @csrf
                 <div>
                    <input 
                        type="text" 
                        name="title"
                        class="w-full text-lg sm:text-xl font-semibold px-3 py-2 bg-transparent border-b border-border-light dark:border-border-dark focus:outline-none focus:border-primary"
                        placeholder="Post title..."/>
                </div>
                <div class="border border-border-light dark:border-border-dark rounded-lg p-3 sm:p-4 bg-background-light dark:bg-background-dark">
                    <div id="editorjs" class="prose dark:prose-invert max-w-none"></div>
                    <input type="hidden" class="dark:text-text-primary-dark" name="content" id="content"/>
                </div>
                {{-- <div id="editorjs" class="border p-4"></div> --}}

                <button type="submit">Save</button>
            </form>
        </div>
        <x-toggle-theme/>
    </body>
</html>
