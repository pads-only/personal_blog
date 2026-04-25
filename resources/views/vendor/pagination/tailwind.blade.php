@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">

    <!-- Mobile -->
    <div class="flex gap-2 items-center justify-between sm:hidden">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-sm rounded-md border cursor-not-allowed
                text-muted-light dark:text-muted-dark
                bg-surface-light dark:bg-surface-dark
                border-border-light dark:border-border-dark">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
               class="px-4 py-2 text-sm rounded-md border transition
               text-text-light dark:text-text-dark
               bg-surface-light dark:bg-surface-dark
               border-border-light dark:border-border-dark
               hover:bg-background-light dark:hover:bg-background-dark">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
               class="px-4 py-2 text-sm rounded-md border transition
               text-white dark:text-white
               bg-primary-light dark:bg-primary-dark
               border-primary-light dark:border-primary-dark
               hover:opacity-90">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="px-4 py-2 text-sm rounded-md border cursor-not-allowed
                text-muted-light dark:text-muted-dark
                bg-surface-light dark:bg-surface-dark
                border-border-light dark:border-border-dark">
                {!! __('pagination.next') !!}
            </span>
        @endif

    </div>

    <!-- Desktop -->
    <div class="hidden sm:flex sm:items-center sm:justify-between sm:gap-4">

        <!-- Info -->
        <div>
            <p class="text-sm text-muted-light dark:text-muted-dark">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium text-accent-light dark:text-accent-dark">
                        {{ $paginator->firstItem() }}
                    </span>
                    {!! __('to') !!}
                    <span class="font-medium text-accent-light dark:text-accent-dark">
                        {{ $paginator->lastItem() }}
                    </span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium text-accent-light dark:text-accent-dark">
                    {{ $paginator->total() }}
                </span>
                {!! __('results') !!}
            </p>
        </div>

        <!-- Pagination -->
        <div class="inline-flex rounded-md shadow-sm">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 border rounded-l-md cursor-not-allowed
                    bg-surface-light dark:bg-surface-dark
                    border-border-light dark:border-border-dark
                    text-muted-light dark:text-muted-dark">
                    ‹
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="px-3 py-2 border rounded-l-md transition
                   bg-surface-light dark:bg-surface-dark
                   border-border-light dark:border-border-dark
                   text-text-light dark:text-text-dark
                   hover:bg-background-light dark:hover:bg-background-dark">
                    ‹
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)

                {{-- Dots --}}
                @if (is_string($element))
                    <span class="px-4 py-2 border
                        bg-surface-light dark:bg-surface-dark
                        border-border-light dark:border-border-dark
                        text-muted-light dark:text-muted-dark">
                        {{ $element }}
                    </span>
                @endif

                {{-- Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 border font-medium
                                bg-primary-light dark:bg-primary-dark
                                text-white
                                border-primary-light dark:border-primary-dark">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="px-4 py-2 border transition
                               bg-surface-light dark:bg-surface-dark
                               border-border-light dark:border-border-dark
                               text-text-light dark:text-text-dark
                               hover:bg-background-light dark:hover:bg-background-dark">
                                {{ $page }}
                            </a>
                        @endif

                    @endforeach
                @endif

            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="px-3 py-2 border rounded-r-md transition
                   bg-surface-light dark:bg-surface-dark
                   border-border-light dark:border-border-dark
                   text-text-light dark:text-text-dark
                   hover:bg-background-light dark:hover:bg-background-dark">
                    ›
                </a>
            @else
                <span class="px-3 py-2 border rounded-r-md cursor-not-allowed
                    bg-surface-light dark:bg-surface-dark
                    border-border-light dark:border-border-dark
                    text-muted-light dark:text-muted-dark">
                    ›
                </span>
            @endif

        </div>
    </div>

</nav>
@endif