<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-accent-light dark:text-accent-dark leading-tight">
                {{ __('Blog') }}
            </h2>
            <x-link :href="route('blog.create')">+ Create new blog</x-link>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface-light dark:bg-surface-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-text-light dark:text-text-dark">
                    <small>{{$post->user->name}}</small>
                    <h2 class="text-lg sm:text-xl font-semibold text-text-primary-light dark:text-text-primary-dark">
                        {{ $post->title }}
                    </h2>
                
                    <small>{{$post->slug}}</small>
                
                    <p class="text-sm text-text-secondary-light dark:text-text-secondary-dark mt-1">
                        {{ $post->created_at->format('M d, Y') }} 
                    </p>
                
                    <div class="prose prose-lg max-w-none dark:prose-invert">
                        @foreach ($post->content['blocks'] as $block)
                            @includeIf('blocks.' . $block['type'] , ['data' => $block['data']])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
       