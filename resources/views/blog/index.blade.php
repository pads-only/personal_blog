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
        <div class="space-y-6 max-w-5xl mx-auto ">
            @forelse($posts as $post)
                <a href=""
                   class="block pb-4 border-b border-border-light dark:border-border-dark hover:opacity-80 transition">

                   <small>{{$post->user->name}}</small>
                    <h2 class="text-lg sm:text-xl font-semibold text-text-primary-light dark:text-text-primary-dark">
                        {{ $post->title }}
                    </h2>

                    <p class="text-sm text-text-secondary-light dark:text-text-secondary-dark mt-1">
                        {{ $post->created_at->format('M d, Y') }} 
                    </p>

                    {{-- <div class="prose prose-lg max-w-none dark:prose-invert">
                        @foreach ($post->content['blocks'] as $block)
                            @includeIf('blocks.' . $block['type'] , ['data' => $block['data']])
                        @endforeach
                    </div> --}}
                </a>
            @empty
                <p class="text-text-secondary-light dark:text-text-secondary-dark">
                    No blog posts yet.
                </p>
            @endforelse
            {{ $posts->links() }}
        </div>
        <x-toggle-theme/>
    </body>
</html>
