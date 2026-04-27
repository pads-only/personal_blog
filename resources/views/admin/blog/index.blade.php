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

                    @elseif(session()->has('error'))
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="text-md text-danger m-6 mb-0 flex gap-2"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <span>{{ __(session('error')) }}</span>
                        </p> 

                    @endif                
                <div class="p-6 text-text-light dark:text-text-dark">
                    {{-- <table class="min-w-full text-sm">
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
                    </div> --}}
                    

                    <div class="relative overflow-x-auto bg-background-light dark:bg-background-dark shadow-xs rounded-lg border border-border-light dark:border-border-dark">
                        <div class="p-4">
                            @include('partials.search')
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-body">
                            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-border-light dark:border-border-dark">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Publish Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr class="bg-surface-light dark:bg-surface-dark hover:bg-background-light dark:hover:bg-background-dark border-b border-border-light dark:border-border-dark">
                                        <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                                            {{__($post->title)}}
                                        </td>
                                        <td class="px-6 py-4">
                                           {{__($post->status)}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{__($post->created_at->format("M d, Y"))}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <x-link :href="route('blog.show', $post->slug)">{{__('View')}}</x-link>
                                        </td>
                                    </tr>
                                @empty
                                    <td class="px-6 py-4">{{__('There\'n no available post!')}}</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
