<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-accent-light dark:text-accent-dark leading-tight">
                {{ __('Blog') }}
            </h2>
            <div class="flex space-x-2">
                @can('update', $post) 
                <form action="" method="post">
                    <x-button.primary>
                        {{__('Publish')}}
                    </x-button.primary>
                </form>   
                @endcan
                @can('create', $post)    
                <x-link :href="route('blog.create')" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    {{__('Write')}}
                </x-link>
                @endcan
                @can('update', $post)    
                <x-link :href="route('blog.edit', $post->slug)" class="flex">
                    {{__('Edit')}}
                </x-link>
                @endcan    
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface-light dark:bg-surface-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-text-light dark:text-text-dark">
                    @if (session()->has('success'))
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="text-md text-success m-6 mb-0 flex gap-2"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        {{__(session('success')) }}</p>
                    @endif
                    <small>{{$post->user->name}}</small>
                    <h2 class="text-6xl font-semibold text-text-primary-light dark:text-text-primary-dark">
                        {{ __($post->title) }}
                    </h2>
                                
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
       