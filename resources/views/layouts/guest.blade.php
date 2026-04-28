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
    <body class="font-sans bg-background-light flex text-text-light dark:text-text-dark dark:bg-background-dark antialiased transition-colors duration-300 h-screen overflow-hidden">
        <aside class="hidden lg:block border-r border-border-light dark:border-border-dark w-14 h-screen bg-surface-light dark:bg-surface-dark">
    
        </aside>
        <div class="flex flex-col w-full">
            <header x-data="{ open: false }" class="h-14 border-b border-border-light dark:border-border-dark w-full flex px-4 justify-between lg:px-8">
                <x-application-logo/>
                <nav class="flex-1 hidden md:flex items-center gap-6 text-sm justify-center" aria-label="Main Navigation">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Home</x-nav-link>
                    <x-nav-link :href="route('guest.blog')" :active="request()->routeIs('guest.blog')">Blog</x-nav-link>
                    {{-- <x-nav-link :href="route('guest.project')" :active="request()->routeIs('project')">Projects</x-nav-link> --}}
                </nav>

                <div class="h-14 flex items-center justify-center">
                    <x-button.secondary
                    @click="open = !open"
                    id="menuBtn"
                    class="md:hidden"
                    aria-label="Open Menu">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </x-button.secondary>
                    <x-link :active="true" href="/" class="hidden md:flex" href="{{ asset('JUAN-CARLOS-PADILLO.pdf') }}" target="_blank">
                    View CV
                    </x-link>
                </div>
                <div x-show="open"
                    @click="open = false" 
                    id="overlay" 
                    class="fixed inset-0 bg-black/50 hidden z-40 md:hidden"></div>

                <!-- Mobile Sidebar -->
                <aside
                    :class="open ? 'translate-x-0' : '-translate-x-full'"
                    id="mobileSidebar"
                    class="md:hidden fixed top-0 left-0 h-full w-64 bg-surface-light dark:bg-surface-dark border-r border-border-light dark:border-border-dark transform -translate-x-full transition-transform duration-300 z-50 p-6 flex flex-col space-y-2"
                    aria-label="Mobile Navigation">
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-primary-light dark:text-primary-dark font-semibold">Menu</span>
                        <button id="closeBtn"  @click="open = false" aria-label="Close Menu">✕</button>
                    </div>

                    <nav class="flex flex-col space-y-2 text-sm">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link :href="route('guest.blog')" :active="request()->routeIs('guest.blog')">
                        Blog
                    </x-nav-link>
                    {{-- <x-nav-link :href="route('guest.project')" :active="request()->routeIs('project')">Projects</x-nav-link> --}}
                    </nav>

                    <x-link :active="true" href="{{ asset('JUAN-CARLOS-PADILLO.pdf') }}" target="_blank">
                        View CV
                    </x-link>  
                </aside>
            </header>
            <main class="py-6 lg:px-8 lg:py-4 px-4 space-y-6 h-screen overflow-auto z-0">
                {{$slot}}
            </main>
            {{-- <footer class="h-14 border-t border-border-light dark:border-border-dark text-sm text-muted-light dark:text-muted-dark w-full flex space-x-2 px-4 items-center justify-between lg:px-8 mt-auto">
            <p>© 2026 Juan Carlos</p>
            <div class="flex space-x-2" aria-label="Footer Navigation">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
            </div>
            </footer>    --}}
        </div>
    </body>
</html>
