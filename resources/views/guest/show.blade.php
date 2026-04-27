<x-guest-layout>
    <div class="min-h-screen bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark transition-colors duration-300">
<!-- Container -->
        <article class="max-w-3xl mx-auto px-6 py-12">
            <!-- Title -->
            <h1 class="text-3xl md:text-5xl font-bold leading-tight text-accent-light dark:text-accent-dark mb-6">
                {{ $post->title }}
            </h1>

            <!-- Meta Info -->
            <div class="flex flex-wrap items-center gap-3 text-sm text-muted-light dark:text-muted-dark mb-10">

                <!-- Author -->
                <span class="font-medium text-accent-light dark:text-accent-dark">
                    {{ $post->user->name }}
                </span>

                <span>•</span>

                <!-- Date -->
                <span>
                    {{ $post->created_at->format('F d, Y') }}
                </span>

                <span>•</span>

                <!-- Reading Time -->
                <span>
                    {{ $post->reading_time ?? '5 min read' }}
                </span>

            </div>

            <!-- Divider -->
            <div class="border-t border-border-light dark:border-border-dark mb-10"></div>

            <!-- Content -->
            <div class="prose prose-lg max-w-none font-serif
                        prose-headings:text-accent-light dark:prose-headings:text-accent-dark
                        prose-p:text-text-light dark:prose-p:text-text-dark
                        prose-strong:text-accent-light dark:prose-strong:text-accent-dark
                        prose-a:text-primary-light dark:prose-a:text-primary-dark
                        prose-blockquote:border-primary-light dark:prose-blockquote:border-primary-dark
                        prose-li:text-accent-light dark:prose-li:text-accent-dark">

                @foreach ($post->content['blocks'] as $block)
                    @includeIf('blocks.' . $block['type'] , ['data' => $block['data']])
                @endforeach

            </div>
        </article>
    </div>
</x-guest-layout>