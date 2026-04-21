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
                                    <x-link :href="route('blog.show', $post->slug)">{{__('View')}}</x-link>
                                    <form action="{{route('blog.destroy', $post->slug)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-button.danger>
                                            {{__("Delete")}}
                                        </x-button.danger>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>{{__('You haven\'t posted anything yet')}}</td>
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
