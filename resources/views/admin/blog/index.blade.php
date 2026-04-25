<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-accent-light dark:text-accent-dark leading-tight">
                {{ __('Blog') }}
            </h2>
            <x-link :href="route('blog.create')" class="flex justify-center items-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                Write
            </x-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface-light dark:bg-surface-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-text-light dark:text-text-dark">
                    <table class="min-w-full text-sm">
                        <!-- Header -->
                        <thead class="border-b border-border-light dark:border-border-dark">
                            <tr class="text-left text-accent-light dark:text-accent-dark">
                                <th class="px-6 py-4 font-semibold">Title</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 font-semibold">Published</th>
                                <th class="px-6 py-4 font-semibold text-right">Actions</th>
                            </tr>
                        </thead>

                        <!-- Body -->
                        <tbody class="divide-y divide-border-light dark:divide-border-dark text-text-light dark:text-text-dark">
                            @forelse ($posts as $post)
                                <tr class="hover:bg-background-light/50 dark:hover:bg-background-dark/50 transition">
                                <td class="px-6 py-4 font-medium text-text-light dark:text-text-dark">
                                    {{__($post->title)}}
                                </td>

                                <td class="px-6 py-4">
                                    @if ($post->status === 'published')    
                                        <span class="px-3 py-1 text-xs rounded-full bg-success dark:bg-success/70 text-background-light">
                                            {{__($post->status)}}
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs rounded-full bg-muted-dark/50 text-accent-light dark:text-accent-dark">
                                            {{__($post->status)}}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4">
                                    Apr 20, 2026
                                </td>

                                <td class="px-6 py-4 text-right space-x-2 flex justify-end">
                                    @can('view', $post)    
                                        <x-link :href="route('blog.show', $post->slug)">{{__('View')}}</x-link>
                                    @endcan
                                    <x-modal name="confirm-delete-{{$post->slug}}" :show="false" maxWidth="md" class="text-center">
                                        <div class="p-6 text-center">
                                            <h2 class="text-lg font-medium text-text-dark">
                                                Confirm Delete
                                            </h2>
                                            <p class="mt-2 text-sm text-center text-gray-600">
                                                Are you sure you want to delete this item?
                                            </p>
                                            <div class="mt-6 flex justify-center space-x-2">
                                                <button 
                                                    x-on:click="$dispatch('close-modal', 'confirm-delete-{{$post->slug}}')"
                                                    class="px-4 py-2 bg-gray-500 text-white rounded"
                                                >
                                                    Cancel
                                                </button>
                                                <form action="{{route('blog.destroy', $post->slug)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button.danger>
                                                        {{__("Delete")}}
                                                    </x-button.danger>
                                                </form>
                                            </div>
                                        </div>
                                    </x-modal>
                                    @can('delete', $post)
                                        <x-button.danger 
                                            x-data
                                            x-on:click="
                                                $dispatch('open-modal', 'confirm-delete-{{$post->slug}}')"
                                        >
                                            Delete
                                        </x-button.danger>
                                    @endcan
                                </td>
                                <td>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="px-6 py-4 font-medium text-text-light dark:text-text-dark">{{__('You haven\'t posted anything yet')}}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pt-6 border-t border-border-light dark:border-border-dark">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
