<x-guest-layout>
    <!-- Container -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <h1 class="text-3xl font-semibold tracking-tight">
                Blog
            </h1>

            <!-- Search -->
            @include('partials.search')
        </div>
        <!-- Posts List -->
        <div class="divide-y divide-border-light dark:divide-border-dark">
            @forelse ($posts as $post)
                <article class="py-5">
                    <a href="{{route('guest.blog.show', $post->slug)}}" class="group block">

                        <!-- Title -->
                        <h2 class="text-2xl font-semibold text-accent-light dark:text-accent-dark group-hover:underline">
                            {{ $post->title }}
                        </h2>

                        <!-- Meta -->
                        <div class="mt-1 text-xs text-muted-light dark:text-muted-dark flex items-center gap-2">
                            <span>{{ $post->user->name }}</span>
                            <span>•</span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>

                        <!-- Excerpt -->
                        <p class="mt-2 text-sm text-text-light dark:text-text-dark line-clamp-2">
                            {{ $post->excerpt }}
                        </p>
                    </a>
                </article>
            @empty
                <div class="py-10 text-center text-muted-light dark:text-muted-dark">
                    No posts found.
                </div>
            @endforelse

        </div>
        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</x-guest-layout>