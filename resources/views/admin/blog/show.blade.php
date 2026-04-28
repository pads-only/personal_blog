<x-app-layout :heading="__('Blog')">
    <div class="pb-4 flex flex-col justify-end md:flex-row md:items-center gap-4">
          <div class="flex gap-2 text-sm">
            <x-link :href="route('blog.create')">
              Write
            </x-link>
            <x-link :href="route('blog.edit', $post->slug)">
              Edit
            </x-link>
            <x-button.danger x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion')">
              Delete
            </x-button.danger>
          </div>
        </div>
    <div class="py-12">
    <x-modal name="confirm-deletion" :show="false" focusable>
        <form method="post" action="{{ route('blog.destroy', $post->slug) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-accent-light dark:text-accent-dark">
                {{ __('Are you sure you want to delete this post?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once this post is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
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
       